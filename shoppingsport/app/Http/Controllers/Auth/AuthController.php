<?php

namespace App\Http\Controllers\Auth;

use App\Events\SendMail;
use App\Events\SendMailForgotPassword;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\{
    LoginUserRequest,
    RegisterUserRequest,
    ForgotPasswordUserRequest,
    ChangePassword
};
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class AuthController extends Controller
{

    public function login()
    {
        return view('client.pages.auth.login');
    }

    public function authenticate(LoginUserRequest $request)
    {

        $credentials = $request->validated();

        if (auth()->attempt($credentials)) {
            /**
             *  @var User $user
             *
             */
            $user = auth()->user();

            $result = $this->checkAccountActive($user);

            if (! $result['status']) {

                return response()->json($result);
            }

            session()->flash('success', 'Xin chào ' . auth()->user()->name);

            return response()->json(
                [
                    'status' => true,
                    'redirect' => route('user.home-page')
                ]
            );
        } else {
            return response()->json(['status' => false, 'message' => 'Tài khoản hoặc mật khẩu không chính xác!', 'type' => 'error']);
        }
    }

    private function checkAccountActive($user)
    {
        if ($user->isNotEmailVerified()) {

            if ($user->isNullEmailVerificationSentAt() || now()->diffInMinutes($user->email_verification_sent_at) >= 5) {

                $token = base64_encode($user->email);

                Event::dispatch(new SendMail($user, $token));

                $user->email_verification_sent_at = now();

                $user->save();

                auth()->logout();

                return
                    [
                        'status' => false,
                        'type' => 'info',
                        'message' => 'Tài khoản chưa kích hoạt. Vui lòng kiểm tra email để xác thực tài khoản!'
                    ];
            } else {
                auth()->logout();
                return
                    [
                        'status' => false,
                        'type' => 'info',
                        'message' => 'Email kích hoạt đã được gửi gần đây. Yêu cầu kích hoạt sẽ tồn tại trong 5 phút!'
                    ];
            }
        }

        return ['status' => true];
    }

    public function register()
    {
        return view('client.pages.auth.register');
    }

    public function store(RegisterUserRequest $request)
    {

        if (! isset($request->accept)) {
            return response()->json(['message' => 'Bạn chưa đồng ý với điều khoản của chúng tôi!', 'status' => false]);
        }

        $credentials = $request->validated();

        $user = User::create([
            'name' => $credentials['name'],
            'email' => $credentials['email'],
            'password' => Hash::make($credentials['password']),
            'email_verification_expires_at' => now()->addMinutes(5),
        ]);

        $token = base64_encode($user->email);

        Event::dispatch(new SendMail($user, $token));

        return response()->json(['message' => 'Đăng ký thành công. Vui lòng kiểm tra email để kích hoạt tài khoản!', 'status' => true]);
    }

    public function activate($token)
    {
        $token = base64_decode($token);
        $user = User::where('email', $token)->first();

        if (!$user) {
            abort(404);
        }

        if ($user->email_verification_expires_at < now()) {
            return redirect()->route('user.login')->with('error', 'Token kích hoạt đã hết hạn. Vui lòng đăng ký lại hoặc yêu cầu gửi lại email kích hoạt.');
        }

        $user->update([
            'email_verified_at' => now(),
            'email_verification_expires_at' => null,
        ]);

        auth()->login($user);
        session()->flash('success', 'Xin chào ' . auth()->user()->name);

        return redirect()->route('user.home-page');
    }


    public function forgotPassword(ForgotPasswordUserRequest $request)
    {
        $email = $request->email;

        $user = User::where('email', $email)->first();

        $result = $this->checkAccountActive($user);

        if (! $result['status']) {
            return response()->json($result);
        }

        $newPass = generateRandomPassword(8);
        $user->password = Hash::make($newPass);

        $token = Str::random(64);


        DB::table('password_reset_tokens')->insert([
            'email' => $user->email,
            'token' => $token,
            'created_at' => now(),
        ]);


        $user->save();

        Event::dispatch(new SendMailForgotPassword($user, $newPass, $token));

        return response()->json([
            'message' => 'Hãy thay đổi mật khẩu tại đường dẫn chúng tôi gửi về Email của bạn!',
            'status' => true
        ]);
    }


    public function formChangePassword($token)
    {

        return view('client.pages.auth.change-password', compact('token'));
    }

    public function changePassword(ChangePassword $request, $token)
    {
        // Tìm user bằng email trong bảng password_reset_tokens
        $resetToken = DB::table('password_reset_tokens')->where('token', $token)->first();

        if (!$resetToken) {
            return response()->json([
                'status' => false,
                'type' => 'error',
                'message' => 'Token không hợp lệ hoặc đã hết hạn!'
            ]);
        }

        $createdAt = \Carbon\Carbon::parse($resetToken->created_at);
        if ($createdAt->addMinutes(30) < now()) {
            return response()->json([
                'status' => false,
                'type' => 'error',
                'message' => 'Token đã hết hạn! Vui lòng yêu cầu lại.'
            ]);
        }

        // Lấy thông tin người dùng
        $user = User::where('email', $resetToken->email)->first();

        if (!$user) {
            return response()->json([
                'status' => false,
                'type' => 'error',
                'message' => 'Tài khoản không tồn tại trên hệ thống!'
            ]);
        }

        // Cập nhật mật khẩu mới
        $user->password = Hash::make($request->new_password);
        $user->save();

        // Xóa token sau khi sử dụng
        DB::table('password_reset_tokens')->where('token', $token)->delete();

        // Tùy chọn: Đăng nhập người dùng
        auth()->login($user);

        session()->flash('success', 'Xin chào ' . auth()->user()->name);

        return response()->json([
            'status' => true,
            'redirect' => route('user.home-page')
        ]);
    }
    public function logout()
    {

        auth()->logout();

        return redirect()->route('user.home-page');
    }
}

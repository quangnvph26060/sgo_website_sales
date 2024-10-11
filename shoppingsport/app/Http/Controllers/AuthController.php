<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Services\UserService;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Auth\LoginRequest;

class AuthController extends Controller
{
    protected $userService;
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }
    public function login(LoginRequest $request)
    {

        $credentials = $request->validated();

        $remember = $request->has('remember') ? true : false;

        if (Auth::guard('admin')->attempt($credentials, $remember)) {

            /**
             *  @var User $user
             *
             **/

            $user = auth()->guard('admin')->user();

            // Kiểm tra tài khoản đã xác minh email chưa
            if ($user->isNotEmailVerified()) {
                auth()->guard('admin')->logout();
                return back()->with('error', 'Tài khoản chưa được kích hoạt!');
            }

            // Kiểm tra xem tài khoản đăng nhập là có phải người dùng không
            if ($user->isUser()) {
                auth()->guard('admin')->logout();

                abort(403);
            }

            return to_route('admin.index');
        } else {
            return back()->with(['error' => 'Email hoặc mật khẩu không đúng.'])->withInput($credentials);
        }
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        return to_route('admin.login');
    }
}

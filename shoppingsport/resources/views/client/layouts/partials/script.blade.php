<script>
    var errorMessage = 'Có lỗi xảy ra. Vui lòng thử lại sau!';
</script>

<script src="{{ asset('assets/client-assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/client-assets/js/general.min.js') }}"></script>
<script src="{{ asset('assets/client-assets/js/main.min.js') }}"></script>
<script src="{{ asset('assets/client-assets/js/ecommerce.min.js') }}"></script>
<script src="{{ asset('assets/client-assets/js/mobile/ecommerce.min.js') }}"></script>
<script src="{{ asset('assets/client-assets/js/mobile/general.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if (session()->has('success') || session()->has('error'))
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.onmouseenter = Swal.stopTimer;
                toast.onmouseleave = Swal.resumeTimer;
            },
            customClass: {
                container: "custom-toast", // Áp dụng lớp CSS tùy chỉnh
            },
        });
        Toast.fire({
            icon: "{{ session('success') ? 'success' : 'error' }}",
            title: "{{ session('success') ? session('success') : session('error') }}"
        });
    </script>
@endif

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })

    $(document).ready(function() {
        window.showMessage = function(type, message) {
            const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                },
                customClass: {
                    container: "custom-toast", // Áp dụng lớp CSS tùy chỉnh
                },
            });
            Toast.fire({
                icon: type,
                title: message
            });
        }
    })
</script>


@stack('library-script')

@stack('script')

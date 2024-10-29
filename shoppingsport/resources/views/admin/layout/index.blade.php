<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>{{ isset($title) ? $title : "Document" }}</title>
    <meta
      content="width=device-width, initial-scale=1.0, shrink-to-fit=no"
      name="viewport"
    />
    <link
      rel="icon"
      href="{{ asset('sgovn.png') }}"
      type="image/x-icon"
    />

    <!-- Fonts and icons -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset("asset/js/plugin/webfont/webfont.min.js") }} "></script>
    <script src="{{ asset("validator/validator.js") }} "></script>

    <script>
      WebFont.load({
        google: { families: ["Public Sans:300,400,500,600,700"] },
        custom: {
          families: [
            "Font Awesome 5 Solid",
            "Font Awesome 5 Regular",
            "Font Awesome 5 Brands",
            "simple-line-icons",
          ],
          urls: ["{{ asset('asset/css/fonts.min.css') }}"],
        },
        active: function () {
          sessionStorage.fonts = true;
        },
      });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ asset('asset/css/bootstrap.min.css')  }}" />
    <link rel="stylesheet" href="{{ asset('asset/css/plugins.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('asset/css/kaiadmin.min.css') }}" />

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="{{ asset('asset/css/demo.css') }}" />
  </head>
  <body>
    <div class="wrapper">
      <!-- Sidebar -->
      @include('admin.layout.sidebar')

      <!-- End Sidebar -->

      <div class="main-panel">
        @include('admin.layout.header')

        <div class="container">
          @yield('content')
        </div>


      </div>

      <!-- Custom template | don't include it in your project! -->
      {{-- sss --}}
      <!-- End Custom template -->
    </div>
    <!--   Core JS Files   -->
    <script src="{{asset("asset/js/core/jquery-3.7.1.min.js") }}"></script>
    <script src="{{asset("asset/js/core/popper.min.js") }}"></script>
    <script src="{{asset("asset/js/core/bootstrap.min.js") }}"></script>

    <!-- jQuery Scrollbar -->
    <script src="{{asset("asset/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js") }}"></script>

    <!-- Chart JS -->
    <script src="{{asset("asset/js/plugin/chart.js/chart.min.js") }}"></script>

    <!-- jQuery Sparkline -->
    <script src="{{asset("asset/js/plugin/jquery.sparkline/jquery.sparkline.min.js") }}"></script>

    <!-- Chart Circle -->
    <script src="{{asset("asset/js/plugin/chart-circle/circles.min.js") }}"></script>

    <!-- Datatables -->
    <script src="{{asset("asset/js/plugin/datatables/datatables.min.js") }}"></script>

    <!-- Bootstrap Notify -->
    <script src="{{asset("asset/js/plugin/bootstrap-notify/bootstrap-notify.min.js") }}"></script>

    <!-- jQuery Vector Maps -->
    <script src="{{asset("asset/js/plugin/jsvectormap/jsvectormap.min.js") }}"></script>
    <script src="{{asset("asset/js/plugin/jsvectormap/world.js") }}"></script>

    <!-- Sweet Alert -->
    <script src="{{asset("asset/js/plugin/sweetalert/sweetalert.min.js") }}"></script>

    <!-- Kaiadmin JS -->
    <script src="{{asset("asset/js/kaiadmin.min.js") }}"></script>

    <!-- Kaiadmin DEMO methods, don't include it in your project! -->
    <script src="{{asset("asset/js/setting-demo.js") }}"></script>
    <script src="{{asset("asset/js/demo.js") }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @stack('script')

    <script>
      $("#lineChart").sparkline([102, 109, 120, 99, 110, 105, 115], {
        type: "line",
        height: "70",
        width: "100%",
        lineWidth: "2",
        lineColor: "#177dff",
        fillColor: "rgba(23, 125, 255, 0.14)",
      });

      $("#lineChart2").sparkline([99, 125, 122, 105, 110, 124, 115], {
        type: "line",
        height: "70",
        width: "100%",
        lineWidth: "2",
        lineColor: "#f3545d",
        fillColor: "rgba(243, 84, 93, .14)",
      });

      $("#lineChart3").sparkline([105, 103, 123, 100, 95, 105, 115], {
        type: "line",
        height: "70",
        width: "100%",
        lineWidth: "2",
        lineColor: "#ffa534",
        fillColor: "rgba(255, 165, 52, .14)",
      });
    </script>
  </body>
</html>

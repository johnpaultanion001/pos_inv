<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>{{ trans('panel.site_title') }}</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{ asset('/customer/css/styles.css') }}" rel="stylesheet" />
        @yield('styles')
    </head>
    <body>
        <!-- Navigation-->
        @yield('navbar')
        <!-- Header-->
        @yield('content')
        <!-- Section-->
     
        <!-- Footer-->
        <footer class="py-5" style="
        background: #FBD3E9;  /* fallback for old browsers */
        background: -webkit-linear-gradient(to right, #BB377D, #FBD3E9);  /* Chrome 10-25, Safari 5.1-6 */
        background: linear-gradient(to right, #BB377D, #FBD3E9); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

        ">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy;{{ trans('panel.site_title') }}</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="{{ asset('/customer/js/scripts.js') }}"></script>
        @yield('script')
    </body>
</html>

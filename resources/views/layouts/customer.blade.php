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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
        <style>
            .modal-footer{
                display: flex; 
                justify-content: space-between;
            }
            
        </style>
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
       
       background-image: linear-gradient(195deg, #42424a 0%, #191919 100%);


        ">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy;{{ trans('panel.site_title') }}</p></div>
        </footer>

        <!-- JQuery Scripts -->
        <script src="{{ asset('/admin/vendor/jquery/dist/jquery.min.js') }}"></script>
        <script src="{{ asset('/admin/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('/admin/vendor/js-cookie/js.cookie.js') }}"></script>
        <script src="{{ asset('/admin/vendor/jquery.scrollbar/jquery.scrollbar.min.js') }}"></script>
        <script src="{{ asset('/admin/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="{{ asset('/customer/js/scripts.js') }}"></script>
        @yield('script')
    </body>
</html>

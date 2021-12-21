<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
 
  <title>@yield('sub-title') | {{ trans('panel.site_title') }}</title>

  <!-- Favicon -->
  <link rel="icon" href="http://example.com/favicon.png">

  <!-- Fonts -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />

  <!-- css -->
  <!-- Icons -->
  <link href="{{ asset('/admin/css/nucleo-icons.css') }}" rel="stylesheet" />
  <link href="{{ asset('/admin/css/nucleo-svg.css') }}" rel="stylesheet" />
  <link href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" rel="stylesheet" />

  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>

  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">

  <!-- CSS Files -->
  <link href="{{ asset('/admin/css/material-dashboard.css?v=3.0.0') }}" type="text/css" rel="stylesheet" />
<style>
  .nav-pills .nav-item .active {
    font-weight: 600;
    background: #fff;
    box-shadow: 0px 1px 4px 1px #ddd;
  }
</style>
</head>

<body class="bg-gray-200">
    <div class="container position-sticky z-index-sticky top-0">
      <div class="row">
        <div class="col-12">
            @yield('navbar')
        </div>
      </div>
    </div>
    <div class="page-header align-items-start min-vh-100">
        <span class="mask bg-gradient-dark opacity-6"></span>
        @yield('content')
        
    </div>
    <form id="logoutform" action="{{ route('logout') }}" method="POST" style="display: none;">
      {{ csrf_field() }}
    </form>

    <div class="position-fixed  bottom-1 end-1 z-index-1051">
        <div class="toast fade hide p-2 bg-success" role="alert" aria-live="assertive" id="successToast" aria-atomic="true">
          <div class="toast-header bg-success border-0">
            <i class="material-icons text-white me-2">
              check
            </i>
            <span class="me-auto font-weight-bold text-white">{{ trans('panel.site_title') }}</span>
           
            <i class="fas fa-times text-md ms-3 cursor-pointer text-white" data-bs-dismiss="toast" aria-label="Close"></i>
          </div>
          <hr class="horizontal dark m-0">
          <div class="toast-body text-white" id="text_information">
            Successfully Added.
          </div>
        </div>
        <div class="toast fade hide p-2 bg-danger" role="alert" aria-live="assertive" id="dangerToast" aria-atomic="true">
          <div class="toast-header bg-danger border-0">
              <i class="material-icons text-white me-2">
                campaign
              </i>
            <span class="me-auto font-weight-bold text-white">{{ trans('panel.site_title') }}</span>
           
            <i class="fas fa-times text-md ms-3 cursor-pointer text-white" data-bs-dismiss="toast" aria-label="Close"></i>
          </div>
          <hr class="horizontal dark m-0">
          <div class="toast-body text-white" id="text_information_error">
            Successfully Added.
          </div>
        </div>
    </div>
    @yield('footer')

   <!-- JQuery Scripts -->
    <script src="{{ asset('/admin/vendor/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('/admin/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('/admin/vendor/js-cookie/js.cookie.js') }}"></script>
    <script src="{{ asset('/admin/vendor/jquery.scrollbar/jquery.scrollbar.min.js') }}"></script>
    <script src="{{ asset('/admin/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js') }}"></script>

    <!-- Scripts -->
    <script src="{{ asset('/admin/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('/admin//js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('/admin/js/plugins/smooth-scrollbar.min.js') }}"></script>
    <script src="{{ asset('/admin/js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    

    <script>
        var win = navigator.platform.indexOf('Win') > -1;
            if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
                Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
            }
    </script>

    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
    <script src="{{ asset('/admin/js/material-dashboard.min.js?v=3.0.0') }}"></script>

  @yield('script')
</body>

</html>
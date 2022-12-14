<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
  <div class="container-fluid py-1 px-3">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>

        @if(request()->is('admin/dashboard'))
          <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Dashboard</li>
        @elseif(request()->is('admin/raw_inventory'))
        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Raw Inventories</li>
        @elseif(request()->is('admin/products'))
          <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Product Inventories</li>
        @elseif(request()->is('admin/orders'))
          <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Product Orders</li>
        @elseif(request()->is('admin/accounts'))
          <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Accounts</li>
        @elseif(request()->is('admin/categories'))
        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Categories</li>
        @elseif(request()->is('admin/sales_reports/*'))
        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Transactions</li>
        @elseif(request()->is('admin/employees'))
        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Employees</li>

        @endif

      </ol>
      @if(request()->is('admin/dashboard'))
        <h6 class="font-weight-bolder mb-0">Dashboard</h6>
      @elseif(request()->is('admin/raw_inventory'))
        <h6 class="font-weight-bolder mb-0">Raw Inventories</h6>
      @elseif(request()->is('admin/products'))
        <h6 class="font-weight-bolder mb-0">Product Inventories</h6>
      @elseif(request()->is('admin/orders'))
        <h6 class="font-weight-bolder mb-0">Product Orders</h6>
      @elseif(request()->is('admin/accounts'))
        <h6 class="font-weight-bolder mb-0">Accounts</h6>
      @elseif(request()->is('admin/categories'))
        <h6 class="font-weight-bolder mb-0">Categories</h6>
      @elseif(request()->is('admin/sales_reports/*'))
        <h6 class="font-weight-bolder mb-0">Transactions</h6>
      @elseif(request()->is('admin/employees'))
        <h6 class="font-weight-bolder mb-0">Employees</h6>
      @endif
      
    </nav>
    <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
      <div class="ms-md-auto pe-md-3 d-flex align-items-center">
        
      </div>
      <ul class="navbar-nav  justify-content-end">
        <li class="nav-item d-flex align-items-center">
          

        </li>
        <li class="nav-item d-xl-none  d-flex align-items-center p-2">
          <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
            <div class="sidenav-toggler-inner">
              <i class="sidenav-toggler-line"></i>
              <i class="sidenav-toggler-line"></i>
              <i class="sidenav-toggler-line"></i>
            </div>
          </a>
        </li>
       
        <li class="nav-item dropdown pe-2 d-flex align-items-center">
          <a href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
           
            <i class="fas fa-users p-2"></i> <span class="text-uppercase">{{Auth()->user()->employee->name}}</span>  <i class="fas fa-angle-down"></i>
            
          </a>
          <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">
           
            <li class="mb-2">
              <a href="#" class="dropdown-item border-radius-md"  onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                <i class="fas fa-sign-out-alt fa-lg p-2"></i>
                <span>Logout</span>
              </a>
            </li>
           
            
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
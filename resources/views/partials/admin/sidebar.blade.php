<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
  <div class="sidenav-header text-center">
    <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
    <a class="navbar-brand m-0" href="/admin/dashboard">
    <img class="bi me-2" src="/assets/img/logo.png" alt="logo" width="50" height="42">
      
    </a>
  </div>
  <hr class="horizontal light mt-0 mb-2">
  <div class="collapse navbar-collapse  w-auto  max-height-vh-100" id="sidenav-collapse-main">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link {{ request()->is('admin/dashboard') || request()->is('admin/dashboard/*') ? 'bg-gradient-primary' : '' }}" href="{{ route("admin.dashboard") }}">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons opacity-10">dashboard</i>
          </div>
          <span class="nav-link-text ms-1 text-uppercase">Dashboard</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link text-white {{ request()->is('admin/raw_inventory') || request()->is('admin/raw_inventory/*') ? 'bg-gradient-primary' : '' }}" href="{{ route("admin.raw_inventory.index") }}">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="fas fa-list" style="font-size: 17px"></i>
          </div>
          <span class="nav-link-text ms-1 text-uppercase">Raw Inventories</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link text-white {{ request()->is('admin/products') || request()->is('admin/products/*') ? 'bg-gradient-primary' : '' }}" href="{{ route("admin.products.index") }}">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="fas fa-list" style="font-size: 17px"></i>
          </div>
          <span class="nav-link-text ms-1 text-uppercase">Product Inventories</span>
        </a>
      </li>
      
      

      <li class="nav-item">
        <a class="nav-link text-white {{ request()->is('admin/orders') || request()->is('admin/orders/*') ? 'bg-gradient-primary' : '' }}" href="{{ route("admin.orders") }}">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="fas fa-shopping-cart" style="font-size: 17px"></i>
          </div>
          <span class="nav-link-text ms-1 text-uppercase">Product Orders</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white {{ request()->is('admin/categories') || request()->is('admin/categories/*') ? 'bg-gradient-primary' : '' }}" href="{{ route("admin.categories.index") }}">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="fas fa-tag" style="font-size: 17px"></i>
          </div>
          <span class="nav-link-text ms-1 text-uppercase">Categories</span>
        </a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link text-white {{ request()->is('admin/sales_reports') || request()->is('admin/sales_reports/*') ? 'bg-gradient-primary' : '' }}" href="/admin/sales_reports/daily">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="fas fa-list" style="font-size: 17px"></i>
          </div>
          <span class="nav-link-text ms-1 text-uppercase">Transactions</span>
        </a>
      </li>
      @if(Auth()->user()->role == 'manager')
      <li class="nav-item">
        <a class="nav-link text-white {{ request()->is('admin/employees') || request()->is('admin/employees/*') ? 'bg-gradient-primary' : '' }}" href="{{ route("admin.employees.index") }}">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            
            <i class="fas fa-users "></i>
          </div>
          <span class="nav-link-text ms-1 text-uppercase">Employees</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white {{ request()->is('admin/accounts') || request()->is('admin/accounts/*') ? 'bg-gradient-primary' : '' }}" href="{{ route("admin.accounts.index") }}">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons opacity-10">person</i>
          </div>
          <span class="nav-link-text ms-1 text-uppercase">Accounts</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white {{ request()->is('admin/uploaded_transaction') || request()->is('admin/uploaded_transaction/*') ? 'bg-gradient-primary' : '' }}" href="{{ route("admin.uploaded_transaction.index") }}">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons opacity-10">person</i>
          </div>
          <span class="nav-link-text ms-1 text-uppercase">Uploaded Transaction</span>
        </a>
      </li>
      @endif
      <li class="nav-item">
        <a class="nav-link text-white" href="{{ route("customer.products") }}">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="fas fa-shopping-cart" style="font-size: 17px"></i>
          </div>
          <span class="nav-link-text ms-1 text-uppercase">POS</span>
        </a>
      </li>
   
    </ul>
  </div>

</aside>
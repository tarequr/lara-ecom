<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('/dashboard')}}">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Portfolio</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">
      @php
        $route = Route::currentRouteName();
      @endphp
      <!-- Nav Item - Dashboard -->
      <li class="nav-item {{ $route == 'dashboard' ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('/dashboard')}}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Interface
      </div>

      <!-- Nav Item - Category Collapse Menu -->
      <li class="nav-item">
        <a class="{{$route == 'categories.add' || $route == 'categories.view' || $route == 'categories.edit' ? '' : 'collapsed' }}
           nav-link" href="#" data-toggle="collapse" data-target="#categoriesInfo" aria-expanded="true" aria-controls="categoriesInfo">
           <i class="fa fa-diamond"></i>
          <span>Category Info</span>
        </a>
        <div id="categoriesInfo" class="collapse {{($route == 'categories.add' || $route == 'categories.view' || $route == 'categories.edit') ? 'show' : '' }}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">

          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Category Information:</h6>

            <a class="{{$route == 'categories.add' ? 'active' : '' }} collapse-item" href=" {{ route('categories.add')}} ">Add Category</a>

            <a class="{{($route == 'categories.view' || $route == 'categories.edit' )? 'active' : '' }} collapse-item" href=" {{ route('categories.view')}} ">Manage Category</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Product Collapse Menu -->
      <li class="nav-item">
        <a class="{{$route == 'products-add' || $route == 'products-view' || $route == 'products-details' || $route == 'products-edit' ? '' : 'collapsed' }}
           nav-link" href="#" data-toggle="collapse" data-target="#productsInfo" aria-expanded="true" aria-controls="productsInfo">
          <i class="fa fa-diamond"></i>
          <span>Product Info</span>
        </a>
        <div id="productsInfo" class="collapse {{($route == 'products-add' || $route == 'products-view' || $route == 'products-details' || $route == 'products-edit') ? 'show' : '' }}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">

          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Product Information:</h6>

            <a class="{{$route == 'products-add' ? 'active' : '' }} collapse-item" href=" {{ route('products-add')}} ">Add Product</a>

            <a class="{{($route == 'products-view' || $route == 'products-details' || $route == 'products-edit' )? 'active' : '' }} collapse-item" href=" {{ route('products-view')}} ">Manage Product</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Order Collapse Menu -->
      <li class="nav-item">
        <a class="{{ $route == 'orders.pending.list' || $route == 'orders.approved.list' || $route == 'orders.details' ? '' : 'collapsed' }}
           nav-link" href="#" data-toggle="collapse" data-target="#orderss" aria-expanded="true" aria-controls="orderss">
          <i class="fa fa-diamond"></i>
          <span>Orders Info</span>
        </a>
        <div id="orderss" class="collapse {{ ($route == 'orders.pending.list' || $route == 'orders.approved.list' || $route == 'orders.details') ? 'show' : '' }}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">

          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Orders Information:</h6>

            <a class="{{ $route == 'orders.pending.list' ? 'active' : '' }} collapse-item" href=" {{ route('orders.pending.list')}} ">Pending Orders</a>

            <a class="{{ ($route == 'orders.approved.list' || $route == 'orders.details' )? 'active' : '' }} collapse-item" href=" {{ route('orders.approved.list')}} ">Approved Orders</a>
          </div>
        </div>
      </li>

      

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
     <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('backend/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{auth()->user()->user_name}}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link {{Request::is('admin/dashboard*') ? 'active' : ''}}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('product.index')}}" class="nav-link {{Request::is('admin/product*') ? 'active' : ''}}">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Product Name And Image
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('bazarname.index')}}" class="nav-link {{Request::is('admin/bazarname*') ? 'active' : ''}}">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Bazar Name
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('bazarlocation.index')}}" class="nav-link {{Request::is('admin/bazarlocation*') ? 'active' : ''}}">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Bazar Location
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('price.index')}}" class="nav-link {{Request::is('admin/price*') ? 'active' : ''}}">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Price
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('allproduct.index')}}" class="nav-link {{Request::is('admin/allproduct*') ? 'active' : ''}}">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Search Product
              </p>
            </a>
          </li>
          <li class="nav-header">SYESTEM</li>
           <li class="nav-header">
            <a href="{{url('/admin/logout')}}">Logout</a>
           </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('/')}}" class="brand-link">
      <img src="{{asset('dist/img/Maxx_coin.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Admin Center</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('dist/img/AdminLTELogo.png')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{Auth::user()->name;}}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
              
          <li class="nav-item @if (request()->routeIs('admin')){ menu-open } @endif">
            <a href="#" class="nav-link @if (request()->routeIs('admin')){ active } @endif">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('/')}}" class="nav-link @if (request()->routeIs('admin')){ active } @endif">
                  <i class="far fa-circle text-success nav-icon"></i>
                  <p>Welcome</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item @if (request()->routeIs('admin')){ menu-open } @endif">
            <a href="#" class="nav-link @if (request()->routeIs('admin')){ active } @endif">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Country Module
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('/')}}" class="nav-link @if (request()->routeIs('admin')){ active } @endif">
                  <i class="far fa-circle text-success nav-icon"></i>
                  <p>Country List</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item @if (request()->routeIs('admin')){ menu-open } @endif">
            <a href="#" class="nav-link @if (request()->routeIs('admin')){ active } @endif">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Operator Module
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('/')}}" class="nav-link @if (request()->routeIs('admin')){ active } @endif">
                  <i class="far fa-circle text-success nav-icon"></i>
                  <p>Add Operator</p>
                </a>
              </li>
            </ul>
          </li>


          <li class="nav-header">EXAMPLES</li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
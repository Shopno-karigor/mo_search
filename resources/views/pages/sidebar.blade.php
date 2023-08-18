<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('/')}}" class="brand-link">
      <img src="{{asset('dist/img/Maxx_coin.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">OMS | Dashboard</span>
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
              
          <li class="nav-item @if (request()->routeIs('/')){ menu-open } @endif">
            <a href="#" class="nav-link @if (request()->routeIs('/')){ active } @endif">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('/')}}" class="nav-link @if (request()->routeIs('/')){ active } @endif">
                  <i class="far fa-circle text-success nav-icon"></i>
                  <p>Dashboard</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item @if (request()->routeIs('booking-query') || request()->routeIs('submit-booking-query')){ menu-open } @endif">
            <a href="#" class="nav-link @if (request()->routeIs('booking-query') || request()->routeIs('submit-booking-query')){ active } @endif">
              <i class="nav-icon fas fa-search"></i>
              <p>
                Booking Module
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('booking-query')}}" class="nav-link @if (request()->routeIs('booking-query')){ active } @endif">
                  <i class="far fa-circle text-success nav-icon"></i>
                  <p>Booking Query</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item @if (request()->routeIs('booking-query-list') || request()->routeIs('cancelled-query-list') || request()->routeIs('booking-query-details')){ menu-open } @endif">
            <a href="#" class="nav-link @if (request()->routeIs('booking-query-list') || request()->routeIs('cancelled-query-list') || request()->routeIs('booking-query-details')){ active } @endif">
              <i class="nav-icon fas fa-suitcase"></i>
              <p>
                Sales Module
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('booking-query-list')}}" class="nav-link @if (request()->routeIs('booking-query-list')){ active } @endif">
                  <i class="far fa-circle text-success nav-icon"></i>
                  <p>Booking Query List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('cancelled-query-list')}}" class="nav-link @if (request()->routeIs('cancelled-query-list')){ active } @endif">
                  <i class="far fa-circle text-success nav-icon"></i>
                  <p>Cancelled Queries</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item @if (request()->routeIs('task-list') || request()->routeIs('task-details') || request()->routeIs('task-without-driver') || request()->routeIs('assign-driver')){ menu-open } @endif">
            <a href="#" class="nav-link @if (request()->routeIs('task-list') || request()->routeIs('task-details') || request()->routeIs('task-without-driver') || request()->routeIs('assign-driver')){ active } @endif">
              <i class="nav-icon fas fa-shuttle-van"></i>
              <p>
                Operation Module
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('task-list')}}" class="nav-link @if (request()->routeIs('task-list')){ active } @endif">
                  <i class="far fa-circle text-success nav-icon"></i>
                  <p>Task List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('task-without-driver')}}" class="nav-link @if (request()->routeIs('task-without-driver')){ active } @endif">
                  <i class="far fa-circle text-success nav-icon"></i>
                  <p>Pending Tasks</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item @if (request()->routeIs('trip-list') || request()->routeIs('bus-captain-daily-trips') || request()->routeIs('trip-search') || request()->routeIs('trip-search-submit') ){ menu-open } @endif">
            <a href="#" class="nav-link @if (request()->routeIs('trip-list') || request()->routeIs('bus-captain-daily-trips') || request()->routeIs('trip-search') || request()->routeIs('trip-search-submit') ){ active } @endif">
              <i class="nav-icon fas fa-route"></i>
              <p>
                Trip Module
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('trip-list')}}" class="nav-link @if (request()->routeIs('trip-list')){ active } @endif">
                  <i class="far fa-circle text-success nav-icon"></i>
                  <p>Trip List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('bus-captain-daily-trips')}}" class="nav-link @if (request()->routeIs('bus-captain-daily-trips')){ active } @endif">
                  <i class="far fa-circle text-success nav-icon"></i>
                  <p>BC Daily Trips</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('trip-search')}}" class="nav-link @if (request()->routeIs('trip-search')){ active } @endif">
                  <i class="far fa-circle text-success nav-icon"></i>
                  <p>Trip Search</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item @if (request()->routeIs('add-school-view') || request()->routeIs('school-list') || request()->routeIs('edit-school')){ menu-open } @endif">
            <a href="#" class="nav-link @if (request()->routeIs('add-school-view') || request()->routeIs('school-list') || request()->routeIs('edit-school')){ active } @endif">
              <i class="nav-icon fas fa-school"></i>
              <p>
                School Module
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('add-school-view')}}" class="nav-link @if (request()->routeIs('add-school-view')){ active } @endif">
                  <i class="far fa-circle text-success nav-icon"></i>
                  <p>Add School</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('school-list')}}" class="nav-link @if (request()->routeIs('school-list')){ active } @endif">
                  <i class="far fa-circle text-success nav-icon"></i>
                  <p>School List</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item @if (request()->routeIs('add-driver-view') || request()->routeIs('driver-list') || request()->routeIs('edit-driver')){ menu-open } @endif">
            <a href="#" class="nav-link @if (request()->routeIs('add-driver-view') || request()->routeIs('driver-list') || request()->routeIs('edit-driver')){ active } @endif">
              <i class="nav-icon fas fa-bus"></i>
              <p>
                Bus Driver Module
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('add-driver-view')}}" class="nav-link @if (request()->routeIs('add-driver-view')){ active } @endif">
                  <i class="far fa-circle text-success nav-icon"></i>
                  <p>Add Bus Driver</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('driver-list')}}" class="nav-link @if (request()->routeIs('driver-list')){ active } @endif">
                  <i class="far fa-circle text-success nav-icon"></i>
                  <p>Bus Driver List</p>
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
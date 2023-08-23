@extends('master')
@section('searchResults')
  <title>RIRC | Search Result</title>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<!-- Site wrapper -->
<div class="wrapper">
  {{-- <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="info">

      </div>
    </div>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">

        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
              
          <li class="nav-item">
            <a href="{{route('/')}}" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Home
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('dashboard')}}" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                My Account
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('admin')}}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Admin
              </p>
            </a>
          </li>
          <li class="nav-item @if (request()->routeIs('search')){ menu-open } @endif">
            <a href="{{route('search')}}" class="nav-link @if (request()->routeIs('search')){ active } @endif">
              <i class="nav-icon fas fa-search"></i>
              <p>
                Search
              </p>
            </a>
          </li>


        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside> --}}

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Search Result</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('/')}}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{route('search')}}">Search</a></li>
              <li class="breadcrumb-item active">Search Result</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
          <div class="row">
              <div class="col-12">
                  <div class="callout callout-info text-success">
                      <h5><i class="fas fa-info"></i></h5>
                      We found the operator details.
                  </div>
      
                  <div class="invoice p-3 mb-3">
      
                    <div class="row invoice-info">

                    </div>

                    <div class="row">
                      <div class="col-12 table-responsive">
                        <table class="table table-striped">
                          <thead>
                            <tr>
                              <th>Operator Name</th>
                              <th>Country</th>
                              <th>Domestic Call Price</th>
                              <th>Domestic SMS Price</th>
                              <th>Domestic Internet Price</th>
                              <th>International Call Price</th>
                              <th>International SMS Price</th>
                              <th>International Internet Price</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($data as $item)
                              <tr>
                                <td>{{$item->operator_name}}</td>
                                <td>{{$item->country_name}}</td>
                                <td>{{$item->domestic_call}} USD</td>
                                <td>{{$item->domestic_sms}} USD</td>
                                <td>{{$item->domestic_internet}} USD</td>
                                <td>{{$item->international_call}} USD</td>
                                <td>{{$item->international_sms}} USD</td>
                                <td>{{$item->international_internet}} USD</td>
                              </tr>
                            @endforeach
                            
                          </tbody>
                        </table>
                      </div>
                    </div>

                  </div>
              </div>
          </div>
      </div>
    </section>
    <!-- /.content -->


  </div>

  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
</body>
@stop

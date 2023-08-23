@extends('master')
@section('bookingQuery')
  <title>Reducing International Roaming Cost</title>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<!-- Site wrapper -->
<div class="wrapper">

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-light-primary elevation-4">
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
    </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Search Operator</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- Default box -->
            <div class="card">
              <div class="card-header">
                  <h3 class="card-title">Select Country to view all operator list or select both country and operator to view the details of a single operator.</h3>
                  <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                          <i class="fas fa-minus"></i>
                      </button>
                      <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                          <i class="fas fa-times"></i>
                      </button>
                  </div>
              </div>
              <div class="card-body">
                <form action="{{route('submit-search-query')}}" method="post" enctype="multipart/form-data" autocomplete="off">
                  @csrf
                    <div class="row">
                        <div class="col-6">
                          <div class="form-group">
                              <label>Select Country</label>
                              <select class="form-control select1 select1-hidden-accessible @error('country_id') is-invalid @enderror" id="country-list" style="width: 100%;" data-select1-id="1" tabindex="-1" aria-hidden="true" name="country_id" required>
                                <option selected="selected" disabled>Select Country</option>
                                @foreach ($countries as $item)
                                <option value="{{$item->id}}">{{$item->country_name}}</option>
                                @endforeach
                              </select>
                                @error('country_id')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                          </div>
                        </div>
                        <div class="col-6">
                          <div class="form-group">
                            <label>Select Operator</label>
                            <select class="form-control select2 select2-hidden-accessible" id="operator-list" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true" name="operator_id">
                              <option selected="selected" disabled>Select Operator</option>
                              @foreach ($operators as $item)
                                <option value="{{$item->id}}">{{$item->operator_name}}</option>
                              @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <input type="submit" class="btn btn-success" value="Search">
                            </div>
                        </div>
                    </div>
                </form>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
              </div>
              <!-- /.card-footer-->
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
</body>
@stop

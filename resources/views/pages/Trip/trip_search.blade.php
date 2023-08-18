@extends('master')
@section('searchTrip')
  <title>BusTech OMS | Search Trip</title>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  @include('pages.navbar')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  @include('pages.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Search Trip</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('/')}}">Home</a></li>
              <li class="breadcrumb-item"><a href="#">Trip</a></li>
              <li class="breadcrumb-item active">Search Trip</li>
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
                  {{-- <div class="callout callout-info text-success">
                      <h5><i class="fas fa-info"></i></h5>
                      We can accomodate your children now. Please review the bellow details and confirm the order.
                  </div> --}}
      
                  <div class="invoice p-3 mb-3">
                    
                    <form action="{{route('trip-search-submit')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Select Driver</label>
                                    <select class="form-control select2 select2-hidden-accessible" id="driver-list" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true" name="driver_id" required>
                                        <option selected="selected" disabled>Select driver</option>
                                        @foreach ($drivers as $item)
                                        <option value="{{$item->id}}" data-vehicle-number="{{$item->vehicle_number}}" data-driver-name="{{$item->name}}">{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-success" value="Search Trip">
                                </div>
                            </div>
                            <div class="col-6">
                              <div class="form-group">
                                  <label>Start Date</label>
                                  <div class="input-group date" id="startdate" data-target-input="nearest">
                                      <input type="text" name="search_date" class="form-control datetimepicker-input" value="{{ old('search_date') }}" data-target="#startdate" required>
                                      <div class="input-group-append" data-target="#startdate" data-toggle="datetimepicker">
                                          <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                      </div>
                                  </div>
                              </div>
                            </div>
                          </div>
                    </form>

                  </div>
              </div>
          </div>
      </div>
    </section>
    <!-- /.content -->



  </div>
  <!-- /.content-wrapper -->
  @include('pages.footer')

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
</body>
@stop

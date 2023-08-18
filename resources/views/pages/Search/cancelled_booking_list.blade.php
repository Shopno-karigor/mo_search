@extends('master')
@section('cancelledBookingQueries')
  <title>BusTech OMS | Cancelled Booking Queries</title>
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
            <h1>Cancelled Booking Queries</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('/')}}">Home</a></li>
              <li class="breadcrumb-item"><a href="#">Booking</a></li>
              <li class="breadcrumb-item active">Cancelled Booking Queries</li>
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
            <!-- Default box -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">All Cancelled Booking Queries</h3>

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
                @if(Session('error'))
                  <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-ban"></i> Error!</h5>
                    {{ Session('error') }}
                  </div>
                @endif
                @if(Session('success'))
                  <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-check"></i> Success!</h5>
                    {{ Session('success') }}
                  </div>
                @endif
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>Details</th>
                      <th>Cancelled By</th>
                      <th>Type</th>
                      <th>Pickup Address</th>
                      <th>Dropoff Address</th>
                      <th>School Name</th>
                      <th>Accommodable</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if (isset($data))
                      @foreach ($data as $key=>$row)
                        <tr>
                          <td><a href="{{route('booking-query-details',$row->booking_id)}}" class="btn btn-success">Details</a></td>
                          <td>{{$row->cancelled_by.' - '.$row->cancel_reason}}</td>
                          <td>{{strtoupper($row->trip_type)}}</td>
                          <td>{{$row->pickup_time.' - '.$row->pickup_address.' ('.$row->pickup_post_code.')'}}</td>
                          <td>{{$row->dropoff_address.' ('.$row->dropoff_post_code.')'}}</td>
                          <td>{{$row->school_name}}</td>
                            <td>@if ($row->is_acceptable=="yes")
                                <span class="btn btn-success" >{{strtoupper($row->is_acceptable)}}</span>
                            @elseif($row->is_acceptable=="maybe")
                                <span class="btn btn-warning" >{{strtoupper($row->is_acceptable)}}</span>
                            @else
                                <span class="btn btn-danger" >{{strtoupper($row->is_acceptable)}}</span>
                            @endif
                            </td>
                        </tr> 
                      @endforeach
                    @endif
                  </tbody>
                  <tfoot>
                    <tr>
                        <th>Details</th>
                        <th>Cancelled By</th>
                        <th>Type</th>
                        <th>Pickup Address</th>
                        <th>Dropoff Address</th>
                        <th>School Name</th>
                        <th>Accommodable</th>
                      </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
              <!-- /.card-footer-->
            </div>
            <!-- /.card -->
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

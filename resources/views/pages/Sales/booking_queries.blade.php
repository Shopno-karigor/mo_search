@extends('master')
@section('bookingQueries')
  <title>BusTech OMS | Booking Query List</title>
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
            <h1>Booking Query List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('/')}}">Home</a></li>
              <li class="breadcrumb-item"><a href="#">Sales</a></li>
              <li class="breadcrumb-item active">Booking Query List</li>
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
                <h3 class="card-title">All Booking Queries</h3>

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
                      <th>Approve</th>
                      <th>Delete</th>
                      <th>Trip Code</th>
                      <th>Student Name</th>
                      <th>Pickup Time</th>
                      <th>Pickup Address</th>
                      <th>Dropoff Address</th>
                      <th>Accommodable</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if (isset($data))
                      @foreach ($data as $key=>$row)
                        <tr>
                          <td><a href="" class="btn btn-success approve-booking-button" data-toggle="modal" data-target="#approve-booking" data-booking="{{$row->booking_id}}">Approve</a></td>
                          <td><a href="" class="btn btn-danger cancel-booking-button" data-toggle="modal" data-target="#cancel-booking" data-booking="{{$row->booking_id}}" >Delete</a></td>
                          <td>{{$row->school_code."/".strtoupper($row->trip_type)}}</td>
                          <td>{{$row->children_name}}</td>
                          <td>{{$row->pickup_time}}</td>
                          <td>{{$row->pickup_address.' ('.$row->pickup_post_code.')'}}</td>
                          <td>{{$row->dropoff_address.' ('.$row->dropoff_post_code.')'}}</td>
                          <td>
                              @if ($row->is_acceptable=="yes")
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
                        <th>Approve</th>
                        <th>Delete</th>
                        <th>Trip Code</th>
                        <th>Student Name</th>
                        <th>Pickup Time</th>
                        <th>Pickup Address</th>
                        <th>Dropoff Address</th>
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

    <!-- Approve booking query  -->
    <div class="modal fade" id="approve-booking">
      <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p class="text-center">This booking will be approved. Please confirm the action</p>
              <div class="row">
                  <div class="col">
                      <form action="{{route('approve-booking-query')}}" method="POST">
                        @csrf
                          <div class="form-group">
                              <label>Payment Status</label>
                              <select class="form-control @error('is_paid') is-invalid @enderror" name="is_paid" required>
                                <option selected="selected" disabled>Select payment status</option>
                                <option value="yes">Paid</option>
                                <option value="no">Not-Paid</option>
                              </select>
                          </div>
                          <input type="hidden" id="approved-booking" name="booking_id" value="">
                          <input type="submit" class="btn btn-warning" value="Confirm">
                      </form>
                  </div>
              </div>
            </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    <!-- Cancel booking query  -->
    <div class="modal fade" id="cancel-booking">
      <div class="modal-dialog modal-lg">
        <div class="modal-content bg-danger">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <p class="text-center">This booking query will be deleted. Please confirm the action</p>
                <div class="row">
                    <div class="col">
                        <form action="{{route('cancel-booking-query')}}" method="POST">
                          @csrf
                            <div class="form-group">
                                <label>Provide cancelation reason</label>
                                <input type="text" class="form-control" name="cancel_reason" required placeholder="Cancelation reason here">
                            </div>
                            <input type="hidden" id="deleted-booking" name="booking_id" value="">
                            <input type="submit" class="btn btn-warning" value="Confirm">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
      
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

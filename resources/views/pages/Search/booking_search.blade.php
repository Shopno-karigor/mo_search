@extends('master')
@section('bookingQuery')
  <title>BusTech OMS | Booking Query</title>
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
            <h1>Booking Query</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('/')}}">Home</a></li>
              <li class="breadcrumb-item active">Booking Query</li>
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
                      We can accomodate your children now. Please review the bellow details and confirm the order.
                  </div>
      
                  <div class="invoice p-3 mb-3">
                    <div class="row">
                      <div class="col-12">
                        <h4>
                          <i class="fas fa-bus"></i> BusTech Leasing Pte Ltd
                          <small class="float-right">Date: {{date('d/m/Y')}}</small>
                        </h4>
                      </div>
                    </div>
      
                    <div class="row invoice-info">
                      <div class="col-sm-4 invoice-col">
                          Pickup Address
                        <address>
                          <strong>{{$response_booking->pickup_address}}</strong><br>
                          Singapore {{$response_booking->pickup_post_code}}<br>
                          Time: {{$response_booking->pickup_time}}<br>
                        </address>
                      </div>
                      <div class="col-sm-4 invoice-col">
                        Drop off address
                        <address>
                        <strong>{{$response_booking->dropoff_address}}</strong><br>
                        Singapore {{$response_booking->dropoff_post_code}}<br>
                        Time: {{$response_booking->dropoff_time}}<br>
                        </address>
                      </div>
                      <div class="col-sm-4 invoice-col">
                        <b>School Name: {{$response_booking->school_name}}</b><br>
                        <br>
                        <b>Seat count:</b> {{$response_booking->seat}}<br>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-12 table-responsive">
                        <table class="table table-striped">
                          <thead>
                            <tr>
                              <th>Seat</th>
                              <th>Distance (KM)</th>
                              <th>Base Fair</th>
                              <th>Subtotal</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td>1</td>
                              <td>3.4 Km</td>
                              <td>5 SGD/KM</td>
                              <td>$16.20</td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>

                    <div class="row no-print">
                      <div class="col-12">
                        <button type="button" class="btn btn-success float-right confirm-query-button" data-toggle="modal" data-target="#confirm-query" data-booking="{{$response_booking->id}}">
                          <i class="far fa-check-square"></i> Accept
                        </button>
                        <button type="button" class="btn btn-danger float-right cancel-booking-button" data-toggle="modal" data-target="#cancel-query" data-booking="{{$response_booking->id}}" style="margin-right: 5px;">
                          <i class="fas fa-window-close"></i> Cancel Query
                        </button>
                      </div>
                    </div>
                  </div>
              </div>
          </div>
      </div>
    </section>
    <!-- /.content -->

    <!-- Cancel booking query  -->
    <div class="modal fade" id="cancel-query">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <p class="text-center">Please provide your contact number. Our support team will reach you</p>
                <div class="row">
                    <div class="col">
                        <form action="{{route('cancel-from-query')}}" method="POST">
                          @csrf
                            <div class="form-group">
                                <label>Cancelation reason</label>
                                <input type="text" class="form-control" name="cancel_reason" placeholder="Canclation reason here">
                            </div>
                            <div class="form-group">
                                <label>Your name</label>
                                <input type="text" class="form-control" name="parent_name" placeholder="Your name here">
                            </div>
                            <div class="form-group">
                                <label>Contact number</label>
                                <input type="text" class="form-control" name="contact" placeholder="Contact number here">
                            </div>
                            <input type="hidden" id="deleted-booking" name="booking_id" value="">
                            <input type="submit" class="btn btn-warning" value="Submit">
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

    <!-- Confirm booking query  -->
    <div class="modal fade" id="confirm-query">
      <div class="modal-dialog modal-lg">
        <div class="modal-content bg-success">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <p class="text-center">Please provide the following information to confirm the order.</p>
                <div class="row">
                    <div class="col">
                        <form action="{{route('confirm-query')}}" method="POST">
                          @csrf
                            <div class="form-group">
                                <label>Student Name</label>
                                <input type="text" class="form-control" name="children_name" placeholder="Student name here">
                            </div>
                            <div class="form-group">
                              <label>Student ID</label>
                              <input type="text" class="form-control" name="student_id" placeholder="Student ID here">
                            </div>
                            <div class="form-group">
                                <label>Parent name</label>
                                <input type="text" class="form-control" name="parent_name" placeholder="Your name here">
                            </div>
                            <div class="form-group">
                                <label>Contact number</label>
                                <input type="text" class="form-control" name="contact" placeholder="Contact number here">
                            </div>
                            <input type="hidden" id="confirmed-query" name="booking_id" value="">
                            <input type="submit" class="btn btn-warning" value="Submit">
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

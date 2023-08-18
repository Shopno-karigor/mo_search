@extends('master')
@section('bookingQuery')
  <title>BusTech OMS | Booking Query</title>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<!-- Site wrapper -->
<div class="wrapper">

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Booking Query</h1>
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
                <h3 class="card-title">Booking Query Form</h3>
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
                <form action="{{route('submit-booking-query')}}" method="post" enctype="multipart/form-data" autocomplete="off">
                  @csrf
                    <div class="row">
                        <div class="col-6">
                          <div class="form-group">
                              <label>Trip Direction</label>
                              <select class="form-control @error('trip_type') is-invalid @enderror" name="trip_type" required>
                                <option value="in">Home to School</option>
                                <option value="out">School to Home</option>
                                <option value="in">School to Student Care</option>
                                <option value="out">Student Care to School</option>
                              </select>
                          </div>
                          <div class="form-group">
                            <label>Select School</label>
                            <select class="form-control select2 select2-hidden-accessible" id="school-list" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true" name="school_id">
                              <option selected="selected" disabled>Select School</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-6">
                          <div class="form-group">
                              <label>Total Seat</label>
                              <input type="number" min="1" class="form-control @error('seat') is-invalid @enderror" placeholder="1" value="{{ old('seat') }}" name="seat" required>
                                @error('seat')
                                  <p class="text-danger">{{ $message }}</p>
                                @enderror
                          </div>
                          <div class="form-group">
                            <label>School Code/Name</label>
                            <input type="text" class="form-control @error('school_name') is-invalid @enderror" id="school-name" placeholder="Enter your school name" value="{{ old('school_name') }}" name="school_name" readonly required>
                            @error('school_name')
                              <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        </div>
                        <div class="col-6">
                          <h4>Pickup Information</h4>
                          <div class="form-group">
                              <label>Pickup Address</label>
                              <input type="text" class="form-control @error('pickup_address') is-invalid @enderror" value="{{ old('pickup_address') }}" name="pickup_address" required placeholder="18 MANDAI ESTATE#03-05">
                              @error('pickup_address')
                                <p class="text-danger">{{ $message }}</p>
                              @enderror
                          </div>
                          <div class="form-group">
                            <label>Pickup Postal Code</label>
                            <input type="text" class="form-control @error('pickup_post_code') is-invalid @enderror" value="{{ old('pickup_post_code') }}" name="pickup_post_code" required placeholder="62967233">
                            @error('pickup_post_code')
                              <p class="text-danger">{{ $message }}</p>
                            @enderror
                          </div>
                          <div class="form-group">
                            <label>Pickup Time</label>
                            <select class="form-control @error('pickup_time') is-invalid @enderror" name="pickup_time" required>
                              <option value="0630">6.30 AM</option>
                              <option value="0700">7.00 AM</option>
                              <option value="0730">7.30 AM</option>
                              <option value="0800">8.00 AM</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-6">
                          <h4>Dropoff Information</h4>
                          <div class="form-group">
                              <label>Dropoff Address</label>
                              <input type="text" class="form-control @error('dropoff_address') is-invalid @enderror" value="{{ old('dropoff_address') }}" name="dropoff_address" required placeholder="50 Raffles PI #25-01">
                              @error('dropoff_address')
                                <p class="text-danger">{{ $message }}</p>
                              @enderror
                          </div>
                          <div class="form-group">
                              <label>Dropoff Postal Code</label>
                              <input type="text" class="form-control @error('dropoff_post_code') is-invalid @enderror" value="{{ old('dropoff_post_code') }}" name="dropoff_post_code" required placeholder="65356523">
                              @error('dropoff_post_code')
                                <p class="text-danger">{{ $message }}</p>
                              @enderror
                          </div>
                          <div class="form-group">
                              <label>Dropoff Time</label>
                              <select class="form-control @error('dropoff_time') is-invalid @enderror" name="dropoff_time" required>
                                <option value="0130">1.30 PM</option>
                                <option value="0200">2.00 PM</option>
                                <option value="0230">2.30 PM</option>
                                <option value="0300">3.00 PM</option>
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

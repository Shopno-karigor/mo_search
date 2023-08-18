@extends('master')
@section('bookingQuery')
  <title>BusTech OMS | Assign Driver</title>
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
            <h1>Assign Driver</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('/')}}">Home</a></li>
              <li class="breadcrumb-item"><a href="">Operation</a></li>
              <li class="breadcrumb-item active">Assign Driver</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Assign Driver</h3>
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
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
                        <div class="row">
                            <div class="col-12 col-sm-4">
                                <div class="info-box bg-light">
                                    <div class="info-box-content">
                                        <span class="info-box-text text-center text-muted">Pickup</span>
                                        <span class="info-box-number text-center text-muted mb-0" data-school-code="{{$data[0]->school_code}}" data-trip-direction="{{strtoupper($data[0]->trip_type)}}">{{$data[0]->school_code." ".strtoupper($data[0]->trip_type).' ('.$data[0]->pickup_time.')'}}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="info-box bg-light">
                                    <div class="info-box-content">
                                        <span class="info-box-text text-center text-muted">Pickup details</span>
                                        <span class="info-box-number text-center text-muted mb-0">{{$data[0]->pickup_address.' ('.$data[0]->pickup_post_code.')'}}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="info-box bg-light">
                                    <div class="info-box-content">
                                        <span class="info-box-text text-center text-muted">Dropoff details</span>
                                        <span class="info-box-number text-center text-muted mb-0">{{$data[0]->dropoff_address.' ('.$data[0]->dropoff_post_code.')'}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <form action="{{route('store-trip')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                      <div class="row">
                                          <div class="col-6">
                                            <div class="form-group">
                                                <label>Select Driver</label>
                                                <select class="form-control select2 select2-hidden-accessible" id="driver-list" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true" name="driver_id" required>
                                                  <option selected="selected" disabled>Select driver</option>
                                                  @foreach ($driver as $item)
                                                  <option value="{{$item->id}}" data-vehicle-number="{{$item->vehicle_number}}" data-driver-name="{{$item->name}}">{{$item->name}}</option>
                                                  @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Slot</label>
                                                <select class="form-control @error('slot_id') is-invalid @enderror" name="slot_id" id="driver-slot" required>
                                                  <option selected="selected" value="select" disabled>Select slot</option>
                                                  @foreach ($slot as $item)
                                                  <option value="{{$item->id}}" data-driver-slot="{{$item->slot_time}}">{{$item->slot_time}}</option>
                                                  @endforeach
                                                </select>
                                                @error('slot_id')
                                                  <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Task Pickup Time</label>
                                                <input type="text" class="form-control @error('trip_pickup_time') is-invalid @enderror" value="{{ old('trip_pickup_time') }}" name="trip_pickup_time" id="pickup-time" required>
                                                @error('trip_pickup_time')
                                                  <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <span class="btn btn-success" id="schedule-search-button">Check Schedule</span>
                                            </div>
                                          </div>
                                          <div class="col-6">
                                            <div class="form-group">
                                                <label>Vehicle Number</label>
                                                <input type="text" class="form-control" id="vehicle-number" value="" disabled>
                                            </div>
                                            <div class="form-group">
                                                <label>Start Date</label>
                                                <div class="input-group date" id="startdate" data-target-input="nearest">
                                                    <input type="text" name="start_date" class="form-control datetimepicker-input" value="{{ old('start_date') }}" data-target="#startdate" required>
                                                    <div class="input-group-append" data-target="#startdate" data-toggle="datetimepicker">
                                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>End Date</label>
                                                <div class="input-group date" id="enddate" data-target-input="nearest">
                                                    <input type="text" name="end_date" class="form-control datetimepicker-input" value="{{ old('end_date') }}" data-target="#enddate" required>
                                                    <div class="input-group-append" data-target="#enddate" data-toggle="datetimepicker">
                                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                    </div>
                                                </div>
                                            </div>
                                          </div>
                                          <div class="col-6">
                                            <div class="form-group">
                                                <label>Schedule Result</label>
                                                <input type="text" class="form-control" id="schedule-result" value="" disabled>
                                            </div>
                                          </div>
                                          <div class="col-6">
                                            <div class="form-group">
                                                <label>Trip Code</label>
                                                <input type="text" class="form-control trip-code" value="" disabled>
                                                @error('trip_code')
                                                  <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <input type="hidden" name="task_id" value="{{$data[0]->task_id}}">
                                          </div>
                                          <div class="form-group">
                                            <input type="hidden" class="trip-code" name="trip_code" value="">
                                          </div>
                                          <div class="col-6">
                                            <div class="form-group">
                                                <input type="submit" class="btn btn-success" value="Assign Driver">
                                            </div>
                                          </div>
                                      </div>
                                  </form>
                            </div>
                        </div>
                    </div>
            
                    <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
                        <div class="text-muted">
                            <p class="text-sm">Seat Count
                                <b class="d-block">{{$data[0]->seat}}</b>
                            </p>
                            <p class="text-sm">School Name
                                <b class="d-block">{{$data[0]->school_name}}</b>
                            </p>
                            <p class="text-sm">Student Name
                                <b class="d-block" id="student-name" data-student-name="{{$data[0]->children_name}}">{{$data[0]->children_name}}</b>
                            </p>
                            <p class="text-sm">Student ID
                                <b class="d-block">{{$data[0]->student_id}}</b>
                            </p>
                            <p class="text-sm">Parents Name
                                <b class="d-block">{{$data[0]->parent_name}}</b>
                            </p>
                            <p class="text-sm">Parents Contact
                                <b class="d-block">{{$data[0]->contact}}</b>
                            </p>
                        </div>
                        <div class="text-center mt-5 mb-3">
                            @if ($data[0]->organizer_accepted == 'no')
                                <a href="#" class="btn btn-sm btn-warning approve-task-button" data-toggle="modal" data-target="#approve-task" data-booking="{{$data[0]->booking_id}}">Approve Task</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </section>
    <!-- /.content -->
    <!-- Approve task  -->
    <div class="modal fade" id="approve-task">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="text-danger text-center"><b>This task will be approved. Please confirm the action</b></label>
                    </div>
                    <div class="row">
                        <div class="col"></div>
                        <div class="col">
                            <form action="{{route('approve-task')}}" method="POST">
                            @csrf
                                <input type="hidden" id="approved-task" name="booking_id" value="">
                                <input type="submit" class="btn btn-warning" value="Confirm">
                            </form>
                        </div>
                        <div class="col"></div>
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

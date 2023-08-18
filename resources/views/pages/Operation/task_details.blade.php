@extends('master')
@section('bookingQuery')
  <title>BusTech OMS | Task Details</title>
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
            <h1>Task Details</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('/')}}">Home</a></li>
              <li class="breadcrumb-item"><a href="">Operation</a></li>
              <li class="breadcrumb-item active">Task Details</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Task Details</h3>
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
                                        <span class="info-box-number text-center text-muted mb-0">{{$data[0]->school_code."-"."-".strtoupper($data[0]->trip_type).' ('.$data[0]->pickup_time.')'}}</span>
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
                                <h4>Timeline</h4>
                                <div class="post">
                                    <div class="user-block">
                                        <img class="img-circle img-bordered-sm" src="../../dist/img/user1-128x128.jpg" alt="user image">
                                        <span class="username">
                                        <a href="#">Jonathan Burke Jr.</a>
                                        </span>
                                        <span class="description">Cancelled the query- 7:45 PM today</span>
                                    </div>
                                    <p> </p>
                                </div>
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
                                <b class="d-block">{{$data[0]->children_name}}</b>
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
                                <a href="#" class="btn btn-sm btn-danger cancel-task-button" data-toggle="modal" data-target="#cancel-task" data-booking="{{$data[0]->booking_id}}">Delete Task</a>
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
        
    <!-- Cancel task  -->
    <div class="modal fade" id="cancel-task">
        <div class="modal-dialog modal-lg">
            <div class="modal-content bg-danger">
                <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <p class="text-center">This booking task will be deleted. Please confirm the action</p>
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

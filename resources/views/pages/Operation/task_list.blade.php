@extends('master')
@section('taskList')
  <title>BusTech OMS | Task List</title>
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
            <h1>Task List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('/')}}">Home</a></li>
              <li class="breadcrumb-item"><a href="#">Operation</a></li>
              <li class="breadcrumb-item active">Task List</li>
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
                <h3 class="card-title">All Tasks</h3>

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
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                        <th>Details</th>
                        <th>Pickup</th>
                        <th>Student</th>
                        <th>Pickup Information</th>
                        <th>Dropoff Information</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if (isset($data))
                      @foreach ($data as $key=>$row)
                        <tr>
                          <td><a href="{{route('task-details',$row->booking_id)}}" class="btn btn-success">Details</a></td>
                          <td>{{$row->school_code."-"."-".strtoupper($row->trip_type).' ('.$row->pickup_time.')'}}</td>
                          <td>{{$row->children_name}}</td>
                          <td>{{$row->pickup_address.' ('.$row->pickup_post_code.')'}}</td>
                          <td>{{$row->dropoff_address.' ('.$row->dropoff_post_code.')'}}</td>
                        </tr> 
                      @endforeach
                    @endif
                  </tbody>
                  <tfoot>
                    <tr>
                        <th>Details</th>
                        <th>Pickup</th>
                        <th>Student</th>
                        <th>Pickup Information</th>
                        <th>Dropoff Information</th>
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

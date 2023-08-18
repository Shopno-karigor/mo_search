@extends('master')
@section('tripList')
  <title>BusTech OMS | Ongoing Trip List</title>
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
            <h1>Ongoing Trip List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('/')}}">Home</a></li>
              <li class="breadcrumb-item"><a href="#">Trip</a></li>
              <li class="breadcrumb-item active">Ongoing Trip List</li>
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
                <h3 class="card-title">Trip List for - {{today()->format('d-m-Y');}}</h3>

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
                        <th>Name</th>
                        <th>Vehicle Number</th>
                        @foreach ($slots as $slot)
                        <th>{{$slot->slot_time}}</th>
                        @endforeach
                    </tr>
                  </thead>
                  <tbody>
                    @php $marker="1" @endphp
                    @if (isset($drivers))
                      @foreach ($drivers as $driver)
                        <tr>
                          <td>{{$driver->name}}</td>
                          <td>{{$driver->vehicle_number}}</td>
                          @foreach ($slots as $slot)
                            @foreach ($trips as $trip)
                                @if ($trip->driver_id == $driver->id)
                                    @if ($trip->slot_id == $slot->id)
                                          <td>{{$trip->trip_code}}</td>
                                          @php $marker="0" @endphp
                                          @break
                                    @else
                                        @php $marker="1" @endphp
                                    @endif
                                @else
                                        @php $marker="1" @endphp
                                @endif
                            @endforeach
                                @if ($marker==1)
                                    <td></td>
                                @endif
                          @endforeach

                        </tr>
                      @endforeach
                    @endif
                  </tbody>
                  <tfoot>
                    <tr>
                        <th>Name</th>
                        <th>Vehicle Number</th>
                        @foreach ($slots as $slot)
                        <th>{{$slot->slot_time}}</th>
                        @endforeach
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

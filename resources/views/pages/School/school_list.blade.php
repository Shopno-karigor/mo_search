@extends('master')
@section('schoolList')
  <title>BusTech OMS | School List</title>
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
            <h1>School List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('/')}}">Home</a></li>
              <li class="breadcrumb-item"><a href="#">School</a></li>
              <li class="breadcrumb-item active">School List</li>
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
                <h3 class="card-title">All Schools</h3>

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
                    <th>Delete</th>
                    <th>Edit</th>
                    <th>School Name</th>
                    <th>School Address</th>
                    <th>School Postal Code</th>
                    <th>School Contact</th>
                  </tr>
                  </thead>
                  <tbody>
                    @if (isset($data))
                      @foreach ($data as $key=>$row)
                        <tr>
                          <td><a href="{{route('edit-school',$row->id)}}" class="btn btn-success">Update</a></td>
                          <td><a href="" class="btn btn-danger delete-school-button" data-toggle="modal" data-target="#delete-school" data-school="{{$row->id}}" >Delete</a></td>
                          <td>{{$row->name}}</td>
                          <td>{{$row->address}}</td>
                          <td>{{$row->post_code}}</td>
                          <td>{{$row->school_code}}</td>
                        </tr> 
                      @endforeach
                    @endif
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>Delete</th>
                      <th>Update</th>
                      <th>School Name</th>
                      <th>School Address</th>
                      <th>School Postal Code</th>
                      <th>School Contact</th>
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

        <!-- Delete school  -->
        <div class="modal fade" id="delete-school">
          <div class="modal-dialog modal-sm">
          <div class="modal-content">
              <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
              </div>
              <div class="modal-body">
                  <div class="form-group">
                      <label class="text-danger text-center"><b>This school will be deleted. Please confirm the action</b></label>
                  </div>
                  <div class="row">
                      <div class="col"></div>
                      <div class="col">
                          <form action="{{route('destroy-school')}}" method="POST">
                            @csrf
                              <input type="hidden" id="deleted-school" name="schoolId" value="">
                              <input type="submit" class="btn btn-danger" value="Confirm">
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

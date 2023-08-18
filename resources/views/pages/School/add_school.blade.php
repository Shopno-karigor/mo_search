@extends('master')
@section('addSchool')
  <title>BusTech OMS | Add School</title>
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
            <h1>Add School</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('/')}}">Home</a></li>
              <li class="breadcrumb-item active">Add School</li>
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
                <h3 class="card-title">Add School Form</h3>
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
                <form action="{{route('add-school')}}" method="post" enctype="multipart/form-data">
                  @csrf
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label>School Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" name="name" required>
                                @error('name')
                                  <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                              <label>School Address</label>
                              <input type="text" class="form-control @error('address') is-invalid @enderror" value="{{ old('address') }}" name="address" required>
                              @error('address')
                                <p class="text-danger">{{ $message }}</p>
                              @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>School Postal Code</label>
                                <input type="text" class="form-control @error('post_code') is-invalid @enderror" value="{{ old('post_code') }}" name="post_code" required>
                                @error('post_code')
                                  <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                              <label>School Code</label>
                              <input type="text" class="form-control @error('school_code') is-invalid @enderror" value="{{ old('school_code') }}" name="school_code" required>
                              @error('school_code')
                                <p class="text-danger">{{ $message }}</p>
                              @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <input type="submit" class="btn btn-success" value="Save School">
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

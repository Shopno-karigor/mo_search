@extends('master')
@section('addOperator')
  <title>Reducing International Roaming Cost</title>
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
            <h1>Add Operator</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('/')}}">Home</a></li>
              <li class="breadcrumb-item active">Add Operator</li>
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
                <h3 class="card-title">Add Operator Form</h3>
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
                <form action="{{route('store-operator')}}" method="post" enctype="multipart/form-data">
                  @csrf
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label>Operator Name</label>
                                <input type="text" class="form-control @error('operator_name') is-invalid @enderror" value="{{ old('operator_name') }}" name="operator_name" required>
                                @error('operator_name')
                                  <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Select Country</label>
                                <select class="form-control select3 select3-hidden-accessible @error('country_id') is-invalid @enderror" style="width: 100%;" data-select3-id="1" tabindex="-1" aria-hidden="true" name="country_id" required>
                                  <option selected="selected" disabled>Select Country</option>
                                  @foreach ($countries as $item)
                                  <option value="{{$item->id}}">{{$item->country_name}}</option>
                                  @endforeach
                                </select>
                                  @error('country_id')
                                      <p class="text-danger">{{ $message }}</p>
                                  @enderror
                            </div>
                            
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label>Domestic Call Price</label>
                                <input type="text" class="form-control @error('domestic_call') is-invalid @enderror" value="{{ old('domestic_call') }}" name="domestic_call" required>
                                @error('domestic_call')
                                  <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Domestic SMS Price</label>
                                <input type="text" class="form-control @error('domestic_sms') is-invalid @enderror" value="{{ old('domestic_sms') }}" name="domestic_sms" required>
                                @error('domestic_sms')
                                  <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                              <label>Domestic Internet Price</label>
                              <input type="text" class="form-control @error('domestic_internet') is-invalid @enderror" value="{{ old('domestic_internet') }}" name="domestic_internet" required>
                              @error('domestic_internet')
                                <p class="text-danger">{{ $message }}</p>
                              @enderror
                            </div>
                        </div>
                        <div class="col-3">
                          <div class="form-group">
                              <label>International Call Price</label>
                              <input type="text" class="form-control @error('international_call') is-invalid @enderror" value="{{ old('international_call') }}" name="international_call" required>
                              @error('international_call')
                                <p class="text-danger">{{ $message }}</p>
                              @enderror
                          </div>
                          <div class="form-group">
                              <label>International SMS Price</label>
                              <input type="text" class="form-control @error('international_sms') is-invalid @enderror" value="{{ old('international_sms') }}" name="international_sms" required>
                              @error('international_sms')
                                <p class="text-danger">{{ $message }}</p>
                              @enderror
                          </div>
                          <div class="form-group">
                            <label>International Internet Price</label>
                            <input type="text" class="form-control @error('international_internet') is-invalid @enderror" value="{{ old('international_internet') }}" name="international_internet" required>
                            @error('international_internet')
                              <p class="text-danger">{{ $message }}</p>
                            @enderror
                          </div>
                      </div>
                        <div class="col-6">
                            <div class="form-group">
                                <input type="submit" class="btn btn-success" value="Save Operator">
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

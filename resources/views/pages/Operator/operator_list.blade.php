@extends('master')
@section('operatorList')
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
            <h1>Operator List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('/')}}">Home</a></li>
              <li class="breadcrumb-item"><a href="#">Operator</a></li>
              <li class="breadcrumb-item active">Operator List</li>
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
                <h3 class="card-title">All Operators</h3>

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
                      <th>Operator Name</th>
                      <th>Country</th>
                      <th>Domestic Call Price</th>
                      <th>Domestic SMS Price</th>
                      <th>Domestic Internet Price</th>
                      <th>International Call Price</th>
                      <th>International SMS Price</th>
                      <th>International Internet Price</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if (isset($data))
                      @foreach ($data as $item)
                        <tr>
                          <td><a href="{{route('edit-operator',$item->operator_id)}}" class="btn btn-success">Update</a></td>
                          <td><a href="" class="btn btn-danger delete-operator-button" data-toggle="modal" data-target="#delete-operator" data-operator="{{$item->operator_id}}" >Delete</a></td>
                          <td>{{$item->operator_name}}</td>
                          <td>{{$item->country_name}}</td>
                          <td>{{$item->domestic_call}} USD</td>
                          <td>{{$item->domestic_sms}} USD</td>
                          <td>{{$item->domestic_internet}} USD</td>
                          <td>{{$item->international_call}} USD</td>
                          <td>{{$item->international_sms}} USD</td>
                          <td>{{$item->international_internet}} USD</td>
                        </tr>
                      @endforeach
                    @endif
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>Delete</th>
                      <th>Edit</th>
                      <th>Operator Name</th>
                      <th>Country</th>
                      <th>Domestic Call Price</th>
                      <th>Domestic SMS Price</th>
                      <th>Domestic Internet Price</th>
                      <th>International Call Price</th>
                      <th>International SMS Price</th>
                      <th>International Internet Price</th>
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

    <!-- Delete operator  -->
    <div class="modal fade" id="delete-operator">
      <div class="modal-dialog modal-sm">
      <div class="modal-content">
          <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
          </div>
          <div class="modal-body">
              <div class="form-group">
                  <label class="text-danger text-center"><b>This operator will be deleted. Please confirm the action</b></label>
              </div>
              <div class="row">
                  <div class="col"></div>
                  <div class="col">
                      <form action="{{route('destroy-operator')}}" method="POST">
                        @csrf
                          <input type="hidden" id="deleted-operator" name="operatorId" value="">
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

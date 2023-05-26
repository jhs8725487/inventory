
@include('users/head')
<body class="hold-transition sidebar-mini layout-fixed">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  @include('users/topnav')
  <!-- /.navbar -->

   <!-- Sidebar -->
   @include('users/sidebar')

 
    <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>DataTables</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">DataTables</li>
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
            <!-- /.card -->

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">DataTable with default features</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <a href="{{ route('register-client') }}" class="btn btn-success" >Add Client</a>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Calles</th>
                    <th>Number</th>
                    <th>Action</th>
                  </tr>
                  </thead>

                <tbody>
                    @foreach ($clients as $client)
                    <tr>
                    <td>{{ $client->id }}</td>
                    <td>
                    <img src="{{ $client->default_image ?? asset('images/client.png') }}" alt="Client Image" style="width: 80px; height: auto;">
                    
                    </td>
                    <td>{{ $client->name }}</td>
                    <td>{{ $client->email }}</td>
                    <td>{{ $client->address_street }}</td>
                    <td>{{ $client->phone_number }}</td>
                    <td>
                    <a href="{{ route('clients.edit', $client->id) }}" class="btn btn-primary">Update</a>
                    </td>
                    </tr>
                    @endforeach
                </tbody>



                  <tfoot>
                  <tr>
                    <th>#</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Calles</th>
                    <th>Number</th>
                    <th>Action</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  @include('users/footer')
</body>






</html>

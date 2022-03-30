@extends('layouts.master')
@section('content')
<div class="content-wrapper" style="height: 80vh !important">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Dish Page</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <a href="{{ route('dish.create') }}" class="btn btn-outline-success float-right">Add News</a>
        </div>
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
  @if (session('status'))
  <div class="alert alert-success" id="msg">
      {{ session('status') }}
  </div>
@endif
  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Id</th>
                  <th>Name</th>
                  <th>Category</th>
                  <th>Action</th>
      
                </tr>
                </thead>
                <tbody>
                  @php
                    $i=1;
                  @endphp
                  @foreach ($dishes as $dish)
                  <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $dish->name }}</td>
                   <td>{{ $dish->category->name}}</td>
                    <td>
                      <a href="{{ route('dish.edit', $dish->id) }}" class="btn btn-warning">Edit</a>
                      <form action="{{ route('dish.destroy', $dish->id) }}" method="post" class="d-inline-block" onclick="confirm('Are you sure want to delete ?')">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                      </form>
                    </td>
                  </tr>
                @endforeach
                </tbody>
             
              </table>
            </div>
            <!-- /.card-body -->
          </div>
        </div>
        <!-- /.col-md-6 -->
       
        <!-- /.col-md-6 -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>
@endsection
<script src="../../plugins/jquery/jquery.min.js"></script>

<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "pageLength" : 5,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });

  setTimeout(() => {
    document.querySelector("#msg").style.display="none";
  }, 3000);
</script>
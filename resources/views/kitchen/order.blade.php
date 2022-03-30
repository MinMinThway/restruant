@extends('layouts.master')
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Order Page</h1>
        </div><!-- /.col -->
   
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      @if (session('status'))
      <div class="alert alert-success" id="msg">
          {{ session('status') }}
      </div>
    @endif
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <table id="example2" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Id</th>
                  <th>Dish</th>
                  <th>Table No</th>
                  <td>Status</td>
                  <th>Action</th>
      
                </tr>
                </thead>
                <tbody>
                  @php
                    $i=1;
                  @endphp
                  @foreach ($orders as $order)
                  <tr>
                    <td>{{ $order->order_id }}</td>
                    <td>{{ $order->dish->name }}</td>
                   <td>{{ $order->table_id}}</td>
                   <td>{{$status[$order->status]}}</td>
                    <td>
                      <a href="{{ route('satus.approve', $order->id) }}" class="btn btn-warning">Approve</a>
                      <a href="{{ route('satus.cancle', $order->id) }}" class="btn btn-danger">Cancle</a>
                      <a href="{{ route('satus.ready', $order->id) }}" class="btn btn-success">Ready</a>
                    </td>
                  </tr>
                @endforeach
                </tbody>
             
              </table>
            </div>
          </div>

        </div>

        <!-- /.col-md-6 -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>
@endsection
<script src="../../plugins/jquery/jquery.min.js"></script>

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
</script>
@extends('layouts.master')
@section('content')
<div class="content-wrapper" style="height: 80vh !important">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Creating Category</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <a href="{{ route('category.index') }}" class="btn btn-outline-success float-right">Black</a>
        </div>
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <!-- /.card-header -->
            <div class="card-body">
             <form action="{{ route('category.store') }}" method="post">
                @csrf
                 <div class="form-group">
                     <label for="name">Category Name</label>
                     <input type="text" name="name" id="" class="form-control">
                     @error('name')
                      <div class="text-danger">*{{ $message }}</div>
                     @enderror
                 </div>
                 <button class="btn btn-success">Submit</button>
             </form>
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

<!-- Page specific script -->

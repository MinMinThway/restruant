@extends('layouts.master')
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">User Management Page</h1>
        
        </div><!-- /.col -->
   
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <div class="row">
                  <div class="col-6">
                    <h5 class="card-title">Creating user</h5><br>
                  </div>
                  <div class="col-6">
                    <a href="{{ route('user.index') }}" class="btn btn-warning float-right">Back</a>
                  </div>
              </div>
              @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('user.update', $user->id) }}" method="POST">
                    @csrf @method('PUT')
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" value="{{ $user->name }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" value="{{ $user->email }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" value="{{ $user->password }}" class="form-control">
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" {{ $user->status ? 'checked' : '' }} type="checkbox" name="status" id="defaultCheck1">
                        <label class="form-check-label" for="defaultCheck1">
                          Is Admin
                        </label>
                      </div>
                    <button class="btn btn-success mt-3">Submit</button>
                </form>
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
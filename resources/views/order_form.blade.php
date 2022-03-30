<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order Form</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
</head>
<body>
    <div class="row">
        <div class="card">
          @if (session('status'))
          <div class="alert alert-success" id="msg">
              {{ session('status') }}
          </div>
        @endif
            <div class="card-body">
                <div class="col-12 col-sm-12">
                    <div class="card card-primary card-tabs">
                      <div class="card-header p-0 pt-1">
                        <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                          <li class="nav-item">
                            <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">New Order</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">Order List</a>
                          </li>
                         
                        </ul>
                      </div>
                      <div class="card-body">
                        <div class="tab-content" id="custom-tabs-one-tabContent">
                          <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                            <form action="{{ route('order.submit') }}" method="post">
                                @csrf
                            <div class="row w-100">      
                                @foreach ($dishes as $dish)
                                    <div class="col-3">
                                        <img src="{{ asset('image/'.$dish->image) }}" width="100%" alt="">
                                        <div class="form-group">
                                            <label for="">{{ $dish->name }}</label>
                                        <input type="number" name="{{ $dish->id }}" id="" class="form-control">
                                        </div>
                                    </div>
                                @endforeach 
                                    
                                                              
                            </div>
                            <div class="form-group">
                                <label for="table">Table No</label>
                                <select name="table" id="">
                                  @foreach ($tables as $table)
                                    <option value="{{ $table->id }}">{{ $table->number }}</option>
                                  @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-success">Submit</button>
                        </form>
                        </div>
                          <div class="tab-pane fade" style="width: 1180px" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
                            <div class="card">
                              <div class="card-body">
                                <table id="example2" class="table table-bordered table-striped w-100">
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
                                        <a href="{{ route('status.serve', $order->id) }}" class="btn btn-warning">Serve</a>
                
                                      </td>
                                    </tr>
                                  @endforeach
                                  </tbody>
                               
                                </table>
                              </div>
                            </div>
                          </div>
                         
                        </div>
                      </div>
                      <!-- /.card -->
                    </div>
                  </div>
            </div>
        </div>
     
      </div>
      <!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
</body>
</html>
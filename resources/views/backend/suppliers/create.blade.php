@extends('backend.layouts.master')
<!-- css -->
@section('css')
@endsection

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Tạo người dùng</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Người dùng</a></li>
                    <li class="breadcrumb-item active">Tạo mới</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div>
@endsection
@section('content')
    <div class="container-fluid">
        <!-- Main row -->
        <div class="row">
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Tạo mới người dùng</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{Route('backend.supplier.store')}}" method="post" role="form" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên</label>
                                <input type="text" value="{{old('name')}}" class="form-control" id="" name="name" placeholder="Tên người dùng">
                                @error('name')
                                <i class="text-red">{{ $message }}</i>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                <input type="email" value="{{old('email')}}" class="form-control" id="" name="email" placeholder="Email">
                                @error('email')
                                <i class="text-red">{{ $message }}</i>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Phone</label>
                                <input type="text" value="{{old('phone')}}" class="form-control" name="phone" id="" placeholder="Số điện thoại">
                                @error('phone')
                                <i class="text-red">{{ $message }}</i>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Address</label>
                                <input type="text" value="{{old('address')}}" class="form-control" name="address" id="" placeholder="Địa chỉ">
                                @error('address')
                                <i class="text-red">{{ $message }}</i>
                                @enderror
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-success btn-sm">Tạo mới</button>
                            <a class="btn btn-danger btn-sm" href="{{Route('backend.supplier.index')}}">Huỷ bỏ</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.row (main row) -->
    </div>
@endsection

<!-- Script -->
@section('script')
@endsection

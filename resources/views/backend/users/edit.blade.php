@extends('backend.layouts.master')
<!-- css -->
@section('css')
@endsection

@section('content-header')
<div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Update người dùng</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Người dùng</a></li>
                    <li class="breadcrumb-item active">Edit</li>
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
                        <h3 class="card-title">Update người dùng</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{Route('backend.user.update',$user->id)}}" method="post" role="form" enctype="multipart/form-data">
                    @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên</label>
                                <input type="text" class="form-control" id="" name="name" value="{{old('name',$user->name)==$user->name?$user->name:old('name')}}">
                                @error('name')
                                <i class="text-red">{{ $message }}</i>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                <input type="email" class="form-control" id="" name="email" value="{{old('email',$user->email)==$user->email?$user->email:old('email')}}">
                                @error('email')
                                <i class="text-red">{{ $message }}</i>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Mật khẩu</label>
                                <input type="password" class="form-control" name="password" id="">
                                @error('password')
                                <i class="text-red">{{ $message }}</i>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Phone</label>
                                <input type="text" class="form-control" name="phone" id="" value="{{old('phone',$user->userinfo->phone)==$user->userinfo->phone?$user->userinfo->phone:old('phone')}}">
                                @error('phone')
                                <i class="text-red">{{ $message }}</i>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Address</label>
                                <input type="text" class="form-control" name="address" id="" value="{{old('address',$user->userinfo->address)==$user->userinfo->address?$user->userinfo->address:old('address')}}">
                                @error('address')
                                <i class="text-red">{{ $message }}</i>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Avatar</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input id="file-input" type="file" name="avatar" class="custom-file-input" id="exampleInputFile">
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="">Upload</span>
                                    </div>
                                </div>
                                <div id="preview"></div>
                                @error('avatar')
                                <i class="text-red">{{ $message }}</i>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Quyền</label>
                                <select class="form-control select2" name="role" style="width: 100%;">
                                    <option {{old('role',$user->role)=="1"? 'selected':''}} value="1">Admin</option>
                                    <option {{old('role',$user->role)=="0"? 'selected':''}} value="0">User</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Giới tính</label>
                                @foreach(\App\Models\Userinfo::$status_gender as $key => $value)
                                    <div class="form-check">
                                        <input class="form-check-input" {{old('gender',$user->userinfo->gender)==$key?'checked':''}} value="{{$key}}" type="radio" name="gender">
                                        <label>
                                            {{$value}}
                                        </label>
                                    </div>
                                @endforeach
                                @error('gender')
                                <i class="text-red">{{ $message }}</i>
                                @enderror
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-success btn-sm">Update</button>
                            <a class="btn btn-danger btn-sm" href="{{Route('backend.user.index')}}">Huỷ bỏ</a>
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

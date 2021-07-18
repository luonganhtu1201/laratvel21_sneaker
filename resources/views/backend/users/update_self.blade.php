@extends('backend.layouts.master')
<!-- css -->
@section('css')
@endsection

@section('content-header')
    <div class="container-fluid pb-5">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark"></h1>
            </div>
        </div><!-- /.row -->
    </div>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">

            <div class="col-md-4">
                <div class=" d-flex align-items-stretch flex-column">
                    <div class="card bg-light d-flex flex-fill">
                        <div class="card-header text-muted border-bottom-0" style="background-color: #f1f1f1">
                            <i class="fa fa-id-card pr-1" aria-hidden="true"></i> Tun<span style="color:red;">z</span> Card
                        </div>
                        <div class="card-body pt-0 pt-2">
                            <div class="row">
                                <div class="col-7">
                                    <h2 class="lead text-center">
                                        <b>{{$user->name}}</b>
                                        @if($user->userinfo->gender == 0)
                                            <i class="fa fa-mars" style="color: #0c84ff" aria-hidden="true"></i>
                                        @else
                                            <i class="fa fa-venus" style="color: red" aria-hidden="true"></i>
                                        @endif
                                    </h2>

                                    <ul class="ml-4 mb-0 fa-ul text-muted pt-2 pb-2">
                                        <li class="small pb-1"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Địa chỉ: {{$user->userinfo->address}}</li>
                                        <li class="small pb-1"><span class="fa-li"><i class="fa fa-envelope" aria-hidden="true"></i></span> Email: {{$user->email}}</li>
                                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Số điện thoại : {{$user->userinfo->phone}}</li>
                                    </ul>
                                    <p class="text-muted text-sm"><b>Chi nhánh : </b> 24A , Quốc Lộ 32 Thái Hòa - Ba Vì - Hà Nội </p>
                                </div>
                                <div class="col-5 text-center">
                                    <img src="{{url(\Illuminate\Support\Facades\Storage::url(Illuminate\Support\Facades\Auth::user()->userinfo->avatar))}}" alt="user-avatar" class="img-circle img-fluid" style="width: 128px;height: 128px;object-fit: cover;">
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center">
                            <hr class="w-75 mb-2 mt-0">
                        </div>
                    </div>
                </div>
                <div class="logo pt-3">
                    <img src="/frontend/images/logo-1.png" alt="" class="w-100 p-2 card" style="width: 100%">
                </div>

            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <div class="tab-content">
                            <h4 class="text-center">Cập nhật thông tin</h4>
                            <form action="{{Route('backend.user.update.self',$user->id)}}" class="form-horizontal" method="post" role="form" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row">
                                    <label for="inputName" class="col-sm-2 col-form-label">Tên</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="" name="name" value="{{old('name',$user->name)==$user->name?$user->name:old('name')}}">
                                        <input type="hidden" name="role" value="{{$user->role}}">
                                        @error('name')
                                        <i class="text-red">{{ $message }}</i>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" id="" name="email" value="{{old('email',$user->email)==$user->email?$user->email:old('email')}}">
                                        @error('email')
                                        <i class="text-red">{{ $message }}</i>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputName2" class="col-sm-2 col-form-label">Số điện thoại</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="phone" id="" value="{{old('phone',$user->userinfo->phone)==$user->userinfo->phone?$user->userinfo->phone:old('phone')}}">
                                        @error('phone')
                                        <i class="text-red">{{ $message }}</i>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputExperience" class="col-sm-2 col-form-label">Địa chỉ</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="address" id="" value="{{old('address',$user->userinfo->address)==$user->userinfo->address?$user->userinfo->address:old('address')}}">
                                        @error('address')
                                        <i class="text-red">{{ $message }}</i>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputExperience" class="col-sm-2 col-form-label">Giới tính</label>
                                    <div class="col-sm-10">
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
                                <div class="form-group row">
                                    <label for="inputSkills" class="col-sm-2 col-form-label">Mật Khẩu</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" name="password" id="">
                                        @error('password')
                                        <i class="text-red">{{ $message }}</i>
                                        @enderror
                                    </div>
                                </div><div class="form-group row">
                                    <label for="inputSkills" class="col-sm-2 col-form-label">Avatar</label>
                                    <div class="col-sm-10">
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
                                </div>
                                <div class="form-group row">
                                    <div class="offset-sm-2 col-sm-10">
                                        <button type="submit" class="btn btn-success">Cập nhật</button>
                                    </div>
                                </div>
                            </form>
                            <!-- /.tab-pane -->
                        </div>
                        <!-- /.tab-content -->
                    </div><!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
        @if(Session::has('success'))
            <script>
                toastr.success("{!! Session::get('success') !!}");
            </script>
        @elseif(Session::has('error'))
            <script>
                toastr.error("{!! Session::get('error') !!}");
            </script>
        @endif
        <!-- /.row -->
    </div>

@endsection

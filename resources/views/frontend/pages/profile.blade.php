@extends('frontend.layouts.master')
@section('css')
    <style>
        #profileImage:hover{
            transition: 0.4s;
            opacity: 0.7;
            filter: grayscale(100%);
            cursor: pointer;
        }
        #profileImage{
            height: 100%;
            object-fit: cover;
            border: 15px solid white;
            box-shadow: 10px 10px 10px -10px black;
        }
        #updateAvatar{
            border-radius: 50%;
            height: 37.44px;
            background-color: white;
            cursor: pointer;
            color: #b7b7b7;
        }
        #updateAvatar:hover{
            transition: 0.7s;
            text-shadow: 1px 1px 1px gray;
            box-shadow: 5px 5px 10px -2px gray;
        }
        .abc{
            background-color: {{\Illuminate\Support\Facades\Auth::user()->userinfo->gender == 0?'#cceaff':'#ffccdd'}};
        }
        .messcolor{
            color: red;
        }
    </style>
@endsection
@section('content')
    <div class="delivery-service-area ptb-30">
        <div class="container p-0">
            <div class="row w-100 m-0">
                <div class="col-12 pt-5">
                    <div class="row w-100 m-0">
                        <div class="col-12 col-lg-6 col-md-12 col-sm-12 mb-5 pt-5" style="background-color: {{\Illuminate\Support\Facades\Auth::user()->userinfo->gender == 0?'#cceaff':'#ffccdd'}}">
                            <div class="w-50 m-auto text-center">
                                <img id="profileImage" src="{{url(\Illuminate\Support\Facades\Storage::url(Illuminate\Support\Facades\Auth::user()->userinfo->avatar))}}" class="w-100 rounded-circle" alt="">
                                <p class="text-right m-0" style="font-size: 20px"><i id="updateAvatar" class="fa fa-camera p-2" aria-hidden="true"></i></p>
                                @error('avatar')
                                <i class="messcolor">{{ $message }}</i>
                                @enderror
                            </div>
                                <div class="row">
                                    <div class="col-12">
                                        <h3 class="text-center pt-2">
                                            <b>
                                                {{\Illuminate\Support\Facades\Auth::user()->name}}<br>
                                                @if(\Illuminate\Support\Facades\Auth::user()->userinfo->gender == 0)
                                                    <i class="fa fa-mars" style="color: #0c84ff" aria-hidden="true"></i>
                                                @else
                                                    <i class="fa fa-venus" style="color: red" aria-hidden="true"></i>
                                                @endif
                                            </b>
                                        </h3>
                                    </div>
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-0 col-lg-3 col-md-3 col-sm-3"></div>
                                            <div class="col-3 pr-0 pl-2 col-lg-3 col-md-3 col-sm-3">
                                                <p><b>Số điện thoại</b></p>
                                                <p><b>Email</b></p>
                                                <p><b>Địa Chỉ</b></p>
                                            </div>
                                            <div class="col-9 col-lg-5 col-md-5 col-sm-5 p-0">
                                                <p>: {{\Illuminate\Support\Facades\Auth::user()->userinfo->phone}}</p>
                                                <p>: {{\Illuminate\Support\Facades\Auth::user()->email}}</p>
                                                <p>: {{\Illuminate\Support\Facades\Auth::user()->userinfo->address}}</p>
                                            </div>
                                            <div class="col-0 col-lg-1 col-md-1 col-sm-1"></div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <div class="col-12 col-lg-6 col-md-12 col-sm-12">
                            <div id="accordion">
                                <div class="card">
                                    <div class="card-header abc" id="headingOne">
                                        <h5 class="mb-0">
                                            <div class="btn w-100" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                <p><b>Cập nhật thông tin</b></p>
                                            </div>
                                        </h5>
                                    </div>

                                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                                        <div class="card-body">
                                            <form action="{{Route('client.profile.update',\Illuminate\Support\Facades\Auth::user()->id)}}" method="post" role="form" enctype="multipart/form-data">
                                                @csrf
                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Tên</label>
                                                        <input type="text" class="form-control" id="" name="name" value="{{old('name',\Illuminate\Support\Facades\Auth::user()->name)==\Illuminate\Support\Facades\Auth::user()->name?\Illuminate\Support\Facades\Auth::user()->name:old('name')}}">
                                                        @error('name')
                                                        <i class="messcolor">{{ $message }}</i>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Email</label>
                                                        <input type="email" class="form-control" id="" name="email" value="{{old('email',\Illuminate\Support\Facades\Auth::user()->email)==\Illuminate\Support\Facades\Auth::user()->email?\Illuminate\Support\Facades\Auth::user()->email:old('email')}}">
                                                        @error('email')
                                                        <i class="messcolor">{{ $message }}</i>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Số điện thoại</label>
                                                        <input type="text" class="form-control" name="phone" id="" value="{{old('phone',\Illuminate\Support\Facades\Auth::user()->userinfo->phone)==\Illuminate\Support\Facades\Auth::user()->userinfo->phone?\Illuminate\Support\Facades\Auth::user()->userinfo->phone:old('phone')}}">
                                                        @error('phone')
                                                        <i class="messcolor">{{ $message }}</i>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Địa chỉ</label>
                                                        <input type="text" class="form-control" name="address" id="" value="{{old('address',\Illuminate\Support\Facades\Auth::user()->userinfo->address)==\Illuminate\Support\Facades\Auth::user()->userinfo->address?\Illuminate\Support\Facades\Auth::user()->userinfo->address:old('address')}}">
                                                        @error('address')
                                                        <i class="messcolor">{{ $message }}</i>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group" style="display: none">
                                                        <label for="exampleInputFile"></label>
                                                        <div class="input-group">
                                                            <div class="custom-file">
                                                                <input id="imageUpload" type="file" name="avatar" class="custom-file-input" id="exampleInputFile">
{{--                                                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>--}}
                                                            </div>
                                                        </div>
                                                        <div id="preview"></div>
                                                        @error('avatar')
                                                        <i class="messcolor">{{ $message }}</i>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <!-- /.card-body -->

                                                <div class="w-50 m-auto">
                                                    <button type="submit" class="btn btn-secondary rounded w-100">Cập nhật</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header abc" id="headingTwo">
                                        <h5 class="mb-0">
                                            <div class="btn w-100 collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                <b>Đổi mật khẩu</b>
                                            </div>
                                        </h5>
                                    </div>
                                    <div id="collapseTwo" class="collapse {{old(request()->newpassword)&&!(old(request()->name))?'show':''}}" aria-labelledby="headingTwo" data-parent="#accordion">
                                        <div class="card-body">
                                            <form action="{{Route('profile.update.pass',\Illuminate\Support\Facades\Auth::user()->id)}}" method="post" role="form" enctype="multipart/form-data">
                                            @csrf
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Mật khẩu mới</label>
                                                    <input type="password" class="form-control" name="newpassword" id="" value="">
                                                    @error('newpassword')
                                                    <i class="messcolor">{{ $message }}</i>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Xác nhận lại mật khẩu mới</label>
                                                    <input type="password" class="form-control" name="enterpass" id="" value="">
                                                    @error('enterpass')
                                                    <i class="messcolor">{{ $message }}</i>
                                                    @enderror
                                                </div>
                                                <div class="w-50 m-auto">
                                                    <button type="submit" class="btn btn-secondary updatePass-confirm rounded w-100">Cập nhật</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $("#updateAvatar").click(function(e) {
            $("#imageUpload").click();
        });

        function fasterPreview( uploader ) {
            if ( uploader.files && uploader.files[0] ){
                $('#profileImage').attr('src',
                    window.URL.createObjectURL(uploader.files[0]) );
            }
        }

        $("#imageUpload").change(function(){
            fasterPreview( this );
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
    <script>
        $('.updatePass-confirm').click(function (event) {
            var form = $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            swal({
                title: `Update Password ?`,
                text: "Are you sure you want to update your password ?",
                icon: "warning",
                buttons: ["No", "Yes"],
                dangerMode: true,
            })
                .then((willUpdate) => {
                    if (willUpdate) {
                        form.submit();
                    }
                });
        });
    </script>
@endsection

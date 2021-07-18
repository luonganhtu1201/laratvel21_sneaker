@extends('backend.layouts.master')
<!-- css -->
@section('css')
@endsection

@section('content-header')
<div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Danh sách người dùng</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Người dùng</a></li>
                    <li class="breadcrumb-item active">Danh sách</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div>
@endsection
@section('content')
<div class="container-fluid">
        <!-- Main row -->
        <div class="row">

            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Danh sách người dùng</h3>

                        <div class="card-tools">
                            <form action="" method="GET">
                                <div class="input-group input-group-sm" style="width: 150px;">
                                    <input value="{{request()->key_search}}" type="text" name="key_search" class="form-control float-right" placeholder="Tìm Kiếm ...">

                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        @if(\Illuminate\Support\Facades\Auth::user()->role == 3)
                        <div class="card-tools pr-5">
                            <form action="{{Route('backend.user.filter')}}" method="GET">
                                <div class="input-group input-group-sm" >
                                    <select name="role" id="" class="form-control">
                                        <option {{request()->role == -1?'selected':''}} value="-1">--Chọn danh mục--</option>
                                        <option {{request()->role == 1?'selected':'' }} value="1">Admin</option>
                                        <option {{request()->role == 0?'selected':'' }} value="0">User</option>
                                    </select>
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default">Lọc</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        @endif
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tên</th>
                                <th>Email</th>
                                <th>Quyền</th>
                                <th>Chức năng</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $us)
                            <tr>
                                <td>{{$us->id}}</td>
                                <td>{{$us->name}}</td>
                                <td>{{$us->email}}</td>
                                @if($us->role==1)
                                    <td><span class="badge badge-success">{{$us->role_text}}</span></td>
                                @else
                                    <td><span class="badge badge-warning"> {{$us->role_text}}</span></td>
                                @endif
                                <td>
                                @if(\Illuminate\Support\Facades\Gate::allows('role-check',$us))
                                    <a onclick="return confirm('Bạn có muốn xóa ?')" class="btn btn-danger btn-sm" href="{{Route('backend.user.destroy',['id'=>$us->id])}}"><i class="fas fa-trash"></i></a>
                                @endif
                                    <a class="btn btn-success btn-sm" href="{{Route('backend.user.edit',['id'=>$us->id])}}"><i class="fas fa-edit"></i></a>
                                </td>
{{--                                <td><a class="btn btn-danger btn-sm" href="{{Route('backend.user.destroy',['id'=>$us->id])}}"><i class="fas fa-trash"></i></a>--}}
{{--                                    <a class="btn btn-success btn-sm" href="{{Route('backend.user.edit',['id'=>$us->id])}}"><i class="fas fa-edit"></i></a></td>--}}

                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-center mt-3">
                            {!! $users->appends(request()->input())->links() !!}
                        </div>
                    </div>
                    <!-- /.card-body -->

                </div>
                <!-- /.card -->
            </div>
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
        <!-- /.row (main row) -->
    </div>
@endsection

<!-- Script -->
@section('script')
@endsection

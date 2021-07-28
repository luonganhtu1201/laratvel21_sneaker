@extends('backend.layouts.master')
@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Bình luận</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Bình luận</a></li>
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
                        <h3 class="card-title">Danh sách bình luận</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tên Người Dùng</th>
                                <th>Nội dung</th>
                                <th>Trang chính</th>
                                <th>Trạng thái</th>
                                <th class="text-center">Chức năng</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($comments as $key => $cmt)
                                @php
                                    $a = $cmt->product['slug'];
                                @endphp
                                <tr>
                                    <td>{{$cmt->id}}</td>
                                    <td>{{$cmt->user->name}}</td>
                                    <td>{{$cmt->content}}</td>
                                    <td>
                                        <a href="{{route('productimg.home',"$a")}}" target="_blank">{{$cmt->product['name']}}</a>
                                    </td>
                                    @if($cmt->status == 0)
                                        <td><span class="badge badge-secondary">{{$cmt->status_text}}</span></td>
                                    @elseif($cmt->status == 1)
                                        <td><span class="badge badge-success">{{$cmt->status_text}}</span></td>
                                    @endif
                                    <td class="text-center">
                                        @can('delete',$cmt)
                                            @if($cmt->status == 0)
                                                <a onclick="return confirm('Duyệt bình luận ?')" class="btn btn-success btn-sm" href="{{Route('backend.comments.success',$cmt->id)}}"><i class="fa fa-check"></i></a>
                                                <a onclick="return confirm('Không duyệt ... Bình luận sẽ được xóa và bạn không thể khôi phục lại ?')" class="btn btn-danger btn-sm" href="{{Route('backend.comments.destroy',$cmt->id)}}"><i class="fa fa-ban"></i></a>
                                            @elseif($cmt->status == 1)
                                                <a onclick="return confirm('Xóa bình luận này ?')" class="btn btn-outline-danger btn-sm" href="{{Route('backend.comments.destroy',$cmt->id)}}"><i class="fa fa-trash mr-2"></i> Xóa</a>
                                            @endif
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-center mt-3">
                            {!! $comments->appends(request()->input())->links() !!}
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

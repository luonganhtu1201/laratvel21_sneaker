@extends('backend.layouts.master')
<!-- css -->
@section('css')
@endsection

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Quản lý đơn hàng</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Sản phẩm</a></li>
                    <li class="breadcrumb-item active">Nhập hàng</li>
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
                        <h3 class="card-title"></h3>

                        <div class="card-tools">
                            <form action="" method="GET">
                                <div class="input-group input-group-sm" style="width: 150px;">
                                    <input type="text" value="{{request()->key_search}}" name="key_search" class="form-control float-right" placeholder="Tìm kiếm .... ">

                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="card-tools pr-5">
                            <form action="{{route('backend.show.imports')}}" method="GET">
                                <div class="input-group input-group-sm" >
                                    <select name="choice" id="" class="form-control">
                                        <option {{old('choice',request()->choice)==5?'selected':''}} value="5">--Lọc theo lựa chọn--</option>
                                        <option {{old('choice',request()->choice)==1?'selected':''}} value="1">Hóa đơn tăng dần</option>
                                        <option {{old('choice',request()->choice)==2?'selected':''}} value="2">Hóa đơn giảm dần</option>
                                        <option {{old('choice',request()->choice)==3?'selected':''}} value="3">Đơn giá mới nhất</option>
                                        <option {{old('choice',request()->choice)==4?'selected':''}} value="4">Đơn giá cũ nhất</option>
                                    </select>
                                    <select name="status" id="" class="form-control">
                                        <option {{old('status',request()->status)==2?'selected':''}} value="2">--Lọc theo trạng thái--</option>
                                        <option {{old('status',request()->status)==0?'selected':''}} value="0">Đợi duyệt đơn</option>
                                        <option {{old('status',request()->status)==1?'selected':''}} value="1">Nhập hàng thành công</option>
                                        <option {{old('status',request()->status)==-1?'selected':''}} value="-1">Hủy đơn</option>
                                    </select>
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default">Lọc</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-center">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tên KH</th>
                                <th>Số Điện Thoại</th>
                                <th>Địa chỉ</th>
                                <th>Tổng tiền</th>
                                <th>Chi tiết đặt hàng</th>
                                <th>Trạng thái</th>
                                <th>Duyệt đơn</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($import as $order)
                                <tr>
                                    <td>{{$order->id}}</td>
                                    <td>{{$order->name}}</td>
                                    <td>{{$order->phone}}</td>
                                    <td>{{$order->address}}</td>
                                    <td>{{number_format($order->total).' VNĐ'}}</td>
                                    <td>
                                        @if($order->status == 1)
                                            <a href="{{Route('backend.bill.import',['id'=>$order->id])}}">Chi tiết</a>
                                        @endif
                                    </td>
                                    @if($order->status == 0)
                                        <td><span class="badge badge-secondary">{{$order->status_pro}}</span></td>
                                    @elseif ($order->status == 1)
                                        <td><span class="badge badge-success">{{$order->status_pro}}</span></td>
                                    @elseif ($order->status == -1)
                                        <td><span class="badge badge-danger">{{$order->status_pro}}</span></td>
                                    @endif
                                    <td>
                                        @if($order->status == 0)
                                            <a class="btn btn-success btn-sm" href="{{route('backend.import.pro',['id'=>$order->id])}}"><i class="fa fa-cart-plus pr-1" aria-hidden="true"></i> Đã nhận hàng</a>
                                            <a class="btn btn-danger btn-sm" href="{{route('backend.ban.import',['id'=>$order->id])}}"><i class="fa fa-ban pr-1" aria-hidden="true"></i> Hủy đơn</a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>

                        </table>
                        <div class="d-flex justify-content-center mt-3">
                            {!! $import->appends(request()->input())->links() !!}
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

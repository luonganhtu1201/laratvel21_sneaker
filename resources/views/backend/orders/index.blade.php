@extends('backend.layouts.master')
<!-- css -->
@section('css')
@endsection

@section('content-header')
<div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Danh sách Order</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Sản phẩm</a></li>
                    <li class="breadcrumb-item active">Order</li>
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
                        <h3 class="card-title">Order</h3>

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
                            <form action="{{route('backend.order.filter')}}" method="GET">
                                <div class="input-group input-group-sm" >
                                    <select name="choice" id="" class="form-control">
                                        <option {{old('choice',request()->choice)==-1?'selected':''}} value="-1">--Lọc theo lựa chọn--</option>
                                        <option {{old('choice',request()->choice)==1?'selected':''}} value="1">Hóa đơn tăng dần</option>
                                        <option {{old('choice',request()->choice)==2?'selected':''}} value="2">Hóa đơn giảm dần</option>
                                        <option {{old('choice',request()->choice)==3?'selected':''}} value="3">Đơn giá mới nhất</option>
                                        <option {{old('choice',request()->choice)==4?'selected':''}} value="4">Đơn giá cũ nhất</option>
                                    </select>
                                    <select name="status" id="" class="form-control">
                                        <option {{old('status',request()->status)==0?'selected':''}} value="0">--Lọc theo trạng thái--</option>
                                        <option {{old('status',request()->status)==-6?'selected':''}} value="-6">Đợi duyệt</option>
                                        <option {{old('status',request()->status)==1?'selected':''}} value="1">Nhận đơn</option>
                                        <option {{old('status',request()->status)==2?'selected':''}} value="2">Đang giao</option>
                                        <option {{old('status',request()->status)==3?'selected':''}} value="3">Giao thành công</option>
                                        <option {{old('status',request()->status)==-1?'selected':''}} value="-1">Shop hủy đơn</option>
                                        <option {{old('status',request()->status)==-2?'selected':''}} value="-2">Khách yêu cầu hủy đơn</option>
                                        <option {{old('status',request()->status)==-3?'selected':''}} value="-3">Shop đồng ý hoàn trả</option>
                                        <option {{old('status',request()->status)==-4?'selected':''}} value="-4">Hoàn trả thành công</option>
                                        <option {{old('status',request()->status)==-5?'selected':''}} value="-5">Khách hủy đơn</option>
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
                                <th>Hóa đơn</th>
                                <th>Trạng thái</th>
                                <th>Duyệt đơn</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $order)
                            <tr>
                                <td>{{$order->id}}</td>
                                <td>{{$order->name}}</td>
                                <td>{{$order->phone}}</td>
                                <td>{{$order->address}}</td>
                                <td>{{number_format($order->total).' VNĐ'}}</td>
                                <td>
                                    @if(!($order->status == -1 || $order->status == 0 || $order->status == -5))
                                        <a href="{{Route('backend.orders.products',['id'=>$order->id])}}">Hóa đơn</a>
                                    @endif
                                </td>

                                    @if($order->status == 0)
                                        <td><span class="badge badge-secondary">{{$order->status_goods}}</span></td>
                                    @elseif($order->status == 1)
                                        <td><span class="badge badge-info">{{$order->status_goods}}</span></td>
                                    @elseif($order->status == 2)
                                        <td><span class="badge badge-primary">{{$order->status_goods}}</span></td>
                                    @elseif($order->status == 3)
                                        <td><span class="badge badge-success">{{$order->status_goods}}</span></td>
                                    @elseif($order->status == -2)
                                        <td><span class="badge badge-secondary">{{$order->status_goods}}</span></td>
                                    @elseif($order->status == -3)
                                        <td><span class="badge badge-danger">{{$order->status_goods}}</span></td>
                                    @elseif($order->status == -4)
                                        <td><span class="badge badge-warning">{{$order->status_goods}}</span></td>
                                    @elseif($order->status == -5)
                                        <td><span class="badge badge-warning">{{$order->status_goods}}</span></td>
                                    @else
                                        <td><span class="badge badge-danger">{{$order->status_goods}}</span></td>
                                    @endif
                                <td>
                                    @if(!($order->status == 3 || $order->status == -1 || $order->status == -2 ||$order->status == -3 || $order->status == -4 || $order->status == -5))
                                        @if($order->status == 0)
                                            <a class="btn btn-info btn-sm" href="{{route('backend.orders.add',['id'=>$order->id])}}"><i class="fa fa-cart-plus pr-1" aria-hidden="true"></i> Nhận đơn</a>
                                        @elseif($order->status == 1)
                                            <a class="btn btn-primary btn-sm" href="{{route('backend.orders.add',['id'=>$order->id])}}"><i class="fa fa-car pr-1" aria-hidden="true"></i> Giao hàng</a>
                                        @elseif($order->status == 2)
                                            <a class="btn btn-success btn-sm" href="{{route('backend.orders.add',['id'=>$order->id])}}"><i class="fa fa-check pr-1" aria-hidden="true"></i> Giao thành công</a>
                                        @endif
                                            <a onclick="return confirm('Bạn có chắc chắn muốn hủy đơn này ?')" class="btn btn-danger btn-sm" href="{{route('backend.orders.cancel',['id'=>$order->id])}}"><i class="fa fa-ban" aria-hidden="true"></i> Hủy đơn</a>
{{--                                        <a class="btn btn-success btn-sm" href="{{route('backend.orders.add',['id'=>$order->id])}}"><i class="fa fa-check" aria-hidden="true"></i></a>--}}
                                    @endif
                                    @if($order->status == -2)
                                            <a onclick="return confirm('Nhận hàng trả về ?')" class="btn btn-success btn-sm" href="{{route('backend.orders.okreturn',['id'=>$order->id])}}"><i class="fa fa-check" aria-hidden="true"></i></a>
                                            <a onclick="return confirm('Xác nhận không nhận trả hàng ?')" class="btn btn-danger btn-sm" href="{{route('backend.orders.noreturn',['id'=>$order->id])}}"><i class="fa fa-times" aria-hidden="true"></i></a>
                                    @endif
                                    @if($order->status == -3)
                                            <a onclick="return confirm('Đã nhận được hàng trả về ?')" class="btn btn-success btn-sm" href="{{route('backend.orders.successreturn',['id'=>$order->id])}}"><i class="fa fa-check pr-1" aria-hidden="true"></i>Đã nhận được hàng</a>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                            </tbody>

                        </table>
                        <div class="d-flex justify-content-center mt-3">
                            {!! $orders->appends(request()->input())->links() !!}
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

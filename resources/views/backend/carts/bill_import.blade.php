@extends('backend.layouts.master')
<!-- css -->
@section('css')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">
@endsection

@section('content-header')
@endsection
@section('content')
    <div class="container-fluid">
        <!-- Main row -->
        <div class="row">

            <div class="col-12">
                <div class="card">
                    <div class="card-body table-responsive p-3">
                        <div class="row">
                            <div class="col-12">
                                <h4>
                                    <i class="fa fa-star" style="color: red" aria-hidden="true"></i> Tun<span style="color: red">z</span> Sneaker
                                </h4>
                            </div>
                            <!-- /.col -->
                        </div>
                        <p><h2 class="text-center pb-3">CHI TIẾT ĐẶT HÀNG</h2></p>
                        <!-- info row -->
                        <div class="row invoice-info">
                            <div class="col-sm-4 invoice-col">
                                Từ :
                                <address>
                                    <strong>{{$order->name}}</strong><br>
                                    {{$order->address}}<br>
                                    Phone: {{$order->phone}}<br>
                                </address>
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4 invoice-col">
                                Đến :
                                <address>
                                    <strong>Tunz,</strong><br>
                                    24A , Quốc Lộ 32<br>
                                    Thái Hòa - Ba Vì - Hà Nội.<br>
                                    Phone: (+84) 344 659 691<br>
                                    Email: contact@tunz.support
                                </address>
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4 invoice-col">
                                <b>Thông tin Order</b><br>
                                <br>
                                <b>ID Order : </b>{{$order->id}}<br>
                                <b>Ngày Order : </b>{{$order->created_at}}<br>
                                <b>ID Khách Hàng : </b> {{$order->user_id}}
                            </div>
                            <!-- /.col -->
                        </div>
                    </div>
                    <div class="card-body table-responsive p-2">
                        <table class="table table-hover">
                            <thead>
                            <tr class="table-dark">
                                <th >ID</th>
                                <th>Tên sản phẩm</th>
                                <th>Màu sắc</th>
                                <th>Đơn giá</th>
                                <th>Thành tiền</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $key => $product)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$product->name}} × <span>{{$product->qty}}</span></td>
                                    <td><i class="fa fa-tint pr-3" style="color: {{'#'.$product->color}};text-shadow: 2px 1px gray" aria-hidden="true"></i></td>
                                    <td>{{number_format($product->import_price).' VNĐ'}}</td>
                                    <td>{{number_format($product->qty*$product->import_price) .' VNĐ'}}</td>
                                </tr>
                            @endforeach
                            </tbody>

                        </table>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-body table-responsive p-3">
                        <div class="row">
                            <!-- accepted payments column -->

                            <!-- /.col -->
                            <div class="col-6">
                                <p class="lead">Cộng Tiền Hàng</p>

                                <div class="table-responsive">
                                    <table class="table">
                                        <tr>
                                            <th style="width:50%">Shipping</th>
                                            <td>Free</td>
                                        </tr>
                                        <tr>
                                            <th style="width:50%">VAT</th>
                                            <td>Giá sản phẩm đã bao gồm VAT</td>
                                        </tr>
                                        <tr>
                                            <th>Tổng tiền :</th>
                                            <td><b>{{number_format($order->total).' VNĐ'}}</b></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="d-flex justify-content-center">
                                    <img src="/backend/dist/img/condau.png" alt="">
                                </div>
                                <p class="text-center m-0"><b style="font-family: 'Dancing Script', cursive; font-size: 30px">Lương Anh Tú</b></p>

                            </div>
                            <!-- /.col -->
                        </div>
                    </div>
{{--                    <div class="no-print d-flex justify-content-end">--}}
{{--                        <a href="" onclick="window.print()" rel="noopener" class="btn btn-info mr-2">--}}
{{--                            <i class="fas fa-print pr-1"></i> In--}}
{{--                        </a>--}}
{{--                        <a href="{{route('backend.orders.index')}}" class="btn btn-secondary">--}}
{{--                            <i class="fa fa-reply pr-1" aria-hidden="true"></i>Về</a>--}}
{{--                    </div>--}}
                </div>
                <!-- /.card -->
            </div>
        </div>
        <!-- /.row (main row) -->
    </div>
    <script>
        // window.onload = function() {
        //     if(!window.location.hash) {
        //         window.location = window.location + '#loaded';
        //         window.location.reload();
        //     }
        // }
        // window.addEventListener("load", window.print());
    </script>
@endsection

<!-- Script -->
@section('script')
@endsection

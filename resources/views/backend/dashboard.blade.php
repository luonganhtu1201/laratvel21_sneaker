@extends('backend.layouts.master')
<!-- css -->
@section('css')
    <style>
        #area-chart,
        #line-chart,
        #bar-chart,
        #stacked,
        #pie-chart{
            min-height: 250px;
        }
    </style>
@endsection

@section('content-header')
<div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Dashboard</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard v1</li>
                        </ol>
                    </div><!-- /.col -->
                </div>
            </div>
        </div>
@endsection
@section('content')
<section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{$sumOrder}}</h3>

                                <p>Đơn hàng</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            <a href="{{route('backend.orders.index')}}" class="small-box-footer">Xem thêm <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>{{$countProduct}}</h3>

                                <p>Sản phẩm</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="{{route('backend.product.index')}}" class="small-box-footer">Xem thêm <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>{{$countUser}}</h3>

                                <p>Người dùng</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            <a href="{{route('backend.user.index')}}" class="small-box-footer">Xem thêm <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3>{{number_format($revenue)}}</h3>

                                <p>Doanh số</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
                            <a href="{{route('backend.statistical.index')}}" class="small-box-footer">Xem thêm <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                </div>
            </div>
        </section>
        <div class="w-100 m-auto row">
            <div class="col-8">
                <div class="w-100 row">
                    <h5>Thống kê 30 ngày gần nhất</h5>
                    <form action="" autocomplete="off">
                        @csrf
{{--                        <div class="col-2">--}}
{{--                            <p>Từ ngày :--}}
{{--                                <input type="text" class="form-control" id="datepicker">--}}
{{--                                <input type="button" id="btn-dashboard-filter" class="btn btn-success btn-sm" value="Lọc">--}}
{{--                            </p>--}}
{{--                        </div>--}}
{{--                        <div class="col-2">--}}
{{--                            <p>Đến ngày :--}}
{{--                                <input type="text" id="datepicker2" class="form-control">--}}
{{--                            </p>--}}
{{--                        </div>--}}
                    </form>

                    <div class="col-12">
                        <div id="myfirstchart" style="height: 100%;width: 100%"></div>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card" style="border-left: 7px solid #ed1f24;">
                    <div id="timedate">
                        <a id="mon">January</a>-
                        <a id="d">1</a>-
                        <a id="y">0</a><br />
                        <a id="h">12</a> :
                        <a id="m">00</a> :
                        <a id="s">00</a>
                        <a hidden id="mi">000</a>
                    </div>
                </div>

                <div class="card card-body">
                    <table class="table text-center table-dark table-striped w-100">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Admin Mới</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($admins as $admin)
                            <tr>
                                <td>
                                    <img src="{{url(\Illuminate\Support\Facades\Storage::url($admin->userinfo->avatar))}}" class="img-circle elevation-2" alt="User Image" style="width: 35px;height: 35px;object-fit: cover; ">
                                </td>
                                <td>{{$admin->name}}</td>
                                <td>
                                    @if($admin->userinfo->gender == 0)
                                        <i class="fa fa-mars" style="color: #0c84ff" aria-hidden="true"></i>
                                    @else
                                        <i class="fa fa-venus" style="color: red" aria-hidden="true"></i>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
        <div class="row w-100 pt-5 pb-5 m-0" >
            <div class="col-4 p-0" style="background-color: #2c3034">
                <div class="imgTop w-25 m-auto text-center">
                    <div class="imgcr w-50 pt-5 m-auto">
                        <img src="/backend/dist/img/crown4.png" alt="" class="w-100" style="object-fit: cover;">
                    </div>
                    <img src="{{url(\Illuminate\Support\Facades\Storage::url($topUser[0]->userinfo->avatar))}}" class="img-circle elevation-2 w-100" alt="User Image" style="object-fit: cover; ">
                </div>
                <h2 class="text-center pt-2 text-white">
                    {{$topUser[0]->name}}<br>
                    @if($topUser[0]->userinfo->gender == 0)
                        <i class="fa fa-mars" style="color: #0c84ff" aria-hidden="true"></i>
                    @else
                        <i class="fa fa-venus" style="color: red" aria-hidden="true"></i>
                    @endif
                </h2>
            </div>
            <div class="col-8 p-0">
                <table class="table text-center w-100 m-0" >

                    <tr class="text-white thead-dark">
                        <th colspan="2">Khách hàng nổi bật</th>
                        <th>Đơn đã order</th>
                        <th>Tổng mua</th>
                    </tr>

                    <tbody>
                    @foreach($topUser as $us)
                        <tr>
                            <td>
                                <img src="{{url(\Illuminate\Support\Facades\Storage::url($us->userinfo->avatar))}}" class="img-circle elevation-2" alt="User Image" style="width: 35px;height: 35px;object-fit: cover; ">
                            </td>
                            <td>{{$us->name}}
                                @if($us->userinfo->gender == 0)
                                    <i class="fa fa-mars pl-1" style="color: #0c84ff" aria-hidden="true"></i>
                                @else
                                    <i class="fa fa-venus pl-1" style="color: red" aria-hidden="true"></i>
                                @endif
                            </td>
                            <td>{{$us->orders->where('status',3)->count('id')}}</td>
                            <td>{{number_format($us->orders->where('status',3)->sum('total')).' $'}}</td>
                        </tr>
                    @endforeach
                    </tbody>

                </table>
            </div>
        </div>

        <div class="row w-100 text-center">
            <div class="col-6">
                <div class="card">
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover table-striped">
                            <thead>
                                <tr>
                                    <td colspan="3"><h5>Sản phẩm mới nhập</h5></td>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <td>
                                        @if(count($product->images)>0)
                                            <img class="rounded-circle" src="{{$product->images[0]->image_url}}" width="60px">
                                        @endif
                                    </td>
                                    <td>{{$product->name}}</td>
                                    @if($product->status == 1)
                                        <td><span class="badge badge-success">{{$product->status_text}}</span></td>
                                    @elseif($product->status == 0)
                                        <td><span class="badge badge-warning">{{$product->status_text}}</span></td>
                                    @elseif($product->status == -1)
                                        <td><span class="badge badge-danger">{{$product->status_text}}</span></td>
                                    @endif
                                </tr>

                            @endforeach

                            </tbody>
                        </table>
                        <div>
{{--                            {!! $products->links() !!}--}}
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <div class="col-6">
                <div class="card">
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover table-striped">
                            <thead>
                                <tr>
                                    <td colspan="2"><h5>Sản phẩm bán chạy</h5></td>
                                    <td>Size</td>
                                    <td>Màu</td>
                                    <td>Đã bán</td>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($topSale as $ware)
                                <tr>
                                    <td>
                                        @if(count($ware->product->images)>0)
                                            <img class="rounded-circle" src="{{$ware->product->images[0]->image_url}}" width="60px">
                                        @endif
                                    </td>
                                    <td>{{$ware->product->name}}</td>
                                    <td>{{$ware->size}}</td>
                                    <td ><p class="text-center"><i class="fa fa-tint" style="color: {{'#'.$ware->color}};text-shadow: 2px 1px gray" aria-hidden="true"></i></p></td>
                                    <td>{{$ware->sold_goods}}</td>
                                </tr>

                            @endforeach

                            </tbody>
                        </table>
                        <div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
@endsection

<!-- Script -->
@section('script')
    <script>
        $(document).ready(function (){
            $('#calendar').datetimepicker({
                format: 'L',
                inline: true
            });
        });

    </script>
@endsection

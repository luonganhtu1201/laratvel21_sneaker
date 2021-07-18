@extends('backend.layouts.master')
@section('css')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;900&display=swap" rel="stylesheet">
    <style>
        tspan{
            font-family: 'Roboto', sans-serif
        }
    </style>
@endsection
@section('content-header')
    <div class="container-fluid">
        <div class="row w-100 mb-2">
            <div class="col-sm-6">
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Thống kê</a></li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row w-100">
            <div class="col-12">
                <div class="pb-2">
                    <div class="card-body table-responsive p-0">
                        <form action="" autocomplete="off">
                            @csrf
                            <div class="row w-100 input-group input-group-sm">
                                <div class="col-6">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-4">
                                                    Từ Ngày :
                                                </div>
                                                <div class="col-8">
                                                    Đến ngày :
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-4">
                                                    <input type="text" class="form-control" id="datepicker">
                                                </div>
                                                <div class="col-4">
                                                    <input type="text" class="form-control" id="datepicker2">
                                                </div>
                                                <div class="col-4">
                                                    <input type="button" id="btn-dashboard-filter" class="btn btn-secondary w-50 h-100 btn-sm" value="Lọc">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <p>
                                        Lọc Theo :
                                        <select name="data_filter" id="" class="dashboard-filter form-control">
                                            <option value="">--Chọn--</option>
                                            <option value="7ngay">7 ngày trước</option>
                                            <option value="thangtruoc">Tháng trước</option>
                                            <option value="thangnay">Tháng này</option>
                                            <option value="1nam">1 năm qua</option>
                                        </select>
                                    </p>
                                </div>
                            </div>

                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>
                <div class="card">
                    <div id="myfirstchart" class="w-100" style="height: 100%;width: 100%"></div>
                </div>
            </div>
            <div class="col-4">
                <div class="card">
                    <div class="card-header border-0">
                        <h3 class="card-title">
                            <i class="fa fa-shopping-cart pr-1" aria-hidden="true"></i>
                            Đơn đặt
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="" id="donutOrder"></div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function () {
            var donutOrder =  Morris.Donut({
                element: 'donutOrder',
                resize: true,
                colors: [

                    '#6ca7ea',
                    '#ff0000',
                    '#f6864a',
                    '#fab32f',
                    '#4842f5',

                ],
                //labelColor:"#cccccc", // text color
                //backgroundColor: '#333333', // border color
                data: [
                    {label:"Thành công", value: <?php echo $success ?>},
                    {label:"Khách hủy", value: <?php echo $usCancel ?>},
                    {label:"Không nhận", value: <?php echo $shopCancel ?>},
                    {label:"Trả hàng", value: <?php echo $return ?>},
                ]
            });

        });
    </script>
@endsection
@section('css')

    @endsection

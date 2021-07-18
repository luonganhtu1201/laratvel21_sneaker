@extends('backend.layouts.master')
<!-- css -->
@section('css')

@endsection

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Thông tin nhập hàng</h1>
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
    <div class="container-fluid p-5">
        <div class="row">
            <div class="col-6">
                <p class="pb-2"><h4>Chọn nhà cung cấp</h4></p>
                <table>
                    <form action="">
                        @csrf
                        @foreach($check as $ck)
                            <tr>
                                <td><a href="#" class="pr-2 checkit" data-id_sup="{{$ck->id}}">
                                        <input type="radio" name="check">
                                    </a>
                                </td>
                                <td>{{$ck->name}}</td>
                            </tr>
                        @endforeach
                    </form>
                </table>
            </div>
            <div class="col-6">
                <p class="pb-2"><h4>Thông tin nhà cung cấp</h4></p>
                <form action="{{route('backend.add.ware')}}" method="POST">
                    @csrf
                    <div id="sup_name" class="pb-1">
                        <input type="text" class="form-control" disabled name="">
                    </div>
                    <div id="sup_email" class="pb-1">
                        <input type="text" class="form-control" disabled name="">
                    </div>
                    <div id="sup_phone" class="pb-1">
                        <input type="text" class="form-control" disabled name="">
                    </div>
                    <div id="sup_address" class="pb-1">
                        <input type="text" class="form-control" disabled name="">
                    </div>
                    @if(count($items)!=0)
                        <div id="sup_submit" class="pb-1">
                    @endif

{{--                        <p class="d-flex justify-content-end"><input type="submit" class="btn btn-success d-inline-block" value="Xác nhận nhập hàng"></p>--}}
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <div class="card-body table-responsive p-0">
                <table class="table table-striped text-center">
                    <thead>
                        <tr>
                            <th>Images</th>
                            <th>Tên sản phẩm</th>
                            <th>Số lượng</th>
                            <th>Size</th>
                            <th>Màu sắc</th>
                            <th>Giá nhập</th>
                            <th>Thành tiền</th>
                            <th>Chức năng</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($items as $item)
                            <tr>
                                <td><img width="60px" class="rounded-circle" src="{{url(\Illuminate\Support\Facades\Storage::url($item->options->image))}}" alt=""></td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->qty}}</td>
                                <td>{{$item->options->size}}</td>
                                <td>
                                    <p style="width: 35px;height: 35px;background-color: {{'#'.$item->options->color}}"
                                       class="d-flex justify-content-center m-auto rounded-circle shadow p-3 mb-5 rounded"></p>
                                </td>
                                <td>{{$item->price}}</td>
                                <td>{{number_format($item->price*$item->qty).' $'}}</td>
                                <td class="remove-item"><a href="{{ route('backend.import.remove', ['id' => $item->rowId]) }}"><i class="fa fa-trash text-red"></i></a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="card-body table-responsive p-3">
        <div class="row">
            <!-- accepted payments column -->
            <div class="col-6">
            </div>
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
                            <td><b>{{number_format(\Gloudemans\Shoppingcart\Facades\Cart::instance('import-product')->subtotal())  .' $'}}</b></td>
                        </tr>
                    </table>
                </div>
            </div>
            <!-- /.col -->
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
@endsection

<!-- Script -->
@section('script')
    <script>
        $('.checkit').click(function (){
            var supplier_id = $(this).data('id_sup');
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url:"{{url('/admin/import-goods/supp')}}",
                method:"POST",
                dataType:"JSON",
                data:{supplier_id:supplier_id,_token:_token},
                success:function (data){
                    $('#sup_name').html(data.supp_name);
                    $('#sup_email').html(data.supp_email);
                    $('#sup_phone').html(data.supp_phone);
                    $('#sup_address').html(data.supp_address);
                    $('#sup_submit').html(data.supp_submit);
                }
            });
        });
    </script>
@endsection

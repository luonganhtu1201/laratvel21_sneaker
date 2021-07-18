@extends('backend.layouts.master')
<!-- css -->
@section('css')

@endsection

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Danh sách Kho</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Kho</a></li>
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
                        <div class="card-tools pr-5">
                            @if(!request()->warepro)
                            <form action="" method="GET">
                                <div class="input-group input-group-sm" >
                                    <select name="warehouses" id="" class="form-control">
                                        <option {{old('warehouses',request()->warehouses)==-1?'selected':''}} value="-1">---Chọn Lọc---</option>
                                        <option {{old('warehouses',request()->warehouses)==1?'selected':''}} value="1">Sắp hết hàng</option>
                                        <option {{old('warehouses',request()->warehouses)==2?'selected':''}} value="2">Tồn kho</option>
                                        <option {{old('warehouses',request()->warehouses)==3?'selected':''}} value="3">Mới - Cũ</option>
                                        <option {{old('warehouses',request()->warehouses)==4?'selected':''}} value="4">Cũ - Mới</option>
                                        <option {{old('warehouses',request()->warehouses)==5?'selected':''}} value="5">Bán chạy</option>
                                    </select>
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default">Lọc</button>
                                    </div>
                                </div>
                            </form>
                            @endif
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-striped text-center">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tên Sản phẩm</th>
                                <th>Size</th>
                                <th>Màu sắc</th>
                                <th>Nhập vào</th>
                                <th>Đã bán</th>
                                <th>Tồn kho</th>
                                <th>Nhập thêm hàng</th>
                                <th>Chức năng</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($warehouses as $ware)
                                <tr>
                                    <td>{{$ware->id}}</td>
                                    <td>{{$ware->product->name}}</td>
                                    <td>{{$ware->size}}</td>
                                    <td ><p class="text-center"><i class="fa fa-tint" style="color: {{'#'.$ware->color}};text-shadow: 2px 1px gray" aria-hidden="true"></i></p></td>
                                    <td>{{$ware->import_goods}}</td>
                                    <td>{{$ware->sold_goods}}</td>
                                    <td>{{$ware->inventory}}</td>
                                    <td>
                                        <form action="{{route('backend.import.product',['id'=>$ware->product_id])}}">
                                            @csrf
                                            <input type="number" min="1" value="" class="form-control d-inline-block w-25" name="qty">
                                            <input type="hidden" value="{{$ware->product->name}}" class="form-control d-inline-block w-25" name="product_name">
                                            <input type="hidden" value="{{$ware->product->origin_price}}" class="form-control d-inline-block w-25" name="input_price">
                                            <input type="hidden" value="{{$ware->size}}" class="form-control d-inline-block w-25" name="size">
                                            <input type="hidden" value="{{$ware->color}}" class="form-control d-inline-block w-25" name="color">
                                            <button type="submit" class="btn btn-success"><i class="fa fa-cart-plus" aria-hidden="true"></i></button>
                                        </form>
                                    </td>
                                    <td>
{{--                                        @can('delete',$ware)--}}
{{--                                            <a onclick="return confirm('Bạn có muốn xóa ?')" class="btn btn-danger btn-sm" href="{{Route('backend.warehouse.destroy',['id'=>$ware->id])}}"><i class="fas fa-trash"></i></a>--}}
{{--                                        @endcan--}}
{{--                                        @can('update',$ware)--}}
{{--                                            <a class="btn btn-success btn-sm" href="{{Route('backend.warehouse.edit',['id'=>$ware->id])}}"><i class="fas fa-edit"></i></a>--}}
{{--                                        @endcan--}}
                                        @can('create',\App\Models\Warehouse::class)
                                            <a class="btn btn-primary btn-sm" href="{{route('backend.warehouse.create',['id'=>$ware->product_id])}}"><i class="fa fa-plus" aria-hidden="true"></i></a>
                                        @endcan

                                    </td>
                                </tr>
                            @endforeach
                            </tbody>

                        </table>
                        <div class="d-flex justify-content-center mt-3">
                            {!! $warehouses->appends(request()->input())->links() !!}
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
        <!-- /.row (main row) -->
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
    </div>
@endsection

<!-- Script -->
@section('script')
@endsection

@extends('backend.layouts.master')
<!-- css -->
@section('css')
@endsection

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Thêm mới Kho</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Kho</a></li>
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
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Thêm mới</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{Route('backend.warehouse.store')}}" method="post" role="form" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group" id="clonez">
                                <div class="form-group row">
                                    <div class="col-6">
                                        <label>Tên Sản phẩm</label>
                                        <input type="text" value="{{$product->name}}" class="form-control" disabled>
                                        <input type="hidden" name="product_id" value="{{$product->id}}" >
                                        <div class="w-50 m-auto pt-5">
                                            <img src="{{$product->images[0]->image_url}}" alt="" class="w-100">
                                        </div>
                                    </div>
                                    <div class="col-6 text-center">
                                        <label>Size - Color đã có </label>
                                        <table class="table table-bordered text-center">
                                            <tr>
                                                <th>Size</th>
                                                <th>Color</th>
                                            </tr>
                                            @foreach($ware as $wa)
                                                <tr>
                                                    <td>{{$wa->size}}</td>
                                                    <td>
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <p class="text-right"><i class="fa fa-tint pr-3" style="color: {{'#'.$wa->color}};text-shadow: 2px 1px gray" aria-hidden="true"></i></p>
                                                            </div>
                                                            <div class="col-6">
                                                                <p class="text-left">{{$wa->color}}</p>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </table>
                                    </div>

                                </div>
                                <label>Thông tin của Sản phẩm</label>
                                <br>
                                <span id="testt" class="btn btn btn-sm btn-success mb-2" required>Thêm</span>
                                @if(old('size') || old('color') || old('import_goods'))
                                    <?php $z = 99 ; $j = 99 ?>
                                    @for($i = 0 ; $i < count(old('size'));$i++)
                                        <div class="row" id="rowe{{$z--}}">
                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label>Size</label>
                                                    <select name="size[]" class="form-control select2" style="width: 100%;">
                                                        @foreach(\App\Models\Product::$size_text as $key => $value)
                                                            <option {{old('size')[$i] == $key ? 'selected' : ''}} value="{{$key}}">{{$value}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label>Color</label>
                                                    <input type="color" class="form-control" name="color[]" value="{{old('color')[$i]}}">
                                                </div>
                                            </div>
{{--                                            <div class="col-3">--}}
{{--                                                <div class="form-group">--}}
{{--                                                    <label>Số Lượng</label>--}}
{{--                                                    <input type="text" class="form-control" name="import_goods[]" value="{{old('import_goods')[$i]}}">--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
                                            <div class="col-3">
                                                <div class="form-group">
                                                    <p class="pb-3"></p>
                                                    <input class="btn btn-danger closee" id="{{$j--}}" value="Xóa">
                                                </div>
                                            </div>
                                        </div>
                                    @endfor
                                @else
                                    <div class="row" id="rowe99">
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label>Size</label>
                                                <select name="size[]" class="form-control select2" style="width: 100%;">
                                                    @foreach(\App\Models\Product::$size_text as $key => $value)
                                                        <option value="{{$key}}">{{$value}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label>Color</label>
                                                <input type="color" class="form-control" name="color[]" value="#ff0000">
                                            </div>
                                        </div>
{{--                                        <div class="col-3">--}}
{{--                                            <div class="form-group">--}}
{{--                                                <label>Số Lượng</label>--}}
{{--                                                <input type="number" min="1" class="form-control" name="import_goods[]">--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
                                        <div class="col-3">
                                            <div class="form-group">
                                                <p class="pb-3"></p>
                                                <input class="btn btn-danger closee" id="99" value="Xóa">
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-success btn-sm">Update</button>
                            <a class="btn btn-danger btn-sm" href="{{Route('backend.warehouse.index')}}">Huỷ bỏ</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.row (main row) -->
    </div>
    <script>
        $(document).ready(function () {
            var i=1;
            $("#testt").click(function (){
                i++;
                $('#clonez').append('<div class="row" id="rowe'+i+'">'+
                    '<div class="col-3"><div class="form-group">'+'<label>Size</label>'+
                    '<select name="size[]" class="form-control select2" style="width: 100%;">'+
                    '@foreach(\App\Models\Product::$size_text as $key => $value)'+
                    '<option value="{{$key}}">{{$value}}</option>'+
                    '@endforeach'+
                    '</select>'+
                    '</div></div><div class="col-3">'+
                    '<div class="form-group">'+'<label>Color</label>'+
                    '<input type="color" class="form-control" name="color[]" value="#ff0000">'+
                    '</div></div>'+
                    '<div class="col-3"><div class="form-group">'+'<p class="pb-3"></p>'+
                    '<input class="btn btn-danger closee" id="'+i+'" value="Xóa">'+
                    '</div></div></div>'
                )
            });
            $(document).on('click','.closee',function (){
                var button_id = $(this).attr("id");
                $('#rowe'+button_id+'').remove();
            });
        });
    </script>
@endsection

<!-- Script -->
@section('script')
@endsection


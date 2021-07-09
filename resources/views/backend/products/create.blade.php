@extends('backend.layouts.master')
<!-- css -->
@section('css')
@endsection

@section('content-header')
<div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Tạo sản phẩm</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Sản phẩm</a></li>
                    <li class="breadcrumb-item active">Tạo sản phẩm</li>
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
                        <h3 class="card-title">Tạo sản phẩm</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" enctype="multipart/form-data" method="post" action="{{ route('backend.product.store') }}">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên sản phẩm</label>
                            <input type="text" name="name" value="{{old('name')}}" class="form-control" id="" placeholder="Điền tên sản phẩm">
                            @error('name')
                            <i class="text-red">{{ $message }}</i>
                            @enderror
                        </div>
{{--                        <div class="form-group">--}}
{{--                            <label>Size</label>--}}
{{--                            <select name="size" class="form-control select2" style="width: 100%;">--}}
{{--                                @foreach(\App\Models\Product::$size_text as $key => $value)--}}
{{--                                <option value="{{$key}}">{{$value}}</option>--}}
{{--                                @endforeach--}}
{{--                            </select>--}}
{{--                            @error('size')--}}
{{--                            <i class="text-red">{{ $message }}</i>--}}
{{--                            @enderror--}}
{{--                        </div>--}}
{{--                        <div class="form-group">--}}
{{--                                <label for="">Color</label>--}}
{{--                                <input type="text" value="{{old('color')}}" name="color" id="" class="form-control" placeholder="Màu sắc">--}}
{{--                                @error('color')--}}
{{--                                <i class="text-red">{{ $message }}</i>--}}
{{--                                @enderror--}}
{{--                        </div>--}}
{{--                        <div class="form-group">--}}
{{--                            <label for="exampleInputEmail1">Số lượng nhập vào</label>--}}
{{--                            <input type="text" name="import_goods" value="{{old('import_goods')}}" class="form-control" id="" placeholder="SL nhập vào">--}}
{{--                            @error('import_goods')--}}
{{--                            <i class="text-red">{{ $message }}</i>--}}
{{--                            @enderror--}}
{{--                        </div>--}}
                        <div class="form-group">
                            <label>Danh mục sản phẩm</label>
                            <select name="category_id" class="form-control select2" style="width: 100%;">
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Giá gốc</label>
                                    <input type="text" name="origin_price" value="{{old('origin_price')}}" class="form-control" placeholder="Điền giá gốc">
                                    @error('origin_price')
                                    <i class="text-red">{{ $message }}</i>
                                    @enderror
                                </div>

                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Giá bán</label>
                                    <input type="text" name="sale_price" value="{{old('sale_price')}}" class="form-control" placeholder="Điền giá gốc">
                                    @error('sale_price')
                                    <i class="text-red">{{ $message }}</i>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Mô tả sản phẩm</label>
                            <textarea class="textarea" value="" name="content" placeholder="Place some text here"
                            style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{old('content')}}</textarea>
                            @error('content')
                            <i class="text-red">{{ $message }}</i>
                            @enderror
                        </div>
                        <div class="form-group" id="clone">
                            <label>Thông số Thêm</label>
                            <br>
                            <span id="test" class="btn btn btn-sm btn-success mb-2">Thêm</span>
                            @if(old('key') || old('value'))
                                <?php $z = 99 ; $j = 99 ?>
                                @for($i = 0 ; $i < count(old('key'));$i++)
                                    <div class="row" id="row{{$z--}}">
                                        <div class="col-3">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="key[]" value="{{old('key')[$i]}}">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="value[]" value="{{old('value')[$i]}}">
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <button class="btn btn-danger closez" id="{{$j--}}">Xóa</button>
                                        </div>
                                    </div>
                                @endfor
                            @endif
                        </div>
                        <div class="form-group" id="clonez">
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
                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label>Số Lượng</label>
                                                    <input type="text" class="form-control" name="import_goods[]" value="{{old('import_goods')[$i]}}">
                                                </div>
                                            </div>
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
                                <div class="col-3">
                                    <div class="form-group">
                                        <label>Số Lượng</label>
                                        <input type="text" class="form-control" name="import_goods[]">
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <p class="pb-3"></p>
                                        <input class="btn btn-danger closee" id="99" value="Xóa">
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Hình ảnh sản phẩm</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input id="file-input" type="file" accept="image/*" name="image[]" class="custom-file-input" multiple>
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text" id="">Upload</span>
                                </div>
                            </div>
                            <div id="preview"></div>
                            @error('image')
                            <i class="text-red">{{ $message }}</i>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Trạng thái sản phẩm</label>
                            <select name="status" class="form-control select2" style="width: 100%;">
                                <option>--Chọn trạng thái---</option>
                                @foreach(\App\Models\Product::$status_text as $key => $value)
                                <option {{old('status',request()->status)==$key?'selected':''}} value="{{$key}}">{{$value}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-success">Tạo mới</button>
                        <a href="{{ route('backend.product.index') }}" class="btn btn-default">Huỷ bỏ</a>
                    </div>
                </form>
                </div>
            </div>
        </div>
        <!-- /.row (main row) -->
    </div>

@endsection

<!-- Script -->
@section('script')
    <script>
        $(document).ready(function () {
            var i=1;
            $("#test").click(function (){
               i++;
               $('#clone').append('<div class="row" id="row'+i+'">'+
                   '<div class="col-3"><div class="form-group">'+
                   '<input type="text" class="form-control" id="" name="key[]" value="">'+
                   '</div></div><div class="col-6">'+
                   '<div class="form-group">'+
                   '<input type="text" class="form-control" id="" name="value[]" value="">'+
                   '</div></div><div class="col-2">'+
                   '<button class="btn btn-danger closez " id="'+i+'">Xóa</button>'+
                   '</div></div></div>'
               )
            });
            $(document).on('click','.closez',function (){
               var button_id = $(this).attr("id");
               $('#row'+button_id+'').remove();
            });
        });
    </script>
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
                    '<div class="col-3"><div class="form-group">'+'<label>Số lượng</label>'+
                    '<input type="text" class="form-control" name="import_goods[]">'+
                    '</div></div>'+'<div class="col-3"><div class="form-group">'+'<p class="pb-3"></p>'+
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

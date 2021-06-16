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
                    <form role="form" method="post" enctype="multipart/form-data" action="{{ route('backend.product.update',$product->id) }}">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên sản phẩm</label>
                                <input type="text" name="name" value="{{old('name',$product->name)==$product->name?$product->name:old('name')}}" class="form-control" id="" placeholder="Điền tên sản phẩm">
                                @error('name')
                                <i class="text-red">{{ $message }}</i>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Size</label>
                                <select name="size" class="form-control select2" style="width: 100%;">
                                    @foreach(\App\Models\Product::$size_text as $key => $value)
                                        <option {{old('size',$product->size)==$key?'selected':''}} value="{{$key}}">{{$value}}</option>
                                    @endforeach
                                </select>
                                @error('size')
                                <i class="text-red">{{ $message }}</i>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Color</label>
                                <input type="text" value="{{old('color',$product->color)==$product->color?$product->color:old('color')}}" name="color" id="" class="form-control" placeholder="Màu sắc">
                                @error('color')
                                <i class="text-red">{{ $message }}</i>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Số lượng nhập vào</label>
                                <input type="text" name="import_goods" value="{{old('import_goods',$product->import_goods)==$product->import_goods?$product->import_goods:old('import_goods')}}" class="form-control" id="" placeholder="SL nhập vào">
                                @error('import_goods')
                                <i class="text-red">{{ $message }}</i>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Danh mục sản phẩm</label>
                                <select name="category_id" class="form-control select2" style="width: 100%;">
                                    @foreach($categories as $category)
                                        <option {{old('category_id',$product->category_id)==$category->id?'selected':''}} value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Giá gốc</label>
                                        <input type="text" name="origin_price" value="{{old('origin_price',$product->origin_price)==$product->origin_price?$product->origin_price:old('origin_price')}}" class="form-control" placeholder="Điền giá gốc">
                                        @error('origin_price')
                                        <i class="text-red">{{ $message }}</i>
                                        @enderror
                                    </div>

                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Giá bán</label>
                                        <input type="text" name="sale_price" value="{{old('sale_price',$product->sale_price)==$product->sale_price?$product->sale_price:old('sale_price')}}" class="form-control" placeholder="Điền giá gốc">
                                        @error('sale_price')
                                        <i class="text-red">{{ $message }}</i>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Mô tả sản phẩm</label>
                                <textarea class="textarea" name="content" placeholder="Place some text here"
                                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{old('content',$product->content)==$product->content?$product->content:old('content')}}</textarea>
                                @error('content')
                                <i class="text-red">{{ $message }}</i>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Hình ảnh sản phẩm</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" id="file-input" accept="image/*" name="image[]" class="custom-file-input" id="exampleInputFile" multiple>
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
                                        <option {{old('status',$product->status)==$key?'selected':''}} value="{{$key}}">{{$value}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-success">Update</button>
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
@endsection

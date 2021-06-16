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
                    <li class="breadcrumb-item"><a href="#">Danh Mục</a></li>
                    <li class="breadcrumb-item active">Tạo Danh mục</li>
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
                <!-- general form elements -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Tạo sản phẩm</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{Route('backend.category.store')}}" method="post" role="form">
                    @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên sản phẩm</label>
                                <input type="text" class="form-control" value="{{old('name')}}" id="" name="name" placeholder="Điền tên sản phẩm ">
                                @error('name')
                                <i class="text-red">{{ $message }}</i>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Danh mục cha</label>
                                <select class="form-control select2" name="parent_id" style="width: 100%;">
                                    <option value="0">Là Danh mục cha</option>
                                    @foreach($categories_parent_id as $cate)
                                        <option value="{{$cate->id}}">{{$cate->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-success btn-sm">Tạo mới</button>
                            <a class="btn btn-danger btn-sm" href="{{Route('backend.category.index')}}">Huỷ bỏ</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

<!-- Script -->
@section('script')
@endsection

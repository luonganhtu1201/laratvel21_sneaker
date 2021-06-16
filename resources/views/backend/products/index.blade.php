@extends('backend.layouts.master')
<!-- css -->
@section('css')
@endsection

@section('content-header')
<div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Danh sách sản phẩm</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Sản phẩm</a></li>
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
                        <h3 class="card-title">Sản phẩm mới nhập</h3>

                        <div class="card-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tên sản phẩm</th>
                                <th>Giá bán</th>
                                <th>Danh Mục</th>
                                <th>Người nhập</th>
                                <th>Trạng Thái</th>
                                <th>Image</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                            <tr>
                                <td>{{$product->id}}</td>
                                <td><a href="{{ Route('backend.product.images',['id'=>$product->id]) }}">{{$product->name}}</a></td>
                                <td>{{ number_format($product->origin_price) . " VNĐ" }}</td>
                                <td>{{$product->category->name}}</td>
                                <td>{{$product->user->name}}</td>

                                @if($product->status == 1)
                                    <td><span class="badge badge-success">{{$product->status_text}}</span></td>
                                @elseif($product->status == 0)
                                    <td><span class="badge badge-warning">{{$product->status_text}}</span></td>
                                @else
                                    <td><span class="badge badge-danger">{{$product->status_text}}</span></td>
                                @endif
                                <td>
                                    @if(count($product->images)>0)
                                        {{--                                        <img src="{{url(\Illuminate\Support\Facades\Storage::url($product->images[0]->path))}}">--}}
                                        <img src="{{$product->images[0]->image_url}}" width="60px">
                                    @endif
                                </td>
                                <td><a class="btn btn-danger btn-sm" href="{{Route('backend.product.destroy',['id'=>$product->id])}}"><i class="fas fa-trash"></i></a>
                                <a class="btn btn-success btn-sm" href="{{Route('backend.product.edit',['id'=>$product->id])}}"><i class="fas fa-edit"></i></a></td>
                            </tr>
                            @endforeach
                            </tbody>

                        </table>
                        <div class="d-flex justify-content-center mt-3">
                            {!! $products->links() !!}
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
        <!-- /.row (main row) -->
    </div>
@endsection

<!-- Script -->
@section('script')
@endsection

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
                                <th>Thời gian</th>
                                <th>Danh Mục</th>
                                <th>User</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                            <tr>
                                <td>{{$product->id}}</td>
                                <td>{{$product->name}}</td>
                                <td>{{$product->created_at}}</td>
                                <td>{{$product->category->name}}</td>
                                <td>{{$product->user->name}}</td>
                                <td><span class="tag tag-success">{{$product->status_text}}</span></td>
                                <td><a href="{{ Route('backend.product.images',['id'=>$product->id]) }}">Xem hình ảnh sản phẩm</a></td>
                                
                                <td><a class="btn btn-danger btn-sm" href="{{Route('backend.product.destroy',['id'=>$product->id])}}"><i class="fas fa-trash"></i> Delete</a> </td>
                                <td><a class="btn btn-success btn-sm" href="{{Route('backend.product.edit',['id'=>$product->id])}}"><i class="fas fa-edit"></i> Edit</a></td>
                            </tr>
                            @endforeach
                            </tbody>
                            
                        </table>
                        <div>
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
 
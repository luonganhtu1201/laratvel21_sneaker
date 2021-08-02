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
                            <form action="" method="GET">
                                <div class="input-group input-group-sm" style="width: 150px;">

                                    <input type="text" value="{{request()->key_search}}" name="key_search" class="form-control float-right" placeholder="Tìm Kiếm ...">

                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="card-tools pr-5">
                            <form action="{{Route('backend.imports.filter')}}" method="GET">
                                <div class="input-group input-group-sm" >
                                    <select name="category" id="" class="form-control">
                                        <option value="-1">--Chọn danh mục--</option>
                                        @foreach($categories as $category)
                                            <option {{old('category',request()->category)==$category->id?'selected':''}} value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                    <select name="status" id="" class="form-control">
                                        <option {{old('status',request()->status)==-2?'selected':''}} value="-2">--Chọn Trạng Thái--</option>
                                        <option {{old('status',request()->status)==1?'selected':''}} value="1">Đang bán</option>
                                        <option {{old('status',request()->status)==0?'selected':''}} value="0">Đang nhập</option>
                                        <option {{old('status',request()->status)==-1?'selected':''}} value="-1">Dừng bán</option>
                                    </select>
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default">Lọc</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tên sản phẩm</th>
                                <th>Hình ảnh</th>
{{--                                <th>Danh Mục</th>--}}
                                <th>Người nhập</th>
                                <th>Trạng Thái</th>
                                <th>Chức năng</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <td>{{$product->id}}</td>
                                    <td><a href="{{ Route('productimg.home',['id'=>$product->slug]) }}" target="_blank">{{$product->name}}</a></td>
                                    <td>
                                        @if(count($product->images)>0)
                                            {{--                                        <img src="{{url(\Illuminate\Support\Facades\Storage::url($product->images[0]->path))}}">--}}
                                            <img src="{{$product->images[0]->image_url}}" width="60px">
                                        @endif
                                    </td>
{{--                                    <td>{{$product->category->name}}</td>--}}
                                    <td>{{$product->user->name}}</td>

                                    @if($product->status == 1)
                                        <td><span class="badge badge-success">{{$product->status_text}}</span></td>
                                    @elseif($product->status == 0)
                                        <td><span class="badge badge-warning">{{$product->status_text}}</span></td>
                                    @elseif($product->status == -1)
                                        <td><span class="badge badge-danger">{{$product->status_text}}</span></td>
                                    @endif
                                    <td>
                                        <a <?php if ($product->status == 1){echo 'onclick = "return false;"';}?> title="Đang bán" class="btn btn-{{$product->status == 1 ?'success':'secondary'}} btn-sm" href="{{route('backend.imports.onsale',['id'=>$product->id])}}"><i class="fa fa-cart-plus" aria-hidden="true"></i></a>
                                        <a <?php if ($product->status == 0){echo 'onclick = "return false;"';}?> title="Đang nhập" class="btn btn-{{$product->status == 0 ?'warning':'secondary'}} btn-sm" href="{{route('backend.imports.importing',['id'=>$product->id])}}"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></a>
                                        <a <?php if ($product->status == -1){echo 'onclick = "return false;"';}?> title="Dừng bán" class="btn btn-{{$product->status == -1 ?'danger':'secondary'}} btn-sm" href="{{route('backend.imports.stopsell',['id'=>$product->id])}}"><i class="fa fa-ban" aria-hidden="true"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>

                        </table>
                        <div class="d-flex justify-content-center mt-3">
                            {!! $products->appends(request()->input())->links() !!}
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

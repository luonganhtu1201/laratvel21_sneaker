@extends('frontend.layouts.master')
@section('content')
    <div class="cart-checkout-area  pt-30">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="product-area">
                        <div class="title-tab-product-category row">
                            <div class="col-lg-12 text-center pb-60">
                                <ul class="nav heading-style-3" role="tablist">
                                    <li role="presentation"><a class="active shadow-box" href="#cart" aria-controls="cart" role="tab" data-toggle="tab"><span>01</span>
                                            </a></li>
                                    <li role="presentation"><a class="shadow-box" href="#checkout" aria-controls="checkout" role="tab" data-toggle="tab"><span>02</span></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="content-tab-product-category pb-70">
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade show active" id="cart">
                                    <!-- cart are start-->
                                    <div class="cart-page-area">
                                        <div class="table-responsive mb-20">
                                            <h2 class="text-center pb-3">Order tracking</h2>
                                            @foreach($user_info as $key => $us)
                                                @if(!($us->status == -1 || $us->status == -5))
                                                <p class="p-3"><b>Date : </b>{{$us->created_at}}</p>
                                                <div class="pb-3">
                                                    <div class="row w-100">
                                                        <div class="col-lg-4">
                                                            <div class="billing-details">
                                                                <div class="contact-text right-side">
                                                                    <div class="row">
                                                                        <div class="col-lg-12">
                                                                            <p class="text-center"><b >YOUR INFO</b></p>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="input-box mb-20">
                                                                                <label>Receiver : {{$us->name}}</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="input-box mb-20">
                                                                                <label>Phone : {{$us->phone}}</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-12">
                                                                            <div class="input-box mb-20">
                                                                                <label>Address : {{$us->address}}</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-12">
                                                                            <h3 class="pb-2">TOTAL : {{number_format($us->total).' VNĐ'}}</h3>
                                                                        </div>
                                                                        <div class="col-lg-12">
                                                                            @if($us->status == 0)
                                                                                <button class="btn btn-secondary disabled">Pending</button>
                                                                                <a class="pt-2 text-black" data-toggle="collapse" href="#collapseExample{{$us->id}}" role="button" aria-expanded="false" aria-controls="collapseExample">
                                                                                    Cancel order ?
                                                                                </a>
                                                                                <div class="collapse" id="collapseExample{{$us->id}}">
                                                                                    <div class="card card-body">
                                                                                        <div class="">
                                                                                            <a onclick="return confirm('Are you sure you want to cancel the ordered product ?')" href="{{route('frontend.cart.cancel',['id'=>$us->id])}}" class="btn btn-danger rounded">Cancel order</a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            @elseif($us->status == 1)
                                                                                <button class="btn btn-success disabled">Accept order</button>
                                                                            @elseif($us->status == 2)
                                                                                <button class="btn btn-success disabled">Shipping</button>
                                                                            @elseif($us->status == 3)
                                                                                <button class="btn btn-success disabled">Successful delivery</button>
                                                                                <a class="pt-2 text-black" data-toggle="collapse" href="#collapseExample{{$us->id}}" role="button" aria-expanded="false" aria-controls="collapseExample">
                                                                                    Not satisfied with the product ?
                                                                                </a>
                                                                                <div class="collapse" id="collapseExample{{$us->id}}">
                                                                                    <div class="card card-body">
                                                                                        <!-- Button trigger modal -->
                                                                                        <p>
                                                                                            <span>Please read the return policy carefull
                                                                                            <a href="" style="color: red" data-toggle="modal" data-target="#exampleModalCenter">in here .</a></span>
                                                                                        </p>


                                                                                        <div class="pt-3">
                                                                                            <a href="{{route('frontend.cart.returnpro',['id'=>$us->id])}}" onclick="return confirm('Are you sure you want to return the ordered product ?')" class="btn btn-secondary rounded">Request a return</a>
                                                                                        </div>

                                                                                    </div>
                                                                                </div>
                                                                            @elseif($us->status == -1)
                                                                                <button class="btn btn-dark disabled">Order failed</button>
                                                                            @elseif($us->status == -2)
                                                                                <button class="btn btn-danger disabled">You request to cancel the order</button>
                                                                                <br>
                                                                                <button class="btn btn-secondary disabled mt-2">Wait for confirmation</button>
                                                                            @elseif($us->status == -3)
                                                                                <button class="btn btn-info disabled">Accept returns</button>
                                                                            @elseif($us->status == -4)
                                                                                <button class="btn btn-warning disabled">Successful return</button>
                                                                            @elseif($us->status == -5)
                                                                                <button class="btn btn-warning disabled">You cancel the order</button>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-8">
                                                            <p class="text-center"><b >YOUR ORDER</b></p>
                                                            <table class="shop_table-2 cart w-100">
                                                                <thead>
                                                                <tr>
                                                                    <th >Name</th>
                                                                    <th >Size</th>
                                                                    <th >Color</th>
                                                                    <th >Unit Price</th>
                                                                    <th >Total amount</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                @foreach($user_info[$key]->orderproducts as $vk)
                                                                    <tr class="cart_item">
                                                                        <td>{{$vk->name}} × <span>{{$vk->qty}}</td>
                                                                        <td>{{$vk->size}}</td>
                                                                        <td>{{$vk->color}}</td>
                                                                        <td>{{number_format($vk->sale_price).' VNĐ'}}</td>
                                                                        <td>{{number_format($vk->sale_price * $vk->qty).' VNĐ'}}</td>
                                                                    </tr>
                                                                @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
                                                @endif
                                            @endforeach

                                        </div>
                                    </div>

                                    <!-- cart are end-->
                                </div>
                                <div role="tabpanel" class="tab-pane  fade in " id="checkout">
                                    <!-- Checkout are start-->
                                    <div class="cart-page-area">
                                        <div class="table-responsive mb-20">
                                            <h2 class="text-center pb-3">Order tracking</h2>
                                            @foreach($user_info as $key => $us)
                                                @if($us->status == -1 || $us->status == -5)
                                                    <p class="p-3"><b>Date : </b>{{$us->created_at}}</p>
                                                    <div class="pb-3">
                                                        <div class="row w-100">
                                                            <div class="col-lg-4">
                                                                <div class="billing-details">
                                                                    <div class="contact-text right-side">
                                                                        <div class="row">
                                                                            <div class="col-lg-12">
                                                                                <p class="text-center"><b >YOUR INFO</b></p>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="input-box mb-20">
                                                                                    <label>Receiver : {{$us->name}}</label>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="input-box mb-20">
                                                                                    <label>Phone : {{$us->phone}}</label>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-12">
                                                                                <div class="input-box mb-20">
                                                                                    <label>Address : {{$us->address}}</label>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-12">
                                                                                <h3 class="pb-2">TOTAL : {{number_format($us->total).' VNĐ'}}</h3>
                                                                            </div>
                                                                            <div class="col-lg-12">
                                                                                @if($us->status == 0)
                                                                                    <button class="btn btn-secondary disabled">Pending</button>
                                                                                    <a class="pt-2 text-black" data-toggle="collapse" href="#collapseExample{{$us->id}}" role="button" aria-expanded="false" aria-controls="collapseExample">
                                                                                        Cancel order ?
                                                                                    </a>
                                                                                    <div class="collapse" id="collapseExample{{$us->id}}">
                                                                                        <div class="card card-body">
                                                                                            <div class="">
                                                                                                <a onclick="return confirm('Are you sure you want to cancel the ordered product ?')" href="{{route('frontend.cart.cancel',['id'=>$us->id])}}" class="btn btn-danger rounded">Cancel order</a>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                @elseif($us->status == 1)
                                                                                    <button class="btn btn-success disabled">Accept order</button>
                                                                                @elseif($us->status == 2)
                                                                                    <button class="btn btn-success disabled">Shipping</button>
                                                                                @elseif($us->status == 3)
                                                                                    <button class="btn btn-success disabled">Successful delivery</button>
                                                                                    <a class="pt-2 text-black" data-toggle="collapse" href="#collapseExample{{$us->id}}" role="button" aria-expanded="false" aria-controls="collapseExample">
                                                                                        Not satisfied with the product ?
                                                                                    </a>
                                                                                    <div class="collapse" id="collapseExample{{$us->id}}">
                                                                                        <div class="card card-body">
                                                                                            <!-- Button trigger modal -->
                                                                                            <p>
                                                                                            <span>Please read the return policy carefull
                                                                                            <a href="" style="color: red" data-toggle="modal" data-target="#exampleModalCenter">in here .</a></span>
                                                                                            </p>


                                                                                            <div class="pt-3">
                                                                                                <a href="{{route('frontend.cart.returnpro',['id'=>$us->id])}}" onclick="return confirm('Are you sure you want to return the ordered product ?')" class="btn btn-secondary rounded">Request a return</a>
                                                                                            </div>

                                                                                        </div>
                                                                                    </div>
                                                                                @elseif($us->status == -1)
                                                                                    <button class="btn btn-dark disabled">Order failed</button>
                                                                                @elseif($us->status == -2)
                                                                                    <button class="btn btn-danger disabled">You request to cancel the order</button>
                                                                                    <br>
                                                                                    <button class="btn btn-secondary disabled mt-2">Wait for confirmation</button>
                                                                                @elseif($us->status == -3)
                                                                                    <button class="btn btn-info disabled">Accept returns</button>
                                                                                @elseif($us->status == -4)
                                                                                    <button class="btn btn-warning disabled">Successful return</button>
                                                                                @elseif($us->status == -5)
                                                                                    <button class="btn btn-warning disabled">You cancel the order</button>
                                                                                @endif
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-8">
                                                                <p class="text-center"><b >YOUR ORDER</b></p>
                                                                <table class="shop_table-2 cart w-100">
                                                                    <thead>
                                                                    <tr>
                                                                        <th >Name</th>
                                                                        <th >Size</th>
                                                                        <th >Color</th>
                                                                        <th >Unit Price</th>
                                                                        <th >Total amount</th>
                                                                    </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                    @foreach($user_info[$key]->orderproducts as $vk)
                                                                        <tr class="cart_item">
                                                                            <td>{{$vk->name}} × <span>{{$vk->qty}}</td>
                                                                            <td>{{$vk->size}}</td>
                                                                            <td>{{$vk->color}}</td>
                                                                            <td>{{number_format($vk->sale_price).' VNĐ'}}</td>
                                                                            <td>{{number_format($vk->sale_price * $vk->qty).' VNĐ'}}</td>
                                                                        </tr>
                                                                    @endforeach
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                @endif
                                            @endforeach

                                        </div>
                                    </div>
                                    <!-- Checkout are end-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade bd-example-modal-lg" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content modal-lg">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Refund Policy</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection

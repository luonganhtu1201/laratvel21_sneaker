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
                                                                            <h3 class="pb-2">TOTAL : {{number_format($us->total).' $'}}</h3>
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
{{--                                                                                            <a onclick="return confirm('Are you sure you want to cancel the ordered product ?')" href="{{route('frontend.cart.cancel',['id'=>$us->id])}}" class="btn btn-danger rounded">Cancel order</a>--}}
                                                                                            <a data-id="{{$us->id}}" class="btn btn-danger rounded userCancel">Cancel order</a>
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
                                                                                            <a data-id="{{$us->id}}" class="btn btn-secondary rounded returnPro">Request a return</a>
{{--                                                                                            <a href="{{route('frontend.cart.returnpro',['id'=>$us->id])}}" onclick="return confirm('Are you sure you want to return the ordered product ?')" class="btn btn-secondary rounded">Request a return</a>--}}
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
                                                                        <td>
                                                                            <p style="width: 35px;height: 35px;background-color: {{'#'.$vk->color}}" class="d-flex justify-content-center m-auto rounded-circle shadow p-3 mb-5 rounded"></p>
                                                                        </td>
                                                                        <td>{{number_format($vk->sale_price).' $'}}</td>
                                                                        <td>{{number_format($vk->sale_price * $vk->qty).' $'}}</td>
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
                                                                                <h3 class="pb-2">TOTAL : {{number_format($us->total).' $'}}</h3>
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
                                                                                                <a data-id="{{$us->id}}" class="btn btn-danger rounded userCancel">Cancel order</a>
{{--                                                                                                <a onclick="return confirm('Are you sure you want to cancel the ordered product ?')" href="{{route('frontend.cart.cancel',['id'=>$us->id])}}" class="btn btn-danger rounded">Cancel order</a>--}}
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
                                                                                                <a data-id="{{$us->id}}" class="btn btn-secondary rounded returnPro">Request a return</a>
{{--                                                                                                <a href="{{route('frontend.cart.returnpro',['id'=>$us->id])}}" onclick="return confirm('Are you sure you want to return the ordered product ?')" class="btn btn-secondary rounded">Request a return</a>--}}
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
                                                                            <td>{{number_format($vk->sale_price).' $'}}</td>
                                                                            <td>{{number_format($vk->sale_price * $vk->qty).' $'}}</td>
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
    <div class="modal fade bd-example-modal-lg pt-5" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered pt-3" role="document">
            <div class="modal-content modal-lg">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLongTitle"><b>Warranty and return policy</b></h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body pl-5 pr-5">
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Attention !</strong> <br>
                        Shop only receives warranty, exchange when determining that the product has been purchased at our website or store - In every shoe box we sell, there is a purchase receipt attached. You only need to keep it to know the product is purchased from us.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <h4><b>Guarantee</b></h4>
                    <p><i class="fa fa-circle-o pr-2" aria-hidden="true"></i>The case is warranted from the manufacturer's technical defects such as glue errors ...</p>
                    <p><i class="fa fa-circle-o pr-2" aria-hidden="true"></i>Shop does not accept warranties for products of the Sale line and defective products arising from improper use and storage, strong collisions, tearing and severe damage.</p>
                    <p><i class="fa fa-circle-o pr-2" aria-hidden="true"></i>The warranty period for all shoe products is 7 months from the date of receipt.</p>
                    <p><i class="fa fa-circle-o pr-2" aria-hidden="true"></i>The place to receive the warranty is the Shop address.</p>
                    <h4><b>Exchange</b></h4>
                    <p><i class="fa fa-circle-o pr-2" aria-hidden="true"></i>Your return time is 7 days after receiving the goods.</p>
                    <p><i class="fa fa-circle-o pr-2" aria-hidden="true"></i>In case the wrong product is delivered to the wrong product you have selected, please contact the store so that we can exchange it. We will bear the shipping cost when exchanging goods.</p>
                    <p><i class="fa fa-circle-o pr-2" aria-hidden="true"></i>In case the goods are delivered correctly but you feel it is not suitable for you, you can ask the store to change another product within 7 days from the date of receipt. You will be responsible for the shipping fee upon exchange. Exchange fee is FREE.</p>
                    <p><i class="fa fa-circle-o pr-2" aria-hidden="true"></i>If you exchange a product with a larger value, please compensate the difference for the store. Conversely, if the value is smaller, you have the right to choose more goods at the store to equal the value of the old order. The store has the right to refuse to refund the difference when you exchange the product due to personal reasons on the part of the customer.</p>
                    <p><i class="fa fa-circle-o pr-2" aria-hidden="true"></i>Exchange products must be in 100% new condition, with full box, wrapping paper and accompanying papers when purchased.</p>
                    <h4><b>Returns</b></h4>
                    <p><i class="fa fa-circle-o pr-2" aria-hidden="true"></i>Your return time is 7 days after purchase. From 12 am to 5 pm every day. Please bring the payment bill when you buy and before you come over, please contact the store staff to confirm the order you want to pay.</p>
                    <p><i class="fa fa-circle-o pr-2" aria-hidden="true"></i>If you go outside of the delivery time at the shop, we have the right to refuse to process your order.</p>
                    <p><i class="fa fa-circle-o pr-2" aria-hidden="true"></i>Refund time for customers ranges from 7 days after you return the goods to the shop. We will make a bank transfer for you.</p>
                    <p><i class="fa fa-circle-o pr-2" aria-hidden="true"></i>The return fee is 10% of the product value (if the reason for the return is that the customer is not satisfied and changes the need to use the product).</p>
                    <p><i class="fa fa-circle-o pr-2" aria-hidden="true"></i>Shipping costs and incidentals (if any) will not be refunded.</p>
                    <p><i class="fa fa-circle-o pr-2" aria-hidden="true"></i>Item must be 100% new (never used). The shoe box is intact and not dented, if the shoe box is not intact, the shop will charge and deduct the refund amount for the customer.</p>
                    <p><i class="fa fa-circle-o pr-2" aria-hidden="true"></i><b>FOR SALE PRODUCTS DO NOT APPLY RETURN.</b></p>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
    <script>
        $('.returnPro').click(function (event) {
            var id = $(this).attr('data-id');
            event.preventDefault();
            swal({
                title: `Request a return ?`,
                text: "Are you sure to return the order ?",
                icon: "warning",
                buttons: ["No", "Yes"],
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {
                        window.location = "/user-return-order/"+id;
                    }
                });
        });
    </script>
    <script>
        $('.userCancel').click(function (event) {
            var id = $(this).attr('data-id');
            event.preventDefault();
            swal({
                title: `Cancel order ?`,
                text: "Are you sure you want to cancel your order ?",
                icon: "warning",
                buttons: ["No", "Yes"],
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {
                        window.location = "/user-cancel-order/"+id;
                    }
                });
        });
    </script>
@endsection

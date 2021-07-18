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
                                    <li role="presentation"><a class="active shadow-box" href="#cart"
                                                               aria-controls="cart" role="tab" data-toggle="tab"><span>01</span>
                                            Shopping
                                            cart</a></li>
                                    @if(count($items)!=0)
                                        <li role="presentation"><a class="shadow-box" href="#checkout"
                                                                   aria-controls="checkout" role="tab"
                                                                   data-toggle="tab"><span>02</span>Checkout</a></li>
                                    @endif

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
                                        <form method="post" action="#">
                                            <div class="table-responsive mb-20">
                                                <table class="shop_table-2 cart table">
                                                    <thead>
                                                    <tr>
                                                        <th>Image</th>
                                                        <th>Product Name</th>

                                                        <th>Quantity</th>
                                                        <th>Size</th>
                                                        <th>Color</th>
                                                        <th>Unit Price</th>
                                                        <th>Total</th>
                                                        <th>Remove</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <form action="" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                                                        @foreach($items as $key => $item)
                                                            <tr class="cart_item">
                                                                <td class="item-img">
                                                                    <a href="#"><img
                                                                            src="{{url(\Illuminate\Support\Facades\Storage::url($item->options->image))}}"
                                                                            alt>
                                                                    </a>
                                                                </td>
                                                                <td class="item-title"><a href="#">{{$item->name}}</a>
                                                                </td>

                                                                <td class="item-qty">
                                                                    <div class="cart-quantity">
                                                                        <div class="product-qty">
                                                                            <div class="cart-quantity">
                                                                                <div class="cart-plus-minus">
                                                                                    {{--                                                                                    <div class="dec qtybutton">-</div>--}}
                                                                                    <input id="file{{$item->id}}"
                                                                                           type="number"
                                                                                           onchange="updateCart(this.value,'{{$item->rowId}}')"
                                                                                           value="{{$item->qty}}"
                                                                                           min="1" name="qtybutton"
                                                                                           class="cart-plus-minus-box qty">
                                                                                    {{--                                                                                    <div class="inc qtybutton">+</div>--}}
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        {{--                                                                        <div class="product-qty">--}}
                                                                        {{--                                                                            <div class="cart-quantity">--}}
                                                                        {{--                                                                                <div class="cart-plus-minus">--}}
                                                                        {{--                                                                                    <div class="dec qtybutton">---}}
                                                                        {{--                                                                                    </div>--}}
                                                                        {{--                                                                                    <input value="{{$item->qty}}" onchange="updateCart(this.value,'{{$item->rowId}}')" name="qtybutton" class="cart-plus-minus-box qty" type="text">--}}
                                                                        {{--                                                                                    <div class="inc qtybutton">+--}}
                                                                        {{--                                                                                    </div>--}}
                                                                        {{--                                                                                </div>--}}
                                                                        {{--                                                                            </div>--}}
                                                                        {{--                                                                        </div>--}}
                                                                    </div>
                                                                </td>
                                                                <td>{{$item->options->size}}</td>
                                                                <td>
                                                                    <p style="width: 35px;height: 35px;background-color: {{'#'.$item->options->color}}"
                                                                       class="d-flex justify-content-center m-auto rounded-circle shadow p-3 mb-5 rounded"></p>
                                                                </td>
                                                                <td class="item-price">{{number_format($item->price) .' $'}}</td>
                                                                <td class="total-price">
                                                                    <strong>{{number_format($item->price*$item->qty) .' $'}}</strong>
                                                                </td>
                                                                <td class="remove-item">
                                                                    <a data-id="{{$item->rowId}}" class="delee"><i class="fa fa-trash-o"></i></a>
                                                                </td>
{{--                                                                <td class="remove-item"><a href="{{ route('frontend.cart.remove', ['id' => $item->rowId]) }}"><i class="fa fa-trash-o"></i></a></td>--}}
                                                            </tr>
                                                        @endforeach
                                                    </form>

                                                    </tbody>
                                                </table>
                                            </div>


                                            <div class="cart-bottom-area">
                                                <div class="row">
                                                    <div class="col-lg-8 col-md-7">
                                                        <div class="update-coupne-area">
                                                            <div class="update-continue-btn text-right pb-20">
                                                                <form action="{{Route('frontend.cart.destroy')}}" method="GET" class="d-inline-block">
                                                                    <a href="#" class="btn-def btn2 delete-confirm">Deletee All</a>
                                                                </form>
                                                                <a href="#" class="btn-def btn2">Update Cart</a>
                                                                <a href="{{Route('client.home')}}" class="btn-def btn2">Continue
                                                                    Shopping</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-5">
                                                        <div class="cart-total-area">
                                                            <div class="catagory-title cat-tit-5 mb-20 text-right">
                                                                <h3>Cart Totals</h3>
                                                            </div>
                                                            <div class="sub-shipping border-top">
                                                                <p>Shipping
                                                                    <span>
                                                                        Free
                                                                    </span>
                                                                </p>
                                                            </div>
                                                            <div class="process-cart-total border-top">
                                                                <p>Total
                                                                    <span>{{number_format(\Gloudemans\Shoppingcart\Facades\Cart::instance('order-product')->subtotal())  .' $'}}</span>
                                                                </p>
                                                            </div>
                                                            <p class="text-center border-top">The price of the product
                                                                is inclusive of 10% VAT.</p>
                                                            {{--                                                            <div class="process-checkout-btn text-right">--}}
                                                            {{--                                                                <a class="btn-def btn2" href="#checkout">Process To--}}
                                                            {{--                                                                    Checkout</a>--}}
                                                            {{--                                                            </div>--}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- cart are end-->
                                </div>
                                <div role="tabpanel" class="tab-pane  fade in " id="checkout">
                                    <!-- Checkout are start-->
                                    <div class="checkout-area">
                                        <div class>
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    @if(!(Illuminate\Support\Facades\Auth::user()))
                                                        <div class="coupne-customer-area mb50">
                                                            <div class="panel-group" id="accordion" role="tablist"
                                                                 aria-multiselectable="true">
                                                                <div class="panel panel-checkout">
                                                                    <div class="panel-heading">
                                                                        <h4 class="panel-title">
                                                                            Returning customer?
                                                                            <a href="{{Route('login.form')}}">
                                                                                Click here to login
                                                                            </a>
                                                                        </h4>
                                                                        <h4 class="panel-title">
                                                                            Don't have an account?
                                                                            <a href="{{Route('login.form')}}">
                                                                                Click here to register
                                                                            </a>
                                                                        </h4>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @else
                                                        <form action="{{Route('frontend.cart.order')}}" method="POST">
                                                            @csrf
                                                            <div class="row">

                                                                <div class="col-lg-6">
                                                                    <div class="billing-details">
                                                                        <div class="contact-text right-side">
                                                                            <h2>Billing Details</h2>

                                                                            <div class="row">
                                                                                <div class="col-lg-12">
                                                                                    <p class="text-center"><b>YOUR
                                                                                            INFO</b></p>
                                                                                </div>
                                                                                <div class="col-lg-12">
                                                                                    <div class="input-box mb-20">
                                                                                        <label>Name</label>
                                                                                        <input type="text" name="name"
                                                                                               class="info"
                                                                                               placeholder="Your Name .... "
                                                                                               value="{{Illuminate\Support\Facades\Auth::user()->name}}">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <div class="input-box mb-20">
                                                                                        <label>Email
                                                                                            Address<em>*</em></label>
                                                                                        <input type="email" name="email"
                                                                                               class="info"
                                                                                               placeholder="Your Email .... "
                                                                                               value="{{Illuminate\Support\Facades\Auth::user()->email}}">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <div class="input-box mb-20">
                                                                                        <label>Phone
                                                                                            Number<em>*</em></label>
                                                                                        <input type="text" name="phone"
                                                                                               class="info"
                                                                                               placeholder="Your Phone Number ...."
                                                                                               value="{{Illuminate\Support\Facades\Auth::user()->userinfo->phone}}">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-lg-12">
                                                                                    <div class="input-box mb-20">
                                                                                        <label>Address<em>*</em></label>
                                                                                        <input type="text"
                                                                                               name="address"
                                                                                               class="info mb-10"
                                                                                               placeholder="Your Address .... "
                                                                                               value="{{Illuminate\Support\Facades\Auth::user()->userinfo->address}}">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-lg-12">
                                                                    <div class="checkout-payment-area">
                                                                        <div class="checkout-total mt20">
                                                                            <h3>Your order</h3>
                                                                            <div class="table-responsive">
                                                                                <table class="checkout-area table">
                                                                                    <thead>
                                                                                    <tr class="cart_item check-heading">
                                                                                        <td class="ctg-type"> Product
                                                                                        </td>
                                                                                        <td class="cgt-des"> Total</td>
                                                                                    </tr>
                                                                                    </thead>
                                                                                    <tbody>
                                                                                    @foreach($items as $item)
                                                                                        <tr class="cart_item check-item prd-name">
                                                                                            <td class="ctg-type"> {{$item->name}}
                                                                                                ×
                                                                                                <span>{{$item->qty}}</span>
                                                                                            </td>
                                                                                            <td class="cgt-des"> {{number_format($item->price*$item->qty) .' $'}}</td>
                                                                                        </tr>
                                                                                    @endforeach

                                                                                    <tr class="cart_item">
                                                                                        <td class="ctg-type"> Shipping
                                                                                        </td>
                                                                                        <td class="cgt-des">FREE</td>
                                                                                    </tr>
                                                                                    <tr class="cart_item">
                                                                                        <td class="ctg-type crt-total">
                                                                                            Total
                                                                                        </td>
                                                                                        <td class="cgt-des prc-total">{{number_format(\Gloudemans\Shoppingcart\Facades\Cart::instance('order-product')->subtotal()) .' $'}}</td>
                                                                                    </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </div>
                                                                        </div>
                                                                        <div>
                                                                            <div class="input-box">
                                                                                <label>Order Notes</label>
                                                                                <textarea name="note"
                                                                                          placeholder="Notes about your order, e.g. special notes for delivery."
                                                                                          class="area-tex"></textarea>
                                                                            </div>
                                                                        </div>
                                                                        <div class="payment-section mt-20 clearfix">
                                                                            <div class="pay-toggle">
                                                                                <div class="input-box mt-20">
                                                                                    <a class="btn-def btn2"
                                                                                       href="#"><input
                                                                                            type="submit"
                                                                                            class="border-0 h6 text-white"
                                                                                            value="PLACE ORDER"></a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    @endif
                                                </div>
                                            </div>
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
@endsection
@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
    <script>
        $('.delete-confirm').click(function (event) {
            var form = $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            swal({
                title: `Delete all ?`,
                text: "If deleted, you will not be able to recover ?",
                icon: "warning",
                buttons: ["No", "Yes"],
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {
                        form.submit();
                    }
                });
        });
    </script>

    <script>
        $('.delee').click(function (event) {
            var id = $(this).attr('data-id');
            event.preventDefault();
            swal({
                title: `Remove ?`,
                text: "If removed, you will not be able to recover ?",
                icon: "warning",
                buttons: ["No", "Yes"],
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {
                        window.location = "/products/cart/remove/"+id;
                    }
                });
        });
    </script>
@endsection

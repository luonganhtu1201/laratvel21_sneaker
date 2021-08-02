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
                                    <li role="presentation"><a class="active shadow-box font-roboto" href="#cart"
                                                               aria-controls="cart" role="tab" data-toggle="tab"><span>01</span>
                                            Giỏ hàng</a></li>
                                    @if(count($items)!=0)
                                        <li role="presentation"><a class="shadow-box font-roboto" href="#checkout"
                                                                   aria-controls="checkout" role="tab"
                                                                   data-toggle="tab"><span>02</span>Thanh Toán</a></li>
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
                                                        <th>Ảnh</th>
                                                        <th>Tên Sản phẩm</th>

                                                        <th>Số lượng</th>
                                                        <th>Size</th>
                                                        <th>Màu</th>
                                                        <th>Giá bán</th>
                                                        <th>Thành tiền</th>
                                                        <th>Xóa</th>
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
                                                                    </div>
                                                                </td>
                                                                <td>{{$item->options->size}}</td>
                                                                <td>
                                                                    <p style="width: 35px;height: 35px;background-color: {{'#'.$item->options->color}}"
                                                                       class="d-flex justify-content-center m-auto rounded-circle shadow p-3 mb-5 rounded"></p>
                                                                </td>
                                                                <td class="item-price">{{number_format($item->price) .' VNĐ'}}</td>
                                                                <td class="total-price">
                                                                    <strong>{{number_format($item->price*$item->qty) .' VNĐ'}}</strong>
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
                                                                    <a href="#" class="btn-def btn2 delete-confirm">XÓA TẤT CẢ</a>
                                                                </form>
                                                                <a href="{{Route('client.home')}}" class="btn-def btn2">TIẾP TỤC MUA HÀNG</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-5">
                                                        <div class="cart-total-area">
                                                            <div class="catagory-title cat-tit-5 mb-20 text-right">
                                                                <h3>Tổng thành tiền</h3>
                                                            </div>
                                                            <div class="sub-shipping border-top">
                                                                <p>Giao hàng
                                                                    <span>
                                                                        Miễn phí
                                                                    </span>
                                                                </p>
                                                            </div>
                                                            <div class="process-cart-total border-top">
                                                                <p>Tổng
                                                                    <span>{{number_format(\Gloudemans\Shoppingcart\Facades\Cart::instance('order-product')->subtotal())  .' $'}}</span>
                                                                </p>
                                                            </div>
                                                            <p class="text-center border-top">Giá của sản phẩm đã bao gồm 10% thuế VAT</p>
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
                                                                            Bạn chưa đăng nhập ?
                                                                            <a href="{{Route('login')}}">
                                                                                Bấm vào đây để đăng nhập !
                                                                            </a>
                                                                        </h4>
                                                                        <h4 class="panel-title">
                                                                            Bạn không có tài khoản ?
                                                                            <a href="{{Route('user.register.form')}}">
                                                                                Bấm vào đây để đăng kí !
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
                                                                            <h2>Chi tiết thanh toán</h2>

                                                                            <div class="row">
                                                                                <div class="col-lg-12">
                                                                                    <p class="text-center"><b>THÔNG TIN CỦA BẠN</b></p>
                                                                                </div>
                                                                                <div class="col-lg-12">
                                                                                    <div class="input-box mb-20">
                                                                                        <label>TÊN</label>
                                                                                        <input type="text" name="name"
                                                                                               class="info"
                                                                                               placeholder="Your Name .... "
                                                                                               value="{{Illuminate\Support\Facades\Auth::user()->name}}">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <div class="input-box mb-20">
                                                                                        <label>Email<em>*</em></label>
                                                                                        <input type="email" name="email"
                                                                                               class="info"
                                                                                               placeholder="Your Email .... "
                                                                                               value="{{Illuminate\Support\Facades\Auth::user()->email}}">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <div class="input-box mb-20">
                                                                                        <label>Số điện thoại<em>*</em></label>
                                                                                        <input type="text" name="phone"
                                                                                               class="info"
                                                                                               placeholder="Your Phone Number ...."
                                                                                               value="{{Illuminate\Support\Facades\Auth::user()->userinfo->phone}}">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-lg-12">
                                                                                    <div class="input-box mb-20">
                                                                                        <label>Địa chỉ<em>*</em></label>
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
                                                                            <h3>Sản phẩm đã đặt</h3>
                                                                            <div class="table-responsive">
                                                                                <table class="checkout-area table">
                                                                                    <thead>
                                                                                    <tr class="cart_item check-heading">
                                                                                        <td class="ctg-type"> Sản phẩm
                                                                                        </td>
                                                                                        <td class="cgt-des"> Thành tiền</td>
                                                                                    </tr>
                                                                                    </thead>
                                                                                    <tbody>
                                                                                    @foreach($items as $item)
                                                                                        <tr class="cart_item check-item prd-name">
                                                                                            <td class="ctg-type"> {{$item->name}}
                                                                                                ×
                                                                                                <span>{{$item->qty}}</span>
                                                                                            </td>
                                                                                            <td class="cgt-des"> {{number_format($item->price*$item->qty) .' VNĐ'}}</td>
                                                                                        </tr>
                                                                                    @endforeach

                                                                                    <tr class="cart_item">
                                                                                        <td class="ctg-type"> Giao hàng
                                                                                        </td>
                                                                                        <td class="cgt-des">Miễn phí</td>
                                                                                    </tr>
                                                                                    <tr class="cart_item">
                                                                                        <td class="ctg-type crt-total">
                                                                                            Tổng
                                                                                        </td>
                                                                                        <td class="cgt-des prc-total">{{number_format(\Gloudemans\Shoppingcart\Facades\Cart::instance('order-product')->subtotal()) .' VNĐ'}}</td>
                                                                                    </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </div>
                                                                        </div>
                                                                        <div>
                                                                            <div class="input-box">
                                                                                <label>Ghi chú :</label>
                                                                                <textarea name="note"
                                                                                          placeholder="Ghi lại ghi chú cho shop , hoặc yêu cầu của bạn !"
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
                                                                                            value="ĐẶT HÀNG"></a>
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
                title: `Xóa tất cả ?`,
                text: "Nếu đồng ý , bạn sẽ không khôi phục lại được ?",
                icon: "warning",
                buttons: ["Hủy", "Đồng ý"],
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
                title: `Xóa sản phẩm này ?`,
                text: "Nếu đồng ý , bạn sẽ không khôi phục lại được ?",
                icon: "warning",
                buttons: ["Hủy", "Đồng ý"],
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

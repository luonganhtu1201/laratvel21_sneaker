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
                                            <h2 class="text-center pb-3">Theo dõi đơn hàng</h2>
                                            @foreach($user_info as $key => $us)
                                                @if(!($us->status == -1 || $us->status == -5))
                                                <p class="p-3"><b>Ngày : </b>{{$us->created_at}}</p>
                                                <div class="pb-3">
                                                    <div class="row w-100">
                                                        <div class="col-lg-4">
                                                            <div class="billing-details">
                                                                <div class="contact-text right-side">
                                                                    <div class="row">
                                                                        <div class="col-lg-12">
                                                                            <p class="text-center"><b >THÔNG TIN CỦA BẠN</b></p>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="input-box mb-20">
                                                                                <label>Người nhận : {{$us->name}}</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="input-box mb-20">
                                                                                <label>Số điện thoại : {{$us->phone}}</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-12">
                                                                            <div class="input-box mb-20">
                                                                                <label>Địa chỉ : {{$us->address}}</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-12">
                                                                            <h3 class="pb-2">Tổng : {{number_format($us->total).' VNĐ'}}</h3>
                                                                        </div>
                                                                        <div class="col-lg-12">
                                                                            @if($us->status == 0)
                                                                                <button class="btn btn-secondary disabled">Chờ xác nhận</button>
                                                                                <a class="pt-2 text-black" data-toggle="collapse" href="#collapseExample{{$us->id}}" role="button" aria-expanded="false" aria-controls="collapseExample">
                                                                                    Hủy đặt hàng ?
                                                                                </a>
                                                                                <div class="collapse" id="collapseExample{{$us->id}}">
                                                                                    <div class="card card-body">
                                                                                        <div class="">
{{--                                                                                            <a onclick="return confirm('Are you sure you want to cancel the ordered product ?')" href="{{route('frontend.cart.cancel',['id'=>$us->id])}}" class="btn btn-danger rounded">Cancel order</a>--}}
                                                                                            <a data-id="{{$us->id}}" class="btn btn-danger rounded userCancel">Hủy đơn</a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            @elseif($us->status == 1)
                                                                                <button class="btn btn-success disabled">Đã nhận đơn</button>
                                                                            @elseif($us->status == 2)
                                                                                <button class="btn btn-success disabled">Đang giao</button>
                                                                            @elseif($us->status == 3)
                                                                                <button class="btn btn-success disabled">Giao hàng thành công</button>
                                                                                <a class="pt-2 text-black" data-toggle="collapse" href="#collapseExample{{$us->id}}" role="button" aria-expanded="false" aria-controls="collapseExample">
                                                                                    Bạn không hài lòng với sản phẩm ?
                                                                                </a>
                                                                                <div class="collapse" id="collapseExample{{$us->id}}">
                                                                                    <div class="card card-body">
                                                                                        <!-- Button trigger modal -->
                                                                                        <p>
                                                                                            <span>Chính sách trả hàng
                                                                                            <a href="" style="color: red" data-toggle="modal" data-target="#exampleModalCenter">tại đây .</a></span>
                                                                                        </p>


                                                                                        <div class="pt-3">
                                                                                            <a data-id="{{$us->id}}" class="btn btn-secondary rounded returnPro">Yêu cầu trả hàng</a>
{{--                                                                                            <a href="{{route('frontend.cart.returnpro',['id'=>$us->id])}}" onclick="return confirm('Are you sure you want to return the ordered product ?')" class="btn btn-secondary rounded">Request a return</a>--}}
                                                                                        </div>

                                                                                    </div>
                                                                                </div>
                                                                            @elseif($us->status == -1)
                                                                                <button class="btn btn-dark disabled">Giao hàng thất bại</button>
                                                                            @elseif($us->status == -2)
                                                                                <button class="btn btn-danger disabled">Bạn đã yêu cầu hủy đơn</button>
                                                                                <br>
                                                                                <button class="btn btn-secondary disabled mt-2">Chờ xác nhận hủy đơn</button>
                                                                            @elseif($us->status == -3)
                                                                                <button class="btn btn-info disabled">Shop đồng ý hủy đơn</button>
                                                                            @elseif($us->status == -4)
                                                                                <button class="btn btn-warning disabled">Trả hàng thành công</button>
                                                                            @elseif($us->status == -5)
                                                                                <button class="btn btn-warning disabled">Bạn đã hủy đơn hàng</button>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-8">
                                                            <p class="text-center"><b >SẢN PHẨM ĐÃ ĐẶT</b></p>
                                                            <table class="shop_table-2 cart w-100">
                                                                <thead>
                                                                <tr>
                                                                    <th >Tên</th>
                                                                    <th >Size</th>
                                                                    <th >Màu</th>
                                                                    <th >Giá</th>
                                                                    <th >Thành tiền</th>
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
                                            <h2 class="text-center pb-3">Theo dõi đơn hàng</h2>
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
                                                                                <p class="text-center"><b >THÔNG TIN CỦA BẠN</b></p>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="input-box mb-20">
                                                                                    <label>Người nhận : {{$us->name}}</label>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="input-box mb-20">
                                                                                    <label>Số điện thoại : {{$us->phone}}</label>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-12">
                                                                                <div class="input-box mb-20">
                                                                                    <label>Địa chỉ : {{$us->address}}</label>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-12">
                                                                                <h3 class="pb-2">Tổng : {{number_format($us->total).' VNĐ'}}</h3>
                                                                            </div>
                                                                            <div class="col-lg-12">
                                                                                @if($us->status == 0)
                                                                                    <button class="btn btn-secondary disabled">Chờ xác nhận</button>
                                                                                    <a class="pt-2 text-black" data-toggle="collapse" href="#collapseExample{{$us->id}}" role="button" aria-expanded="false" aria-controls="collapseExample">
                                                                                        Hủy đặt hàng ?
                                                                                    </a>
                                                                                    <div class="collapse" id="collapseExample{{$us->id}}">
                                                                                        <div class="card card-body">
                                                                                            <div class="">
                                                                                                {{--                                                                                            <a onclick="return confirm('Are you sure you want to cancel the ordered product ?')" href="{{route('frontend.cart.cancel',['id'=>$us->id])}}" class="btn btn-danger rounded">Cancel order</a>--}}
                                                                                                <a data-id="{{$us->id}}" class="btn btn-danger rounded userCancel">Hủy đơn</a>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                @elseif($us->status == 1)
                                                                                    <button class="btn btn-success disabled">Đã nhận đơn</button>
                                                                                @elseif($us->status == 2)
                                                                                    <button class="btn btn-success disabled">Đang giao</button>
                                                                                @elseif($us->status == 3)
                                                                                    <button class="btn btn-success disabled">Giao hàng thành công</button>
                                                                                    <a class="pt-2 text-black" data-toggle="collapse" href="#collapseExample{{$us->id}}" role="button" aria-expanded="false" aria-controls="collapseExample">
                                                                                        Bạn không hài lòng với sản phẩm ?
                                                                                    </a>
                                                                                    <div class="collapse" id="collapseExample{{$us->id}}">
                                                                                        <div class="card card-body">
                                                                                            <!-- Button trigger modal -->
                                                                                            <p>
                                                                                            <span>Chính sách trả hàng
                                                                                            <a href="" style="color: red" data-toggle="modal" data-target="#exampleModalCenter">tại đây .</a></span>
                                                                                            </p>


                                                                                            <div class="pt-3">
                                                                                                <a data-id="{{$us->id}}" class="btn btn-secondary rounded returnPro">Yêu cầu trả hàng</a>
                                                                                                {{--                                                                                            <a href="{{route('frontend.cart.returnpro',['id'=>$us->id])}}" onclick="return confirm('Are you sure you want to return the ordered product ?')" class="btn btn-secondary rounded">Request a return</a>--}}
                                                                                            </div>

                                                                                        </div>
                                                                                    </div>
                                                                                @elseif($us->status == -1)
                                                                                    <button class="btn btn-dark disabled">Giao hàng thất bại</button>
                                                                                @elseif($us->status == -2)
                                                                                    <button class="btn btn-danger disabled">Bạn đã yêu cầu hủy đơn</button>
                                                                                    <br>
                                                                                    <button class="btn btn-secondary disabled mt-2">Chờ xác nhận hủy đơn</button>
                                                                                @elseif($us->status == -3)
                                                                                    <button class="btn btn-info disabled">Shop đồng ý hủy đơn</button>
                                                                                @elseif($us->status == -4)
                                                                                    <button class="btn btn-warning disabled">Trả hàng thành công</button>
                                                                                @elseif($us->status == -5)
                                                                                    <button class="btn btn-warning disabled">Bạn đã hủy đơn hàng</button>
                                                                                @endif
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-8">
                                                                <p class="text-center"><b >SẢN PHẨM ĐÃ ĐẶT</b></p>
                                                                <table class="shop_table-2 cart w-100">
                                                                    <thead>
                                                                    <tr>
                                                                        <th >Tên</th>
                                                                        <th >Size</th>
                                                                        <th >Màu</th>
                                                                        <th >Giá</th>
                                                                        <th >Thành tiền</th>
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
    <div class="modal fade bd-example-modal-lg pt-5" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered pt-3" role="document">
            <div class="modal-content modal-lg">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLongTitle"><b>Chính sách bảo hành và đổi trả</b></h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body pl-5 pr-5">
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong> Chú ý! </strong> <br>
                        Shop chỉ nhận bảo hành, đổi trả khi xác định sản phẩm đã được mua tại website hoặc cửa hàng của mình - Trong mỗi hộp giày chúng tôi bán ra đều có hóa đơn mua hàng kèm theo. Bạn chỉ cần giữ nó để biết sản phẩm được mua từ chúng tôi.
                        <button type = "button" class = "close" data-dict = "alert" aria-label = "Close">
                            <span aria-hidden = "true"> & times; </span>
                        </button>
                    </div>
                    <h4><b>Bảo hàng</b> </h4>
                    <p> <i class = "fa fa-circle-o pr-2" aria-hidden = "true"> </i> Giày được bảo hành các lỗi kỹ thuật của nhà sản xuất như lỗi keo ... </p>
                    <p> <i class = "fa fa-circle-o pr-2" aria-hidden = "true"> </i> Shop không nhận bảo hành các sản phẩm thuộc dòng Sale và các sản phẩm lỗi phát sinh do sử dụng và bảo quản không đúng cách , va chạm mạnh, rách và hư hỏng nặng. </p>
                    <p> <i class = "fa fa-circle-o pr-2" aria-hidden = "true"> </i> Thời gian bảo hành cho tất cả các sản phẩm giày là 7 tháng kể từ ngày nhận hàng. </p>
                    <p> <i class = "fa fa-circle-o pr-2" aria-hidden = "true"> </i> Nơi nhận bảo hành là địa chỉ Shop. </p>
                    <h4><b>Đổi trả</b> </h4>
                    <p> <i class = "fa fa-circle-o pr-2" aria-hidden = "true"> </i> Thời gian trả hàng của bạn là 7 ngày sau khi nhận hàng. </p>
                    <p> <i class = "fa fa-circle-o pr-2" aria-hidden = "true"> </i> Trong trường hợp giao nhầm sản phẩm không đúng sản phẩm bạn đã chọn, vui lòng liên hệ với cửa hàng để mà chúng ta có thể trao đổi nó. Chúng tôi sẽ chịu chi phí vận chuyển khi đổi hàng. </p>
                    <p> <i class = "fa fa-circle-o pr-2" aria-hidden = "true"> </i> Trong trường hợp hàng được giao đúng nhưng bạn cảm thấy không phù hợp với mình, bạn có thể yêu cầu cửa hàng đổi sản phẩm khác trong vòng 7 ngày kể từ ngày nhận hàng. Bạn sẽ chịu phí vận chuyển khi đổi hàng. Phí trao đổi là MIỄN PHÍ. </p>
                    <p> <i class = "fa fa-circle-o pr-2" aria-hidden = "true"> </i> Nếu quý khách đổi sản phẩm có giá trị lớn hơn, vui lòng bù chênh lệch cho cửa hàng. Ngược lại, nếu giá trị nhỏ hơn, bạn có quyền chọn thêm hàng tại cửa hàng để bằng giá trị đơn hàng cũ. Cửa hàng có quyền từ chối hoàn trả tiền chênh lệch khi quý khách đổi sản phẩm vì lý do cá nhân từ phía khách hàng. </p>
                    <p> <i class = "fa fa-circle-o pr-2" aria-hidden = "true"> </i> Sản phẩm đổi phải trong tình trạng mới 100%, còn đầy đủ hộp, giấy gói và các giấy tờ đi kèm khi đã mua. </p>
                    <h4><b>Trả hàng</b> </h4>
                    <p> <i class = "fa fa-circle-o pr-2" aria-hidden = "true"> </i> Thời gian trả hàng của bạn là 7 ngày sau khi mua hàng. Từ 12 giờ sáng đến 5 giờ chiều mỗi ngày. Quý khách vui lòng mang theo hóa đơn thanh toán khi mua hàng và trước khi qua vui lòng liên hệ với nhân viên cửa hàng để xác nhận đơn hàng muốn thanh toán. </p>
                    <p> <i class = "fa fa-circle-o pr-2" aria-hidden = "true"> </i> Nếu quý khách đến ngoài thời gian giao hàng tại shop, chúng tôi có quyền từ chối xử lý đơn đặt hàng của bạn. </p>
                    <p> <i class = "fa fa-circle-o pr-2" aria-hidden = "true"> </i> Thời gian hoàn tiền cho khách hàng từ 7 ngày sau khi bạn trả hàng cho shop. Chúng tôi sẽ chuyển khoản ngân hàng cho bạn. </p>
                    <p> <i class = "fa fa-circle-o pr-2" aria-hidden = "true"> </i> Phí trả lại là 10% giá trị sản phẩm (nếu lý do trả lại là khách hàng không hài lòng và chuyển nhu cầu sử dụng sản phẩm). </p>
                    <p> <i class = "fa fa-circle-o pr-2" aria-hidden = "true"> </i> Chi phí vận chuyển và các chi phí phát sinh (nếu có) sẽ không được hoàn lại. </p>
                    <p> <i class = "fa fa-circle-o pr-2" aria-hidden = "true"> </i> Hàng phải mới 100% (chưa từng qua sử dụng). Hộp giày còn nguyên vẹn không móp méo, nếu hộp giày không còn nguyên vẹn shop sẽ tính tiền và trừ số tiền hoàn lại cho khách. </p>
                    <p> <i class = "fa fa-circle-o pr-2" aria-hidden = "true"> </i> <b> SẢN PHẨM GIẢM GIÁ KHÔNG ÁP DỤNG TRẢ LẠI. </b> </p>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
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
                title: `Yêu cầu trả hàng ?`,
                text: "Bạn có chắc chắn muốn trả lại đơn hàng ?",
                icon: "warning",
                buttons: ["Hủy", "Đồng ý"],
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
                title: `Hủy đơn ?`,
                text: "Bạn có chắc muốn hủy đơn hàng ?",
                icon: "warning",
                buttons: ["Hủy", "Đồng ý"],
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

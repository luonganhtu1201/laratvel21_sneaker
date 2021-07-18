<nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="index3.html" class="nav-link">Home</a>
            </li>
        </ul>

        <!-- SEARCH FORM -->



        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <!-- Messages Dropdown Menu -->
            @if(count($items)!=0)
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="fa fa-shopping-basket" aria-hidden="true"></i>
                        <span class="badge badge-danger navbar-badge">{{count($items)}}</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        @foreach($items as $item)
                            <a href="#" class="dropdown-item">
                                <!-- Message Start -->
                                <div class="media">
                                    <img src="{{url(\Illuminate\Support\Facades\Storage::url($item->options->image))}}" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                                    <div class="media-body">
                                        <h3 class="dropdown-item-title">
                                            {{$item->name}}
                                        </h3>
                                        <p class="text-sm">SL : {{$item->qty}} - Size : {{$item->options->size}} - <i class="fas fa-star" style="color: {{'#'.$item->options->color}};text-shadow: 1px 1px 4px gray"></i></p>
                                    </div>
                                </div>
                                <!-- Message End -->
                            </a>
                            <div class="dropdown-divider"></div>
                        @endforeach
                        <a href="{{route('backend.cartinput.index')}}" class="dropdown-item dropdown-footer"><b>--- Nhập hàng ---</b></a>
                    </div>
                </li>
            @endif
            <li class="nav-item d-none d-sm-inline-block">
                <a href="{{Route('logout.ad')}}" class="nav-link">Logout <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
            </li>
        </ul>
    </nav>

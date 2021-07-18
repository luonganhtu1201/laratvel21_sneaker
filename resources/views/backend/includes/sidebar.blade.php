<aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="" class="brand-link">
            <img src="/backend/dist/img/logo-14.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                 style="opacity: .8">
            <span class="brand-text font-weight-light">Tun<span style="color: red">z</span> Admin</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="{{url(\Illuminate\Support\Facades\Storage::url(Illuminate\Support\Facades\Auth::user()->userinfo->avatar))}}" class="img-circle elevation-2" alt="User Image" style="width: 35px;height: 35px;object-fit: cover; ">
                </div>
                <div class="info">
                    <a href="{{route('backend.update.self')}}" class="d-block">{{Illuminate\Support\Facades\Auth::user()->name}}</a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2" style="font-size: 15.5px;">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->
                    <li class="nav-item has-treeview">
                        <a href="{{Route('backend.dashboard')}}" class="nav-link {{request()->is('admin/dashboard')? 'cake' : '' }}">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li>
                    <li class="pt-1 pb-1">
                        <i style="color: white;font-size: 13px">Tài nguyên</i>
                    </li>
                    <li class="nav-item has-treeview {{ request()->is('admin/products/create') || request()->is('admin/products')  ? 'menu-is-opening menu-open' : '' }}">
                        <a href="#" class="nav-link {{ request()->is('admin/products/create') || request()->is('admin/products')  ? 'cake' : '' }}">
                            <i class="fa fa-cart-plus nav-icon" aria-hidden="true"></i>
                            <p>
                                Quản lý sản phẩm
                                <i class="fa fa-angle-double-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{Route('backend.product.create')}}" class="nav-link {{request()->is('admin/products/create')? 'activezz' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Tạo mới</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{Route('backend.product.index')}}" class="nav-link {{request()->is('admin/products')? 'activezz' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Danh sách sản phẩm</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item has-treeview user-panel {{ request()->is('admin/categories/create') || request()->is('admin/categories')  ? 'menu-is-opening menu-open' : '' }}">
                        <a href="#" class="nav-link {{ request()->is('admin/categories/create') || request()->is('admin/categories')  ? 'cake' : '' }}">
                            <i class="fa fa-window-restore nav-icon" aria-hidden="true"></i>
                            <p>
                                Quản lý danh mục
                                <i class="right fa fa-angle-double-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{Route('backend.category.create')}}" class="nav-link {{request()->is('admin/categories/create')? 'activezz' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Tạo mới</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{Route('backend.category.index')}}" class="nav-link {{request()->is('admin/categories')? 'activezz' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Danh sách danh mục</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="pt-1 pb-1">
                        <i style="color: white;font-size: 13px">Quản lý</i>
                    </li>
                    <li class="nav-item has-treeview {{ request()->is('admin/users/create') || request()->is('admin/users')  ? 'menu-is-opening menu-open' : '' }}">
                        <a href="#" class="nav-link {{ request()->is('admin/users/create') || request()->is('admin/users')  ? 'cake' : '' }}">
                            <i class="fa fa-user nav-icon" aria-hidden="true"></i>
                            <p>
                                Quản lý người dùng
                                <i class="fa fa-angle-double-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{Route('backend.user.create')}}" class="nav-link {{request()->is('admin/users/create')? 'activezz' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Tạo mới</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{Route('backend.user.index')}}" class="nav-link {{request()->is('admin/users')? 'activezz' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Danh sách người dùng</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item has-treeview user-panel {{ request()->is('admin/suppliers/create') || request()->is('admin/suppliers')  ? 'menu-is-opening menu-open' : '' }}">
                        <a href="#" class="nav-link {{ request()->is('admin/suppliers/create') || request()->is('admin/suppliers')  ? 'cake' : '' }}">
                            <i class="fa fa-id-card nav-icon" aria-hidden="true"></i>
                            <p>
                                Quản lý nhà cung cấp
                                <i class="fa fa-angle-double-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{Route('backend.supplier.create')}}" class="nav-link {{request()->is('admin/suppliers/create')? 'activezz' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Tạo mới</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{Route('backend.supplier.index')}}" class="nav-link {{request()->is('admin/suppliers')? 'activezz' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Danh sách nhà cung cấp</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="pt-1 pb-1">
                        <i style="color: white;font-size: 13px">Bình luận</i>
                    </li>
                    <li class="nav-item has-treeview user-panel {{ request()->is('admin/comments')? 'menu-is-opening menu-open' : '' }}">
                        <a href="#" class="nav-link {{ request()->is('admin/comments')  ? 'cake' : '' }}">
                            <i class="fa fa-comment nav-icon" aria-hidden="true"></i>
                            <p>
                                Quản lý bình luận
                                <i class="fa fa-angle-double-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{Route('backend.comments')}}" class="nav-link {{request()->is('admin/comments')? 'activezz' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Danh sách bình luận</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="pt-1 pb-1">
                        <i style="color: white;font-size: 13px">Theo dõi</i>
                    </li>
                    <li class="nav-item has-treeview {{ request()->is('admin/imports-status')? 'menu-is-opening menu-open' : '' }}">
                        <a href="#" class="nav-link {{ request()->is('admin/imports-status')? 'cake' : '' }}">
                            <i class="fa fa-random nav-icon" aria-hidden="true"></i>
                            <p>
                                Theo dõi sản phẩm
                                <i class="fa fa-plus right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{Route('backend.imports.index')}}" class="nav-link {{request()->is('admin/imports-status')? 'activezz' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Tình trạng sản phẩm</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item has-treeview user-panel {{ request()->is('admin/orders')? 'menu-is-opening menu-open' : '' }}">
                        <a href="#" class="nav-link {{ request()->is('admin/orders')? 'cake' : '' }}">
                            <i class="fa fa-shopping-bag nav-icon" aria-hidden="true"></i>
                            <p>
                                Theo dõi đơn hàng
                                <i class="fa fa-plus right"></i>
                                @if(count(\App\Models\Order::where('status',0)->get())!=0)
                                    <span style="background-color: #FFFFFF;color: black" class="badge right">{{count(\App\Models\Order::where('status',0)->get())}}</span>
                                @endif
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('backend.orders.index')}}" class="nav-link {{request()->is('admin/orders')? 'activezz' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Danh sách đơn hàng</p>
                                    @if(count(\App\Models\Order::where('status',0)->get())!=0)
                                        <span class="pl-2"><i class="fa fa-star" style="color: #e23e3e" aria-hidden="true"></i></span>
                                    @endif
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="pt-1 pb-1">
                        <i style="color: white;font-size: 13px">Kho</i>
                    </li>
                    <li class="nav-item has-treeview {{ request()->is('admin/warehouses')? 'menu-is-opening menu-open' : '' }}">
                        <a href="#" class="nav-link {{ request()->is('admin/warehouses')  ? 'cake' : '' }}">
                            <i class="fa fa-archive nav-icon" aria-hidden="true"></i>
                            <p>
                                Quản lý Kho
                                <i class="fa fa-angle-double-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{Route('backend.warehouse.index')}}" class="nav-link {{request()->is('admin/warehouses')? 'activezz' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Danh sách Kho</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item has-treeview user-panel {{ request()->is('admin/import-goods/show-imports') || request()->is('admin/import-goods')? 'menu-is-opening menu-open' : '' }}">
                        <a href="#" class="nav-link {{ request()->is('admin/import-goods/show-imports') || request()->is('admin/import-goods') ? 'cake' : '' }}">
                            <i class="fa fa-outdent nav-icon" aria-hidden="true"></i>
                            <p>
                                Quản lý Nhập hàng
                                <i class="fa fa-angle-double-left right"></i>
                            </p>
                        </a>
                        @if(count($items)!=0)
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{route('backend.cartinput.index')}}" class="nav-link {{request()->is('admin/import-goods')? 'activezz' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Giỏ nhập hàng</p>
                                    </a>
                                </li>
                            </ul>
                        @endif

                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('backend.show.imports')}}" class="nav-link {{request()->is('admin/import-goods/show-imports')? 'activezz' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Tình trạng nhập hàng</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="pt-1 pb-1">
                        <i style="color: white;font-size: 13px">Thống kê</i>
                    </li>
                    <li class="nav-item has-treeview user-panel pb-5 {{ request()->is('admin/statistical') ? 'menu-is-opening menu-open' : '' }}">
                        <a href="{{route('backend.statistical.index')}}" class="nav-link {{ request()->is('admin/statistical') ? 'cake' : '' }}">
                            <i class="fa fa-outdent nav-icon" aria-hidden="true"></i>
                            <p>
                                Thống kê
                            </p>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>


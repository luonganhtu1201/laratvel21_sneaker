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
                    <img src="{{url(\Illuminate\Support\Facades\Storage::url(Illuminate\Support\Facades\Auth::user()->userinfo->avatar))}}" class="img-circle elevation-2" alt="User Image" style="width: 35px;height: 35px">
                </div>
                <div class="info">
                    <a href="#" class="d-block">{{Illuminate\Support\Facades\Auth::user()->name}}</a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->
                    <li class="nav-item has-treeview">
                        <a href="{{Route('backend.dashboard')}}" class="nav-link {{request()->is('admin/dashboard')? 'active' : '' }}">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Dashboard
                            </p>
                        </a>

                    </li>
                    <li class="nav-item has-treeview {{ request()->is('admin/products/create') || request()->is('admin/products')  ? 'menu-is-opening menu-open' : '' }}">
                        <a href="#" class="nav-link {{ request()->is('admin/products/create') || request()->is('admin/products')  ? 'active' : '' }}">
                            <i class="nav-icon fas fa-shopping-basket"></i>
                            <p>
                                Quản lý sản phẩm
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{Route('backend.product.create')}}" class="nav-link {{request()->is('admin/products/create')? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Tạo mới</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{Route('backend.product.index')}}" class="nav-link {{request()->is('admin/products')? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Danh sách</p>
                                </a>
                            </li>

                        </ul>
                    </li>
                    <li class="nav-item has-treeview {{ request()->is('admin/categories/create') || request()->is('admin/categories')  ? 'menu-is-opening menu-open' : '' }}">
                        <a href="#" class="nav-link {{ request()->is('admin/categories/create') || request()->is('admin/categories')  ? 'active' : '' }}">
                            <i class="nav-icon fas fa-chart-pie"></i>
                            <p>
                                Quản lý danh mục
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{Route('backend.category.create')}}" class="nav-link {{request()->is('admin/categories/create')? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Tạo mới</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{Route('backend.category.index')}}" class="nav-link {{request()->is('admin/categories')? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Danh sách</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item has-treeview {{ request()->is('admin/users/create') || request()->is('admin/users')  ? 'menu-is-opening menu-open' : '' }}">
                        <a href="#" class="nav-link {{ request()->is('admin/users/create') || request()->is('admin/users')  ? 'active' : '' }}">
                            <i class="nav-icon fas fa-tree"></i>
                            <p>
                                Quản lý người dùng
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{Route('backend.user.create')}}" class="nav-link {{request()->is('admin/users/create')? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Tạo mới</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{Route('backend.user.index')}}" class="nav-link {{request()->is('admin/users')? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Danh sách</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

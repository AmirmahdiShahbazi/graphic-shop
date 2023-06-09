<aside class="main-sidebar sidebar-dark-primary elevation-4" >
    <!-- Brand Logo -->
    <a href="{{route('admin-panel.products.all')}}" class="brand-link">
        <img src="/admin/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">پنل مدیریت</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar" style="direction: ltr">
        <div style="direction: rtl">
            <!-- Sidebar user panel (optional) -->
            {{-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="https://www.gravatar.com/avatar/52f0fbcbedee04a121cba8dad1174462?s=200&d=mm&r=g" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block">حسام موسوی</a>
                </div>
            </div> --}}

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
        with font-awesome or any other icon font library -->
                    <li class="nav-item has-treeview menu-open">
                        <a href="#" class="nav-link active">
                            <i class="nav-icon fa fa-picture-o"></i>
                            <p>
                                مدیریت محصولات
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('admin-panel.category.all')}}" class="nav-link ">
                                    <i class="fa fa-list-alt "></i>
                                    <p>دسته بندی ها</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin-panel.products.create')}}" class="nav-link">
                                    <i class="fa fa-plus"></i>
                                    <p>افزودن محصول</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin-panel.products.all')}}" class="nav-link">
                                    <i class="fa fa-list"></i>
                                    <p>لیست محصولات</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa fa-pie-chart"></i>
                            <p>
                                مدیریت کاربران
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a  class="nav-link" href="{{route('admin-panel.users.create')}}">
                                    <i class="fa fa-plus"></i>
                                    <p style="margin-right: 5px;">افزودن</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin-panel.users.all')}}" class="nav-link" >
                                    <i class="fa fa-list"></i>
                                    <p style="margin-right: 5px;">
                                        لیست کاربران

                                    </p>
                                </a>
                            </li>

                        </ul>
                    </li>



                    <li class="nav-item has-treeview">
                        <a href="{{route('admin-panel.orders.all')}}" class="nav-link">
                            <i class="fa fa-shopping-cart"></i>
                            <p style="margin-right: 5px;">
                                سفارشات
                            </p>
                        </a>

                    </li>

                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="fa fa-dollar"></i>
                            <p style="margin-right: 5px;">
                                پرداخت ها

                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="pages/examples/invoice.html" class="nav-link">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>سفارشات</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/examples/profile.html" class="nav-link">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>پروفایل</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/examples/login.html" class="nav-link">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>صفحه ورود</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/examples/register.html" class="nav-link">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>صفحه عضویت</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/examples/lockscreen.html" class="nav-link">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>قفل صفحه</p>
                                </a>
                            </li>
                        </ul>
                    </li>



                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
    </div>
    <!-- /.sidebar -->
</aside>

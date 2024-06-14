<div class="container-fluid">
    <div class="row">
        <!-- Left Sidebar start-->
        <div class="side-menu-fixed">
            <div class="scrollbar side-menu-bg">
                <ul class="nav navbar-nav side-menu" id="sidebarnav">
                    <!-- menu item Dashboard-->
                    <li>
                        <a href="{{ route('home') }}">
                            <div class="pull-left"><i class="ti-home"></i><span class="right-nav-text">الشاشة
                                    الرئيسية</span>
                            </div>
                            <div class="clearfix"></div>
                        </a>
                    </li>
                    <!-- menu title -->
                    <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">الخدمات</li>
                    <!-- menu item Elements-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#elements">
                            <div class="pull-left"><i class="ti-palette"></i><span class="right-nav-text">شاشة
                                    الخدمات</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="elements" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{ route('counter.index') }}">شاشة العداد</a></li>
                            <li><a href="{{ route('supplier.index') }}">شاشة الموردين</a></li>
                            <li><a href="{{ route('product.index') }}">شاشة الاصناف</a></li>
                            <li><a href="{{ route('car.index') }}">شاشة السيارات</a></li>
                            <li><a href="{{ route('process.index') }}">شاشة عمليات الموردين</a></li>
                            <li><a href="{{ route('client.index') }}">شاشة عمليات العملاء</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="{{ route('users.index') }}"><i class="ti-menu-alt"></i><span
                                class="right-nav-text">شاشة
                                المستخدمين</span> </a>
                    </li>

                </ul>
            </div>
        </div>

        <!-- Left Sidebar End-->

        <!--=================================

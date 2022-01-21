<div class="container-fluid">
    <div class="row">
        <!-- Left Sidebar start-->
        <div class="side-menu-fixed">
            <div class="scrollbar side-menu-bg">
                <ul class="nav navbar-nav side-menu" id="sidebarnav">
                    <!-- menu item Dashboard-->

                    <!-- menu item todo-->
             @if (Auth::user()->role_name == "employee")



                            <li><a  href="{{ url('/employee/salary/') }}">رواتبي</a></li>

                            <li>
                                <a href="javascript:void(0);" data-toggle="collapse" data-target="#holidey">
                                    <div class="pull-left"><i class="ti-calendar"></i><span
                                            class="right-nav-text">اجازات </span></div>
                                    <div class="pull-right"><i class="ti-plus"></i></div>
                                    <div class="clearfix"></div>
                                </a>
                                <ul id="holidey" class="collapse" data-parent="#sidebarnav">
                                    <li><a  href="{{ url('/holiday') }}">جميع الإجازات</a></li>
                                    <li><a href="{{ url('/rejectedHoliday') }}">الإجازات المرفوضة</a></li>
                                </ul>
                            </li>
                            @else
                            <li>
                          <a href="{{ url('/' . $page='home') }}"> الرئيسية</a>

                            </li>
                            <!-- menu title -->
                            <!-- menu item Elements-->
                            <li>
                                <a href="javascript:void(0);" data-toggle="collapse" data-target="#elements">
                                    <div class="pull-left"><i class="ti-palette"></i><span
                                            class="right-nav-text">الموظفين</span></div>
                                    <div class="pull-right"><i class="ti-plus"></i></div>
                                    <div class="clearfix"></div>
                                </a>
                                <ul id="elements" class="collapse" data-parent="#sidebarnav">
                                    <li><a href="{{ url('/job') }}">أنواع الوظائف</a></li>

                                    <li><a href="{{ url('/employee') }}">قائمة الموظفين</a></li>
                                    <li><a  href="{{ url('/holiday') }}">الإجازات</a></li>

                                </ul>
                            </li>
                            <!-- menu item calendar-->
                            <li>
                                <a href="javascript:void(0);" data-toggle="collapse" data-target="#calendar-menu">
                                    <div class="pull-left"><i class="ti-calendar"></i><span
                                            class="right-nav-text">الرواتب</span></div>
                                    <div class="pull-right"><i class="ti-plus"></i></div>
                                    <div class="clearfix"></div>
                                </a>
                                <ul id="calendar-menu" class="collapse" data-parent="#sidebarnav">
                                    <li><a  href="{{ url('/salary') }}">رواتب الموظفين</a></li>
                                    <li><a   href="{{ url('/onAccount') }}" hidden>طلبات السلفة</a></li>
                                </ul>
                            </li>
                            @endif
                </ul>
            </div>
        </div>

        <!-- Left Sidebar End-->

        <!--=================================

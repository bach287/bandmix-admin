<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="/statistic" class="site_title"><i class="fa fa-paw"></i> <span>Bandmix</span></a>
        </div>

        <div class="clearfix"></div>

        <!-- menu profile quick info -->
        <div class="profile clearfix">
            <div class="profile_pic">
                <img src="{{url('../images/admin.jpg')}}" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
                <span>Welcome,</span>
                <h2>Admin</h2>
            </div>
        </div>
        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <ul class="nav side-menu">
                    <li><a><i class="fa fa-signal" href=""></i> Thống kê <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">

                            <li><a href="{{ route('statistic.index') }}">Thống kê chi tiết</a></li>
                        </ul>
                    </li>
                </ul>
                <ul class="nav side-menu">
                    <li><a><i class="fa fa-users" aria-hidden="true"></i> Người dùng <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">

                            <li><a href="{{route('members.index')}}">Danh sách</a></li>
                        </ul>
                    </li>
                </ul>
                <ul class="nav side-menu">
                    <li><a><i class="fa fa-newspaper-o"></i> Tin tức <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{route('news.create')}}">Tạo mới</a></li>
                            <li><a href="{{route('news.index')}}">Danh sách</a></li>
                        </ul>
                    </li>
                </ul>
                <ul class="nav side-menu">
                    <li><a><i class="fa fa-tags" aria-hidden="true"></i>Danh mục <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{route('categories.create')}}">Tạo mới</a></li>
                            <li><a href="{{route('categories.index')}}">Danh sách</a></li>
                        </ul>
                    </li>
                </ul>
                <ul class="nav side-menu">
                    <li><a><i class="fa fa-futbol-o" aria-hidden="true"></i>Sự kiện <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{route('events.index')}}">Danh sách</a></li>
                        </ul>
                    <li><a><i class="fa fa-music" aria-hidden="true"></i>Quản lý band <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{route('bands.index')}}">Danh sách</a></li>
                        </ul>
                    </li>
                </ul>
                <ul class="nav side-menu">
                    <li><a><i class="fa fa-btc"></i>Danh sách book vé<span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{route('books.index')}}">Danh sách</a></li>
                        </ul>
                    </li>
                </ul>
                <ul class="nav side-menu">
                    <li><a><i class="fa fa-comment-o"></i>Quản lý feedback<span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{route('feedback.index')}}">Danh sách</a></li>
                        </ul>
                    </li>
                </ul>
            </div>



        </div>

        <!-- /sidebar menu -->



        <!-- /menu footer buttons -->
        <div class="sidebar-footer hidden-small">
            <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
        </div>
        <!-- /menu footer buttons -->
    </div>
</div>

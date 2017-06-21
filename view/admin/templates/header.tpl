<!DOCTYPE html>

<!-- Mirrored from demo.themepixels.com/webpage/katniss/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 01 Jul 2015 09:21:11 GMT -->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Katniss Premium Admin Template</title>
    <link rel="stylesheet" href="{SITE-NAME}/view/admin/Themes/css/style.default.css" type="text/css"/>
    <link rel="stylesheet" href="{SITE-NAME}/view/admin/Themes/css/prettify.css" type="text/css"/>
    <script type="text/javascript" src="{SITE-NAME}/view/admin/Themes/js/prettify.js"></script>
    <script type="text/javascript" src="{SITE-NAME}/view/admin/Themes/js/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="{SITE-NAME}/view/admin/Themes/js/jquery-migrate-1.1.1.min.js"></script>
    <script type="text/javascript" src="{SITE-NAME}/view/admin/Themes/js/jquery-ui-1.9.2.min.js"></script>
    <script type="text/javascript" src="{SITE-NAME}/view/admin/Themes/js/jquery.flot.min.js"></script>
    <script type="text/javascript" src="{SITE-NAME}/view/admin/Themes/js/jquery.flot.resize.min.js"></script>
    <script type="text/javascript" src="{SITE-NAME}/view/admin/Themes/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="{SITE-NAME}/view/admin/Themes/js/jquery.uniform.min.js"></script>
    <script type="text/javascript" src="{SITE-NAME}/view/admin/Themes/js/modernizr.min.js"></script>
    <script type="text/javascript" src="{SITE-NAME}/view/admin/Themes/js/detectizr.min.js"></script>
    <script type="text/javascript" src="{SITE-NAME}/view/admin/Themes/js/jquery.cookie.js"></script>
    <script type="text/javascript" src="{SITE-NAME}/view/admin/Themes/js/custom.js"></script>
    <!--[if lte IE 8]>
    <script language="javascript" type="text/javascript" src="js/excanvas.min.js"></script><![endif]-->
    <script type="text/javascript">
        var sitename='{SITE-NAME}';
    </script>
    <script type="text/javascript" src="{SITE-NAME}/view/admin/Themes/ckeditor/ckeditor.js"></script>
</head>

<body>

<div class="mainwrapper">

    <!-- START OF LEFT PANEL -->
    <div class="leftpanel">

        <div class="logopanel" style="text-align: center!important;">
           <a href="http://vifonic.com/"><img style="height: 36px" src="{SITE-NAME}/view/admin/Themes/images/logo.png" title="Hệ thống quản trị của Vifonic.com" alt="Hệ thống quản trị của Vifonic.com"></a>
        </div>
        <!--logopanel-->

        <div class="datewidget"><iframe scrolling="no" frameborder="no" style="overflow:hidden;border:0;margin:0;padding:0;width:235px;height:45px;"src="http://clocklink.com/html5embed.php?clock=lat&timezone=ICT&color=gray&size=235&Title=&Message=&Target=&From=2015,1,1,0,0,0&Color=gray"></iframe></div>

        <div class="searchwidget">
            <form action="" method="post">
                <div class="input-append">
                    <input type="text" class="span2 search-query" placeholder="Tìm kiếm...">
                    <button type="submit" class="btn"><span class="icon-search"></span></button>
                </div>
            </form>
        </div>
        <!--searchwidget-->


        <!--plainwidget-->

        <div class="leftmenu">
            <ul class="nav nav-tabs nav-stacked">
                <li class="nav-header">Main Navigation</li>
                <li class="{kichhoat}"><a href="{SITE-NAME}/admin"><span class="icon-align-justify"></span> Dashboard</a></li>
                <li class="{kichhoat_admin}" ><a href="{SITE-NAME}/controller/admin/admin.php"><span class="icon-user"></span> Tài khoản quản trị</a></li>
                <li class="{kichhoat_user}" ><a href="{SITE-NAME}/controller/admin/user.php"><span class="icon-user"></span> Thành viên</a></li>
                <li class="{kichhoat_config}"><a href="{SITE-NAME}/controller/admin/config.php"><span class=" icon-wrench"></span> Cấu hình hệ thống</a></li>
                <li class="{kichhoat_dathang}"><a href="{SITE-NAME}/controller/admin/dathang.php"><span class="icon-shopping-cart"></span> Đặt hàng</a></li>
                <li class="{kichhoat_lienhe}"><a href="{SITE-NAME}/controller/admin/lienhe.php"><span class="icon-envelope"></span> Liên hệ</a></li>
                <li  class="dropdown {kichhoat_sanpham}"><a href="#"><span class="  icon-briefcase"></span> Sản phẩm</a>
                    <ul>
                        <li><a href="{SITE-NAME}/controller/admin/danhmuctintuc.php">Danh mục</a></li>
                        <li><a href="{SITE-NAME}/controller/admin/sanpham.php">Danh sách </a></li>
                    </ul>
                </li>
                <li  class="dropdown {kichhoat_album}"><a href="#"><span class="icon-picture"></span> Album</a>
                    <ul>
                        <li><a href="{SITE-NAME}/controller/admin/album.php">Danh mục </a></li>
                        <li><a href="{SITE-NAME}/controller/admin/hinhanh.php">Danh sách </a></li>
                    </ul>
                </li>
                <li class="dropdown {kichhoat_tintuc}"><a href="#"><span class=" icon-edit"></span> Tin tức</a>
                    <ul>
                        <li><a href="{SITE-NAME}/controller/admin/danhmuctintuc.php">Danh mục</a></li>
                        <li><a href="{SITE-NAME}/controller/admin/tintuc.php">Danh sách </a></li>
                    </ul>
                </li>

                <li class="dropdown {kichhoat_dichvu}" ><a href="#"><span class=" icon-plane"></span> Dịch vụ</a>
                    <ul>
                        <li><a href="{SITE-NAME}/controller/admin/danhmucdichvu.php">Danh mục</a></li>
                        <li><a href="{SITE-NAME}/controller/admin/dichvu.php">Danh sách </a></li>
                    </ul>
                </li>
                <li class="dropdown {kichhoat_tuyendung}"><a href="#"><span class=" icon-magnet"></span> Tuyển dụng</a>
                    <ul>
                        <li><a href="{SITE-NAME}/controller/admin/danhmuctuyendung.php">Danh mục</a></li>
                        <li><a href="{SITE-NAME}/controller/admin/tuyendung.php">Danh sách </a></li>
                    </ul>
                </li>
                <li class="dropdown {kichhoat_duan}"><a href="#"><span class="  icon-random"></span> Dự án</a>
                    <ul>
                        <li><a href="{SITE-NAME}/controller/admin/danhmucduan.php">Danh mục</a></li>
                        <li><a href="{SITE-NAME}/controller/admin/duan.php">Danh sách </a></li>
                    </ul>
                </li>
                <li class="dropdown {kichhoat_blog}"><a href="#"><span class="iconfa-comment-alt"></span> Blog</a>
                    <ul>
                        <li><a href="{SITE-NAME}/controller/admin/danhmucblog.php">Danh mục</a></li>
                        <li><a href="{SITE-NAME}/controller/admin/blog.php">Danh sách </a></li>
                    </ul>
                </li>
                <li class="dropdown {kichhoat_gioithieu}"><a href="#"><span class=" icon-signal"></span> Giới thiệu</a>
                    <ul>
                        <li><a href="{SITE-NAME}/controller/admin/danhmucgioithieu.php">Danh mục</a></li>
                        <li><a href="{SITE-NAME}/controller/admin/tuyendung.php">Danh sách </a></li>
                    </ul>
                </li>
                <li class="dropdown {kichhoat_quangcao}"><a href="#"><span class="icon-bullhorn"></span> Quảng cáo</a>
                    <ul>
                        <li><a href="{SITE-NAME}/controller/admin/quangcao_left.php">Quảng cáo trái</a></li>
                        <li><a href="{SITE-NAME}/controller/admin/quangcao_right.php">Quảng cáo phải</a></li>
                    </ul>
                </li>
                <li class="{kichhoat_dangky}"><a href="{SITE-NAME}/controller/admin/dangky.php"><span class="icon-pencil"></span> Đăng ký email</a></li>
                <li class="{kichhoat_hotro}"><a href="{SITE-NAME}/controller/admin/video.php"><span class="icon-question-sign"></span> Hỗ trợ trực tuyến</a></li>
                <li class="{kichhoat_video}"><a href="{SITE-NAME}/controller/admin/video.php"><span class="icon-facetime-video"></span> Video</a></li>
                <li class="{kichhoat_slide}"><a href="{SITE-NAME}/controller/admin/slide.php"><span class="icon-film"></span> Slide</a></li>
                <li class="{kichhoat_menu}"><a href="{SITE-NAME}/controller/admin/menu.php"><span class="icon-th-list"></span> Cấu hình menu</a></li>
                <li class="{kichhoat_khuyenmai}"><a href="{SITE-NAME}/controller/admin/khuyenmai.php"><span class="icon-gift"></span> Khuyến mãi</a></li>
                <li class="{kichhoat_lienket}"><a href="{SITE-NAME}/controller/admin/link.php"><span class="iconfa-link"></span> Liên kết website</a></li>
                <li class="{kichhoat_tieude}"><a href="{SITE-NAME}/controller/admin/tieude.php"><span class="icon-font"></span> Tiêu đề</a></li>
                <li class="{kichhoat_doitac}"><a href="{SITE-NAME}/controller/admin/doitac.php"><span class=" icon-thumbs-up"></span> Đối tác</a></li>
                <li class="{kichhoat_mangxahoi}"><a href="{SITE-NAME}/controller/admin/mangxahoi.php"><span class=" iconfa-facebook"></span> Mạng xã hội</a></li>
                <li class="{kichhoat_ykien}"><a href="{SITE-NAME}/controller/admin/ykien.php"><span class="icon-comment"></span> Ý kiến khách hàng</a></li>
                <li class="{kichhoat_tieuchi}"><a href="{SITE-NAME}/controller/admin/tieuchi.php"><span class="icon-check"></span> Tiêu chí</a></li>
            </ul>
        </div>
        <!--leftmenu-->

    </div>
    <!--mainleft-->
    <!-- END OF LEFT PANEL -->

    <!-- START OF RIGHT PANEL -->
    <div class="rightpanel">
        <div class="headerpanel">
            <a href="#" class="showmenu"></a>

            <div class="headerright">


                <div class="dropdown userinfo">
                    <a class="dropdown-toggle" data-toggle="dropdown" data-target="#"
                       href="#">Xin chào, {USER-NAME} <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="{SITE-NAME}"><span class=" icon-globe"></span>Tới website</a></li>
                        <li><a href="{SITE-NAME}/controller/admin/signout.php"><span class="icon-share"></span> Đăng xuất</a></li>

                    </ul>
                </div>
                <!--dropdown-->

            </div>
            <!--headerright-->

        </div>
        <!--headerpanel-->
        <div class="breadcrumbwidget">

            <ul class="breadcrumb">
                <li><a href="{SITE-NAME}/admin">Home</a> <span class="divider">/</span></li>

            </ul>
        </div>
        <!--breadcrumbwidget-->
        <div class="pagetitle">
            <h1>Hệ thống quản trị {SITE-NAME}</h1>
        </div>
        <!--pagetitle-->

        <div class="maincontent">
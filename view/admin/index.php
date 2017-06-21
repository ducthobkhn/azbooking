<?php
require_once DIR . '/common/paging.php';
require_once DIR . '/common/cls_fast_template.php';
function view_index($data)
{
    $ft = new FastTemplate(DIR . '/view/admin/templates');
    $ft->assign('USER-NAME', isset($data['username']) ? $data['username'] : '');
    $ft->define('header', 'header.tpl');
    $ft->define('body', 'body.tpl');
    $ft->define('footer', 'footer.tpl');

    $ft->assign('TAB1-CLASS', "");
    $ft->assign('TAB2-CLASS', "current");


    $ft->assign('NOTIFICATION-CONTENT', isset($data['notififation_content']) ? $data['notififation_content'] : '');
    $ft->assign('TABLE-HEADER', '');
    $ft->assign('PAGING', '');
    $ft->assign('TABLE-BODY', '');
    $ft->assign('TABLE-NAME', ' Dashboard');
    $ft->assign('CONTENT-BOX-LEFT', isset($data['content_box_left']) ? $data['content_box_left'] : '');
    $ft->assign('CONTENT-BOX-RIGHT', isset($data['content_box_right']) ? $data['content_box_right'] : ' ');
    $ft->assign('NOTIFICATION', isset($data['notification']) ? $data['notification'] : ' ');
    $ft->assign('SITE-NAME', isset($data['sitename']) ? $data['sitename'] : SITE_NAME);
    $ft->assign('an', 'hidden');
    $ft->assign('kichhoat', 'active');
    $ft->assign('FORM', showFrom('', ''));
    //
    print $ft->parse_and_return('header');
    print $ft->parse_and_return('body');
    print $ft->parse_and_return('footer');
}

function showFrom($form, $ListKey = array())
{
    $str_from = '';
    $str_from .= '<div class="row-fluid">';
    $str_from .= '<div class="span12">';
    $str_from .= '<ul class="widgeticons row-fluid">';
    $str_from .= '<li class="one_fifth"><a href="'.SITE_NAME.'/controller/admin/admin.php"><img src="'.SITE_NAME.'/view/admin/Themes/images/imgadmin/admin.png" alt="" class=""><span>Tài khoản quản trị</span></a></li>';
    $str_from .= '<li class="one_fifth"><a href="'.SITE_NAME.'/controller/admin/user.php"><img src="'.SITE_NAME.'/view/admin/Themes/images/imgadmin/user.png" alt="" class=""><span>Thành viên</span></a></li>';
    $str_from .= '<li class="one_fifth"><a href="'.SITE_NAME.'/controller/admin/config.php"><img src="'.SITE_NAME.'/view/admin/Themes/images/imgadmin/cauhinh.png" alt="" class=""><span>Cấu hình hệ thống</span></a></li>';
    $str_from .= '<li class="one_fifth"><a href="'.SITE_NAME.'/controller/admin/dathang.php"><img src="'.SITE_NAME.'/view/admin/Themes/images/imgadmin/cart.png" alt="" class=""><span>Đặt hàng</span></a></li>';
    $str_from .= '<li class="one_fifth"><a href="'.SITE_NAME.'/controller/admin/lienhe.php"><img src="'.SITE_NAME.'/view/admin/Themes/images/imgadmin/lienhe.png" alt="" class=""><span>Liên hệ</span></a></li>';
    $str_from .= '<li class="one_fifth"><a href="'.SITE_NAME.'/controller/admin/sanpham.php"><img src="'.SITE_NAME.'/view/admin/Themes/images/imgadmin/sanpham.png" alt="" class=""><span>Sản phẩm</span></a></li>';
    $str_from .= '<li class="one_fifth"><a href="'.SITE_NAME.'/controller/admin/hinhanh.php"><img src="'.SITE_NAME.'/view/admin/Themes/images/imgadmin/album.png" alt="" class=""><span>Hình ảnh</span></a></li>';
    $str_from .= '<li class="one_fifth"><a href="'.SITE_NAME.'/controller/admin/tintuc.php"><img src="'.SITE_NAME.'/view/admin/Themes/images/imgadmin/tintuc.png" alt="" class=""><span>Tin tức</span></a></li>';
    $str_from .= '<li class="one_fifth"><a href="'.SITE_NAME.'/controller/admin/dichvu.php"><img src="'.SITE_NAME.'/view/admin/Themes/images/imgadmin/dichvu.png" alt="" class=""><span>Dịch vụ</span></a></li>';
    $str_from .= '<li class="one_fifth"><a href="'.SITE_NAME.'/controller/admin/tuyendung.php"><img src="'.SITE_NAME.'/view/admin/Themes/images/imgadmin/tuyendung.png" alt="" class=""><span>Tuyển dụng</span></a></li>';
    $str_from .= '<li class="one_fifth"><a href="'.SITE_NAME.'/controller/admin/duan.php"><img src="'.SITE_NAME.'/view/admin/Themes/images/imgadmin/duan.png" alt="" class=""><span>Dự án</span></a></li>';
    $str_from .= '<li class="one_fifth"><a href="'.SITE_NAME.'/controller/admin/blog.php"><img src="'.SITE_NAME.'/view/admin/Themes/images/imgadmin/blog.png" alt="" class=""><span>Blog</span></a></li>';
    $str_from .= '<li class="one_fifth"><a href="'.SITE_NAME.'/controller/admin/gioithieu.php"><img src="'.SITE_NAME.'/view/admin/Themes/images/imgadmin/gioithieu.png" alt="" class=""><span>Giới thiệu</span></a></li>';
    $str_from .= '<li class="one_fifth"><a href="'.SITE_NAME.'/controller/admin/quangcao.php"><img src="'.SITE_NAME.'/view/admin/Themes/images/imgadmin/quangcao.png" alt="" class=""><span>Quảng cáo</span></a></li>';
    $str_from .= '<li class="one_fifth"><a href="'.SITE_NAME.'/controller/admin/dangky.php"><img src="'.SITE_NAME.'/view/admin/Themes/images/imgadmin/dangky.png" alt="" class=""><span>Đăng ký email</span></a></li>';
    $str_from .= '<li class="one_fifth"><a href="'.SITE_NAME.'/controller/admin/hotro.php"><img src="'.SITE_NAME.'/view/admin/Themes/images/imgadmin/hotro.png" alt="" class=""><span>Hỗ trợ trực tuyến</span></a></li>';
    $str_from .= '<li class="one_fifth"><a href="'.SITE_NAME.'/controller/admin/video/hotro.php"><img src="'.SITE_NAME.'/view/admin/Themes/images/imgadmin/video.png" alt="" class=""><span>Video</span></a></li>';
    $str_from .= '<li class="one_fifth"><a href="'.SITE_NAME.'/controller/admin/video/slide.php"><img src="'.SITE_NAME.'/view/admin/Themes/images/imgadmin/slide.png" alt="" class=""><span>Slide</span></a></li>';
    $str_from .= '<li class="one_fifth"><a href="'.SITE_NAME.'/controller/admin/video/menu.php"><img src="'.SITE_NAME.'/view/admin/Themes/images/imgadmin/menu.png" alt="" class=""><span>Cấu hình menu</span></a></li>';
    $str_from .= '<li class="one_fifth"><a href="'.SITE_NAME.'/controller/admin/video/khuyemai.php"><img src="'.SITE_NAME.'/view/admin/Themes/images/imgadmin/khuyenmai.png" alt="" class=""><span>Khuyến mãi</span></a></li>';
    $str_from .= '<li class="one_fifth"><a href="'.SITE_NAME.'/controller/admin/video/lienket.php"><img src="'.SITE_NAME.'/view/admin/Themes/images/imgadmin/lienket.png" alt="" class=""><span>Liên kết website</span></a></li>';
    $str_from .= '<li class="one_fifth"><a href="'.SITE_NAME.'/controller/admin/video/tieude.php"><img src="'.SITE_NAME.'/view/admin/Themes/images/imgadmin/tieude.png" alt="" class=""><span>Tiêu đề</span></a></li>';
    $str_from .= '<li class="one_fifth"><a href="'.SITE_NAME.'/controller/admin/video/doitac.php"><img src="'.SITE_NAME.'/view/admin/Themes/images/imgadmin/doitac.png" alt="" class=""><span>Đối tác</span></a></li>';
    $str_from .= '<li class="one_fifth"><a href="'.SITE_NAME.'/controller/admin/video/mangxahoi.php"><img src="'.SITE_NAME.'/view/admin/Themes/images/imgadmin/mangxahoi.png" alt="" class=""><span>Mạng xã hội</span></a></li>';
    $str_from .= '<li class="one_fifth"><a href="'.SITE_NAME.'/controller/admin/video/ykien.php"><img src="'.SITE_NAME.'/view/admin/Themes/images/imgadmin/ykien.png" alt="" class=""><span>Ý kiến khách hàng</span></a></li>';
    $str_from .= '<li class="one_fifth"><a href="'.SITE_NAME.'/controller/admin/video/tieuchi.php"><img src="'.SITE_NAME.'/view/admin/Themes/images/imgadmin/tieuchi.png" alt="" class=""><span>Tiêu chí</span></a></li>';

    $str_from .= '</ul></div></div>';
    return $str_from;
}

<?php
/**
 * Created by PhpStorm.
 * User: ductho
 * Date: 11/20/14
 * Time: 11:00 AM
 */

$array_files=scandir(DIR.'/model');
foreach ($array_files as $filename) {
    $path = DIR.'/model/' . $filename;
    if (is_file($path)) {
        require_once $path;
    }
}
//
$array_files=scandir(DIR.'/view/default');
foreach ($array_files as $filename) {
    $path = DIR.'/view/default/' . $filename;
    if (is_file($path)) {
        require_once $path;
    }
}
function show_header($title,$description,$keyword,$data1=array())
{
    $data=array();
    $data['Title']=$title;
    $data['Description']=$description;
    $data['Keyword']=$keyword;

    view_header($data);
}

function show_menu($data1=array(),$active='trangchu')
{
    $data=array();
    $data['config']=config_getByTop(1,'','');
    view_menu($data);
}
function show_footer($data1=array(),$active='trangchu')
{
    $data=array();
    $data['mangxahoi_ft']=mangxahoi_getById(1);
    $data['config']=config_getByTop(1,'','');
    $data['doitac']=doitac_getByTop('','','Id desc');
    $data['quocgia']=countries_getByTop('','','id desc');

    $data['venoidia']=venoidia_getByTop(7,'DanhMucId=1','Id desc');
    $data['thanhtoan']=thanhtoan_getByTop('','','Id desc');
    $data['menu1']=menu_getByTop(1,'Id=1','');
    $data['menu2']=menu_getByTop(1,'Id=2','');
    $data['menu3']=menu_getByTop(1,'Id=3','');
    $data['menu4']=menu_getByTop(1,'Id=4','');
    $data['menu5']=menu_getByTop(1,'Id=5','');
    $data['menu6']=menu_getByTop(1,'Id=6','');
    $data['menu7']=menu_getByTop(1,'Id=7','');
    $data['name_tt2']=tieude_getById(2);
    $data['name_tt3']=tieude_getById(3);
    $data['name_tt4']=tieude_getById(4);
    $data['name_tt5']=tieude_getById(5);

    if (isset($_POST['dangkyemail'])) {

        $email=addslashes(strip_tags($_POST['Email_dk']));

        if($email=="")
        {
            echo "<script>alert('Quý khách vui nhập email')</script>";
        }
        else
        {

            $new = new dangky();
            $new->Email=$email;
            $new->Created=date(DATETIME_FORMAT);
            dangky_insert($new);

            echo "<script>alert('Quý khách đã đăng ký thành công')</script>";

        }

    }
    view_footer($data);
}



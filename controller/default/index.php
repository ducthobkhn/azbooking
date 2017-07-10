<?php
/**
 * Created by PhpStorm.
 * User: tungtv
 * Date: 11/10/14
 * Time: 2:40 PM
 */
if(!defined('SITE_NAME'))
{
    require_once '../../config.php';
}

require_once DIR.'/controller/default/public.php';
require_once DIR.'/common/upload_image.php';
require_once(DIR."/common/hash_pass.php");
$data=array();

$data['config']=config_getByTop(1,'','');
$data['mangxahoi']=mangxahoi_getById(1);
$data['quangcao']=quangcao_getByTop(1,'','');
$data['tieuchi']=tieuchi_getByTop(3,'','Id asc');
$data['danhmuchotro']=danhmuchotro_getByTop('','','Id desc');
$data['gioithieu']=gioithieu_getByTop(1,'','');

$data['hinhthucthanhtoan']=hinhthucthanhtoan_getByTop('','','Id asc');
$data['tinkhuyenmai']=tinkhuyenmai_getByTop('','NoiBat=1','Id desc');

$data['venoidia_index']=venoidia_getByTop(7,'DanhMucId=1','Id desc');
$data['vequocte_index']=venoidia_getByTop(7,'DanhMucId=2','Id desc');


show_header('','','');
show_menu($data,'trangchu');
show_index($data);
show_footer($data,'trangchu');

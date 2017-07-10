<?php
/**
 * Created by PhpStorm.
 * User: tungtv
 * Date: 11/10/14
 * Time: 2:44 PM
 */
require_once DIR . '/view/default/public.php';
require_once DIR . '/common/cls_fast_template.php';
require_once DIR . '/common/paging.php';
function show_timkiemchuyenbay($data = array())
{

    $asign = array();
    $asign['tieude'] = "";


    $asign['RoundTrip']=$data['RoundTrip'];
    $asign['data_post']=json_encode($data);

    $asign['FromPlace']=$data['FromPlace'];
    $asign['TFromPlace']=$data['TFromPlace'];
    $asign['ToPlace']=$data['ToPlace'];
    $asign['TToPlace']=$data['TToPlace'];
    $asign['adult']=$data['Adult'];
    $asign['child']=$data['Child'];
    $asign['infant']=$data['Infant'];
    $asign['Adult']=$data['Adult'];
    $asign['Child']=$data['Child'];
    $asign['Infant']=$data['Infant'];


    $asign['chuyen_bay_td']="Chuyến bay";
    $asign['khoihanh_td']="Khởi hành";
    $asign['di_td']="Đi";
    $asign['den_td']="Đến";
    $asign['giave_td']="Giá vé";
    $asign['chitiet_td']="Chi tiết";


    $asign['sohk_td']="Số hành khách";
    $asign['ngayxuatphat_td']="Ngày xuất phát";
    $asign['loaive_td']="Loại vé";
    $asign['hanhtrinh_td']="Hành trình chuyến đi";
    $asign['hanhtrinhve_td']="Hành trình chuyến về";
    $asign['venoidia_td']="Vé nội địa";
    $asign['vequocte_td']="Vé quốc tế";
    $asign['datvemaybay_td']="ĐẶT VÉ MÁY BAY";
    $asign['vekhuhoi_td']="Vé khứ hồi";
    $asign['vemotchieu_td']="Vé một chiều";
    $asign['diemdi_td']="Điểm đi";
    $asign['diemden_td']="Điểm đến";
    $asign['ngaydi_td']="Ngày đi";
    $asign['ngayve_td']="Ngày về";
    $asign['nguoilon_td']="người lớn";
    $asign['treem_td']="trẻ em";
    $asign['sosinh_td']="sơ sinh";
    $asign['timchuyenbay_td']="Tìm chuyến bay";
    $asign['tieude'] = '<a href="' . SITE_NAME . '"><i class="fa fa-home"></i> Trang chủ</a> <i class="fa fa-angle-right"></i> <span>Tìm kiếm</span>';
//    $asign['name_tt6'] = $data['name_tt6'][0]->Name;

    $asign['PAGING'] = "";

    //Default values
    $DepartDate = time() + 3*24*60*60;
    $DepartDate = date("d/m/Y",$DepartDate);
    $ReturnDate = time() + 4*24*60*60;
    $ReturnDate = date("d/m/Y",$ReturnDate);
    if($data['RoundTrip']=='true'){
        $asign['RoundTripTrue'] = 'checked';
        $asign['RoundTripFalse'] = '';

    }else{
        $asign['RoundTripTrue'] = '';
        $asign['RoundTripFalse'] = 'checked';

    }

    $asign['DepartDate'] = $DepartDate;
    $asign['ReturnDate'] = $ReturnDate;

    for($i=1;$i<=15;$i++) {
        if($i == $data['Adult'])
            $asign['Adult'] .= "<option selected value='".$i."'>".$i."</option>";
        else
            $asign['Adult'] .= "<option value='".$i."'>".$i."</option>";
    }
    for($i=0;$i<=15;$i++) {
        if($i == $data['Child'])
            $asign['Child'] .= "<option selected value='".$i."'>".$i."</option>";
        else
            $asign['Child'] .= "<option value='".$i."'>".$i."</option>";
    }
    for($i=0;$i<=15;$i++) {
        if($i == $data['Infant'])
            $asign['Infant'] .= "<option selected value='".$i."'>".$i."</option>";
        else
            $asign['Infant'] .= "<option value='".$i."'>".$i."</option>";
    }
    $dataarray = null;

    if( $asign['RoundTrip'] == 'false')
    {
        print_template($asign, 'timkiemchuyenbay');
    }
    else
    {
        print_template($asign, 'timkiemchuyenbay2');
    }



}
<?php
/**
 * Created by PhpStorm.
 * User: tungtv
 * Date: 11/10/14
 * Time: 2:44 PM
 */
require_once DIR . '/view/default/public.php';
require_once DIR . '/common/cls_fast_template.php';
function show_index($data = array())
{
    $asign = array();

    //Default values
    $DepartDate = time() + 3*24*60*60;
    $DepartDate = date("d/m/Y",$DepartDate);
    $ReturnDate = time() + 4*24*60*60;
    $ReturnDate = date("d/m/Y",$ReturnDate);
    $asign['RoundTripTrue'] = 'checked';
    $asign['RoundTripFalse'] = '';
    $asign['FromPlace'] = 'HAN';
    $asign['ToPlace'] = 'SGN';
    $asign['TFromPlace'] = 'Hà Nội';
    $asign['TToPlace'] = 'Hồ Chí Minh';
    $asign['DepartDate'] = $DepartDate;
    $asign['ReturnDate'] = $ReturnDate;
    $asign['Adult'] = '';
    $asign['Child'] = '';
    $asign['Infant'] = '';

    $asign['Face']=$data['mangxahoi'][0]->Face;
    $asign['Feed']=$data['mangxahoi'][0]->Feed;
    $asign['Twitter']=$data['mangxahoi'][0]->Twitter;
    $asign['Google']=$data['mangxahoi'][0]->Google;
    $asign['Youtube']=$data['mangxahoi'][0]->Youtube;
    //quangcao
    $asign['Name_qc'] = $data['quangcao'][0]->Name;
    $asign['img_qc'] = $data['quangcao'][0]->Img;
    $asign['link_qc'] = $data['quangcao'][0]->Link;
    $asign['tieuchi'] = print_item('tieuchi', $data['tieuchi']);

    $asign['Hotline_datve'] = $data['config'][0]->Hotlien_datve;
    $asign['img_gt'] = $data['gioithieu'][0]->Img;

    $asign['tinkhuyenmai'] = "";
    if (count($data['tinkhuyenmai']) > 0) {
        $asign['tinkhuyenmai'] = print_item('tinkhuyenmai_home', $data['tinkhuyenmai']);
    }
    $asign['hinhthucthanhtoan'] = "";
    if (count($data['hinhthucthanhtoan']) > 0) {
        $asign['hinhthucthanhtoan'] = print_item('hinhthucthanhtoan', $data['hinhthucthanhtoan']);
    }
    $asign['danhmuchotro'] = "";
    if (count($data['danhmuchotro']) > 0) {
        foreach ($data['danhmuchotro'] as $dmht) {
            $iddm_hotro ="DanhMucId=".$dmht->Id;
            $data['hotro'] = hotro_getByTop('', $iddm_hotro, 'Id desc');
            if (count($data['hotro']) > 0) {
                $asign['danhmuchotro'] .= '<div class="list-supports row">';
                $asign['danhmuchotro'] .= '<div class="col-md-3 col-sm-12 col-xs-12">';
                $asign['danhmuchotro'] .= '<span>'.$dmht->Name.'</span>';
                $asign['danhmuchotro'] .= '</div>';
                $asign['danhmuchotro'] .= '<div class="col-md-9 col-sm-12 col-xs-12">';
                $asign['danhmuchotro'] .= '<ul class="skype-list">';
                foreach($data['hotro'] as $ht)
                {
                    $asign['danhmuchotro'] .= '<li><a href="Skype:'.$ht->Skype.'?chat">Mr Thế<span>'.$ht->Phone.'</span></a></li>';
                }


                $asign['danhmuchotro'] .= ' </ul><div class="clearfix"></div></div></div>';
            }
        }
    }

    $asign['venoidia_index'] = "";
    if (count($data['venoidia_index']) > 0) {
        $asign['venoidia_index'] = print_item('venoidia-index', $data['venoidia_index']);
    }

    $asign['vequocte_index'] = "";
    if (count($data['vequocte_index']) > 0) {
        $asign['vequocte_index'] = print_item('venoidia-index', $data['vequocte_index']);
    }

    $asign['gioithieu'] =strip_tags($data['gioithieu'][0]->GioiThieu);

    $asign['taisao_td']="Tại sao bạn nên chọn Tourcoach";
    $asign['gia_td']="Đảm bảo giá tốt nhất";
    $asign['km_td']="Luôn có khuyến mãi và quà tặng";
    $asign['thanhtoan_td']="Thanh toán dễ dàng, đa dạng";
    $asign['tk_td']="Tìm kiếm linh hoạt, dễ dàng";
    $asign['dichvu_td']="Dịch vụ tin cậy - giá trị đích thực";
    $asign['tantinh_td']="Hỗ trợ tận tình - chu đáo 24/7";

    $asign['tinkm_td']="Tin khuyến mãi";
    $asign['httt_td']="Các hình thức thanh toán";
    print_template($asign, 'index');
}
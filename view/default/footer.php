<?php
require_once DIR.'/view/default/public.php';
function view_footer($data=array())
{
    $asign=array();

    $asign['logo']=$data['config'][0]->Logo_footer;
    $asign['Hotline']=$data['config'][0]->Hotline;
    $asign['Email']=$data['config'][0]->Email;

    $asign['doitac'] = "";
    if(count($data['doitac'])>0)
    {
        $asign['doitac'] = print_item('doitac', $data['doitac']);
    }

    $asign['venoidia'] = "";
    if(count($data['venoidia'])>0)
    {
        $asign['venoidia'] = print_item('venoidia', $data['venoidia']);
    }

    $asign['thanhtoan'] = "";
    if(count($data['thanhtoan'])>0)
    {
        $asign['thanhtoan'] = print_item('thanhtoan_ft', $data['thanhtoan']);
    }
    $asign['ten_menu0'] = "Trang chủ";
    $asign['ten_menu1'] = $data['menu1'][0]->Name;
    $asign['ten_menu2'] = $data['menu2'][0]->Name;
    $asign['ten_menu3'] = $data['menu3'][0]->Name;
    $asign['ten_menu4'] = $data['menu4'][0]->Name;
    $asign['ten_menu5'] = $data['menu5'][0]->Name;
    $asign['ten_menu6'] = $data['menu6'][0]->Name;
    $asign['vect_td']="Về chúng tôi";
    $asign['dc'] ="Địa chỉ";
    $asign['Address']=$data['config'][0]->Address;
    $asign['ten'] = $data['config'][0]->Name;
    $asign['thongtin_td'] ="Thông tin";
    $asign['dv_td']="Dịch vụ";
    $asign['dieukhoan_td']="Điều khoản & điều kiện";
    $asign['cs_td']="Chính sách riêng tư";
    $asign['hd_td']="Hướng dẫn thanh toán";
    $asign['ck_td']="Thông tin chuyển khoản";
    $asign['ch_td']="Câu hỏi thường gặp";
    $asign['vend_td']="Vé nội địa";
    $asign['dkn_td']="Đăng ký nhận bản tin";
    $asign['dth_td']="Đối tác hàng không";
    $asign['ketnnoi_td']="KẾT NỐI VỚI TOURCOACH";
    $asign['antoan_td']="Thanh toán an toàn tại TOURCOACH";

    $asign['dangkybt_td']="Đăng ký";

    $asign['name_tt2'] = $data['name_tt2'][0]->Name;
    $asign['name_tt3'] = $data['name_tt3'][0]->Name;
    $asign['name_tt4'] = $data['name_tt4'][0]->Name;
    $asign['name_tt5'] = $data['name_tt5'][0]->Name;
    $asign['Face']=$data['mangxahoi_ft'][0]->Face;
    $asign['Feed']=$data['mangxahoi_ft'][0]->Feed;
    $asign['Twitter']=$data['mangxahoi_ft'][0]->Twitter;
    $asign['Google']=$data['mangxahoi_ft'][0]->Google;
    $asign['Youtube']=$data['mangxahoi_ft'][0]->Youtube;



    $asign['quocgia']="";
    if(count( $data['quocgia'])>0)
    {
        foreach ( $data['quocgia'] as $qg) {
            $asign['quocgia'] .='<option value="'.$qg->sortname.'">'.$qg->name.'</option>';
        }
    }
    print_template($asign,'footer');
}

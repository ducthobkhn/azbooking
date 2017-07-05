<?php
/**
 * Created by PhpStorm.
 * User: tungtv
 * Date: 11/10/14
 * Time: 2:40 PM
 */
if (!defined('SITE_NAME')) {
    require_once '../../config.php';
}

require_once DIR . '/controller/default/public.php';
require_once DIR . '/common/upload_image.php';
require_once(DIR . "/common/hash_pass.php");
$data = array();

if (isset($_POST['RoundTrip']) && $_POST['RoundTrip'] == 'true') {
    $RoundTrip = "true";
    $FromPlace = $_POST['FromPlace'];
    $TFromPlace = $_POST['TFromPlace'];
    $ToPlace = $_POST['ToPlace'];
    $TToPlace = $_POST['TToPlace'];
    $DepartDate = $_POST['DepartDate'];
    $ReturnDate = ($_POST['ReturnDate'] && $_POST['ReturnDate'] != "") ? $_POST['ReturnDate'] : "";
    $Adult = $_POST['Adult'];
    $Child = $_POST['Child'];
    $Infant = $_POST['Infant'];
} else {
    $RoundTrip = "false";
    $FromPlace = $_POST['FromPlace'];
    $TFromPlace = $_POST['TFromPlace'];
    $ToPlace = $_POST['ToPlace'];
    $TToPlace = $_POST['TToPlace'];
    $DepartDate = $_POST['DepartDate'];
    $ReturnDate = '';
    $Adult = $_POST['Adult'];
    $Child = $_POST['Child'];
    $Infant = $_POST['Infant'];
}

$data['RoundTrip']=$RoundTrip;
$data['FromPlace']=$FromPlace ;
$data['TFromPlace']=$TFromPlace ;
$data['ToPlace']=$ToPlace ;
$data['TToPlace']=$TToPlace;
$data['DepartDate']=$DepartDate;
$data['ReturnDate']=$ReturnDate ;
$data['Adult']=$Adult ;
$data['Child']=$Child;
$data['Infant']=$Infant;

$soapUrl = "http://azbooking.apivemaybay.net/AirlineTicket.asmx"; // asmx URL of WSDL
$soapUser = "azbooking";  //  username
$soapPassword = "7Q@9)nAZ}x%lp?^"; // password

// xml post structure
if($RoundTrip=='true'){
    $xml_post_string = "<x:Envelope xmlns:x=\"http://schemas.xmlsoap.org/soap/envelope/\" xmlns:tem=\"http://tempuri.org/\" >
<x:Header/>
<x:Body>
<tem:DomesticResult>
      <tem:startPoint>$FromPlace</tem:startPoint>
      <tem:endPoint>$ToPlace</tem:endPoint>
      <tem:departureDate>$DepartDate</tem:departureDate>
      <tem:returnDate>$ReturnDate</tem:returnDate>
      <tem:adults>$Adult</tem:adults>
      <tem:children>$Child</tem:children>
      <tem:infants>$Infant</tem:infants>
  
      <tem:authentication>
        <tem:HeaderUser>azbooking</tem:HeaderUser>
        <tem:HeaderPassword>7Q@9)nAZ}x%lp?^</tem:HeaderPassword>
      </tem:authentication>
    </tem:DomesticResult>
  </x:Body>
</x:Envelope>";
}else{
    $xml_post_string = "<x:Envelope xmlns:x=\"http://schemas.xmlsoap.org/soap/envelope/\" xmlns:tem=\"http://tempuri.org/\" >
<x:Header/>
<x:Body>
<tem:DomesticResult>
      <tem:startPoint>$FromPlace</tem:startPoint>
      <tem:endPoint>$ToPlace</tem:endPoint>
      <tem:departureDate>$DepartDate</tem:departureDate>
      <tem:adults>$Adult</tem:adults>
      <tem:children>$Child</tem:children>
      <tem:infants>$Infant</tem:infants>
      <tem:authentication>
        <tem:HeaderUser>azbooking</tem:HeaderUser>
        <tem:HeaderPassword>7Q@9)nAZ}x%lp?^</tem:HeaderPassword>
      </tem:authentication>
    </tem:DomesticResult>
  </x:Body>
</x:Envelope>";
}


$headers = array(
    "Content-type: text/xml;charset=\"utf-8\"",
    "SOAPAction:  http://tempuri.org/DomesticResult",
); //SOAPAction: your op URL

$url = $soapUrl;

// PHP cURL  for https connection with auth
$ch = curl_init();
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//curl_setopt($ch, CURLOPT_USERPWD, $soapUser . ":" . $soapPassword); // username and password - declared at the top of the doc
curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
curl_setopt($ch, CURLOPT_TIMEOUT, 30);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $xml_post_string); // the SOAP request
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$response = curl_exec($ch);
curl_close($ch);			// Dữ liệu trả về là kiểu stdClass Object

$start= (strpos($response,'<DomesticResultResult>'));
$end= (strpos($response,'</DomesticResultResult>'));
$responseData = substr($response,$start+22,$end-$start-22);

$html = $response;
$pattern = "/<p[^>]*><\\/p[^>]*>/";
//$pattern = "/<[^\/>]*>([\s]?)*<\/[^>]*>/";  use this pattern to remove any empty tag
$resonseArray=(json_decode($responseData));
$arrayDepart=array();
$arrayReturn=array();
if(count($resonseArray)>0){
    foreach ($resonseArray as $item){
        $RelatedFlights=($item->RelatedFlights)[0];
        if($RelatedFlights->Class='Eco'){
            if($item->AirlineCode=='VJ'){
                $item->Img_hang='VietJetAir.png';
            }else{
                if($item->AirlineCode=='BL' || $item->AirlineCode=='JQ' ){
                    $item->Img_hang='jetstar.png';
                }else{
                    $item->Img_hang='VietnamAirlines.png';
                }
            }
            if($RelatedFlights->StartPoint==$FromPlace){
                $item->departDate= date("Y-m-d", strtotime(str_replace("/", "-", $_POST['DepartDate'])));
                $item->fromPlace= $TFromPlace;
                $item->toPlace= $TToPlace;
                array_push($arrayDepart,$item);
            }else  {
                $item->fromPlace= $TFromPlace;
                $item->toPlace= $TToPlace;
                $item->departDate= date("Y-m-d", strtotime(str_replace("/", "-", $_POST['ReturnDate'])));
                $item->returnDate= date("Y-m-d", strtotime(str_replace("/", "-", $_POST['DepartDate'])));
                array_push($arrayReturn,$item);
            }
        }

    }
}
print_r($response);
exit;
$str = '';
foreach ($arrayDepart as $item){
    $str.=' <tr class="i-result">
                    <td class="logo-air"><img src="<?php echo SITE_NAME ?>/view/default/theme/images/<?=$val->AirlineCode?>.png" alt="" /><p><?=$val->FlightNumber?></p></td>
                    <td class="den-di"><p><?php echo date("H:i", strtotime($val->DepartTime)); ?><span>(<?=$val->FromPlace;?>)</span></p></td>
                    <td class="thoi-gian"><span><?php echo $gio.":".$phut ?></span></td>
                    <td class="den-di"><p><?php echo date("H:i", strtotime($val->LandingTime)); ?><span>(<?=$val->ToPlace;?>)</span></p></td>
                    <td class="gia"><p><?=number_format($val->Price)?> <sup>vnđ</sup></p><div class="TicketPrice" style="display: none; "><?=$val->Price; ?></div></td>
                    <td class="check-ve">
                        <input type="radio" class="check-ve-radio" id="air-<?php echo $temp; ?>" flightref="<?=$val->FlightNumber?>" name="Block<?=$RoundTrip?>" value="<?=$val->FlightNumber?>" recec="0" />
                        <label for="air-<?php echo $temp; ?>"><span></span>&nbsp</label>
                    </td>
                    <td class="chi-tiet"><a href="#">Xem chi tiết</a></td>
                </tr>
                <tr style="" class="flight-info-detail">
                    <td class="flight-detail-content" colspan="8">
                        <table width="100%" cellspacing="0" cellpadding="0">
                            <tbody class="view-detail-flight">
                            <tr>
                                <td valign="top">
                                    <h4>Chuyến bay</h4>
                                    <p><span><?=$val->AirlineCode?></span></p>
                                    <p><span><?=$val->FlightNumber?></b></span></p>
                                    <p>Loại vé: <span><?=$val->TicketType?></span></p>
                                </td>
                                <td valign="top">
                                    <h4>Khởi hành</h4>
                                    <p>Từ <span class="color-blue"><?php echo $TFromPlace;?>, </span>Việt Nam</p>
                                    <p>Sân bay: <span><?php echo $TFromPlace;?> (<?php echo $FromPlace;?>)</span></p>
                                    <p>Thời gian: <span class="color-blue"><?php echo date("H:i", $departTime); ?></span>, <?php echo date("d/m/Y", $departTime); ?></p>
                                </td>
                                <td valign="top">
                                    <h4>Điểm đến</h4>
                                    <p>Tới <span class="color-blue"><?php echo $TToPlace;?>, </span>Việt Nam</p>
                                    <p>Sân bay: <span><?php echo $TToPlace;?> (<?php echo $ToPlace;?>)</span></p>
                                    <p>Thời gian: <span class="color-blue"><?php echo date("H:i", $landingTime); ?></span>, <?php echo date("d/m/Y", $landingTime); ?></p>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <table width="100%" class="price-break">
                            <tbody>
                            <tr class="title-b">
                                <td nowrap="" align="center" class="header">Hành khách</td>
                                <td nowrap="" align="center" class="header">Số lượng vé</td>
                                <td nowrap="" align="center" class="header pb-price">Giá mỗi vé</td>
                                <td nowrap="" align="center" class="header pb-price">Thuế &amp; Phí</td>
                                <td nowrap="" align="center" style="display:none;" class="header pb-price">Giảm giá</td>
                                <td nowrap="" align="center" class="header pb-price">Tổng giá</td>
                            </tr>
                            <?php
                            if($val->AirlineCode == "VietJetAir" || $val->AirlineCode == "JetStar") {
                                $price_total1 = 0;
                                $price_total2 = 0;
                                $price_total3 = 0;
                                if($Adult) {
                                    $Price = $val->Price;
                                    $price_tax = ($Price*10/100)*1 + 190000*1;
                                    $price_total1 = ($Price + $price_tax)*$Adult;
                                    ?>
                                    <tr>
                                        <td align="center" class="pax">Người lớn</td>
                                        <td align="center" class="pax"><?php echo $Adult; ?></td>
                                        <td align="center" class="pax pb-price"><?php echo $Price; ?> VNĐ</td>
                                        <td align="center" class="pax pb-price"><?php echo $price_tax; ?></td>
                                        <td align="center" style="display:none;" class="pax pb-price">0 VNĐ</td>
                                        <td align="center" class="pax pb-price"><?php echo $price_total1; ?></td>
                                    </tr>
                                <?php }
                                if($Child) {
                                    $Price = $val->Price;
                                    $price_tax = ($Price*10/100)*1 + 140000*1;
                                    $price_total2 = ($Price + $price_tax)*$Child;
                                    ?>
                                    <tr>
                                        <td align="center" class="pax">Trẻ em</td>
                                        <td align="center" class="pax"><?php echo $Child; ?></td>
                                        <td align="center" class="pax pb-price"><?php echo $Price; ?> VNĐ</td>
                                        <td align="center" class="pax pb-price"><?php echo $price_tax; ?></td>
                                        <td align="center" style="display:none;" class="pax pb-price">0 VNĐ</td>
                                        <td align="center" class="pax pb-price"><?php echo $price_total2; ?></td>
                                    </tr>
                                <?php } ?>
                                <tr class="total-b">
                                    <td align="right" class="footer" colspan="3"></>
                                    <td align="right" class="footer">
                                        <p>Tổng cộng </p>
                                    <td align="center" class="footer pb-price" colspan="2">
                                        <p><?php echo $price_total1 + $price_total2 + $price_total3; ?> VNĐ</p>
                                    </td>
                                </tr>
                            <?php }
                            if($val->AirlineCode == "VietnamAirlines") {
                                $price_total1 = 0;
                                $price_total2 = 0;
                                $price_total3 = 0;
                                if($Adult) {
                                    $Price = $val->Price;
                                    $price_tax = ($Price*10/100)*1 + 190000*1;
                                    $price_total1 = ($Price + $price_tax)*$Adult;
                                    ?>
                                    <tr>
                                        <td align="center" class="pax">Người lớn</td>
                                        <td align="center" class="pax"><?php echo $Adult; ?></td>
                                        <td align="center" class="pax pb-price"><?php echo $Price; ?> VNĐ</td>
                                        <td align="center" class="pax pb-price"><?php echo $price_tax; ?></td>
                                        <td align="center" style="display:none;" class="pax pb-price">0 VNĐ</td>
                                        <td align="center" class="pax pb-price"><?php echo $price_total1; ?></td>
                                    </tr>
                                <?php }
                                if($Child) {
                                    $Price = $val->Price;
                                    $price_tax = ($Price*10/100)*1 + 140000*1;
                                    $price_total2 = ($Price + $price_tax)*$Child;
                                    ?>
                                    <tr>
                                        <td align="center" class="pax">Trẻ em</td>
                                        <td align="center" class="pax"><?php echo $Child; ?></td>
                                        <td align="center" class="pax pb-price"><?php echo $Price; ?> VNĐ</td>
                                        <td align="center" class="pax pb-price"><?php echo $price_tax; ?></td>
                                        <td align="center" style="display:none;" class="pax pb-price">0 VNĐ</td>
                                        <td align="center" class="pax pb-price"><?php echo $price_total2; ?></td>
                                    </tr>
                                <?php }
                                if($Infant) {
                                    $Price = $val->Price;
                                    $price_tax = ($Price*10/100)*1 + 140000*1;
                                    $price_total3 = ($Price + $price_tax)*$Child;
                                    ?>
                                    <tr>
                                        <td align="center" class="pax">Sơ sinh</td>
                                        <td align="center" class="pax"><?php echo $Child; ?></td>
                                        <td align="center" class="pax pb-price"><?php echo $Price; ?> VNĐ</td>
                                        <td align="center" class="pax pb-price"><?php echo $price_tax; ?></td>
                                        <td align="center" style="display:none;" class="pax pb-price">0 VNĐ</td>
                                        <td align="center" class="pax pb-price"><?php echo $price_total2; ?></td>
                                    </tr>
                                <?php }?>
                                <tr class="total-b">
                                    <td align="right" class="footer" colspan="3"></>
                                    <td align="right" class="footer">
                                        <p>Tổng cộng </p>
                                    <td align="center" class="footer pb-price" colspan="2">
                                        <p><?php echo $price_total1 + $price_total2 + $price_total3; ?> VNĐ</p>
                                    </td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                        <table class="dieu-kien" width="90%" cellspacing="0" cellpadding="0">
                            <colgroup><col width="170">
                                <col width="450">
                            </colgroup>
                            <tbody>
                            <tr class="title">
                                <td colspan="2"><h4>Điều kiện hành lý</h4></td>
                            </tr>
                            <tr>
                                <td class="name">Hành Lý Xách Tay</td>
                                <td>7 kg</td>
                            </tr>
                            <tr>
                                <td class="name">Hành lý ký gửi</td>
                                <td>Vui lòng chọn ở bước sau</td>
                            </tr>
                            </tbody>
                        </table>
                        <table class="dieu-kien" cellspacing="0" cellpadding="0" width="90%">
                            <colgroup>
                                <col width="170">
                                <col width="450">
                            </colgroup>
                            <tbody>
                            <tr class="title">
                                <td colspan="2"><h4>Điều kiện về vé</h4></td>
                            </tr>
                            <tr><td valign="top" class="name">Hoàn Vé</td><td valign="top">Không được phép</td></tr><tr><td valign="top" class="name">Đổi Tên Hành Khách</td><td valign="top">Được phép - Thu phí: 352,000 VND</td></tr><tr><td valign="top" class="name">Đổi Hành Trình</td><td valign="top">Được phép - Thu phí: 352.000 VND + Giá vé chênh lệch (nếu có). Đổi đồng hạng hoặc nâng hạng tương ứng của hành trình mới.</td></tr><tr><td valign="top" class="name">Đổi Ngày Giờ Chuyến Bay</td><td valign="top">Được phép - Thu phí: 352.000 VND + Giá vé chênh lệch (nếu có).</td></tr><tr><td valign="top" class="name">Bảo lưu</td><td valign="top">Không được phép</td></tr><tr><td valign="top" class="name">Thời hạn thay đổi (bao gồm thay đổi tên, ngày/chuyến bay)</td><td valign="top">Trước giờ khởi hành 12 tiếng.</td></tr>
                            <tr style="display:none;" class="title">
                                <td colspan="2">Điều kiện chung:</td>
                            </tr>
                            <tr style="display:none;">
                                <td colspan="2">{GeneralRule}</td>
                            </tr>
                            </tbody></table>
                    </td>
                </tr>';
}
echo $str;
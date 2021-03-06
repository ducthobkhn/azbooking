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
    $Type = $_POST['Type'];
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
    $Type = $_POST['Type'];
}

$data['RoundTrip'] = $RoundTrip;
$data['FromPlace'] = $FromPlace;
$data['TFromPlace'] = $TFromPlace;
$data['ToPlace'] = $ToPlace;
$data['TToPlace'] = $TToPlace;
$data['DepartDate'] = $DepartDate;
$data['ReturnDate'] = $ReturnDate;
$data['Adult'] = $Adult;
$data['Child'] = $Child;
$data['Infant'] = $Infant;
$data['Type'] = $Type;

$soapUrl = "http://azbooking.apivemaybay.net/AirlineTicket.asmx"; // asmx URL of WSDL
$soapUser = "azbooking";  //  username
$soapPassword = "7Q@9)nAZ}x%lp?^"; // password

// xml post structure
if ($RoundTrip == 'true') {
    if ($Type == 'Domestic') {
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
    } else {
        $xml_post_string = "<x:Envelope xmlns:x=\"http://schemas.xmlsoap.org/soap/envelope/\" xmlns:tem=\"http://tempuri.org/\" >
        <x:Header/>
        <x:Body>
        <tem:InternationalResult>
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
            </tem:InternationalResult>
          </x:Body>
        </x:Envelope>";
    }

} else {
    if ($Type == 'Domestic') {
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
    } else {
        $xml_post_string = "<x:Envelope xmlns:x=\"http://schemas.xmlsoap.org/soap/envelope/\" xmlns:tem=\"http://tempuri.org/\" >
        <x:Header/>
        <x:Body>
        <tem:InternationalResult>
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
            </tem:InternationalResult>
          </x:Body>
        </x:Envelope>";
    }
}
if ($Type == 'Domestic') {
    $headers = array(
        "Content-type: text/xml;charset=\"utf-8\"",
        "SOAPAction:  http://tempuri.org/DomesticResult",
    );
}else{
    $headers = array(
        "Content-type: text/xml;charset=\"utf-8\"",
        "SOAPAction:  http://tempuri.org/InternationalResult",
    );
}


$url = $soapUrl;
//// PHP cURL  for https connection with auth
$ch = curl_init();
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//curl_setopt($ch, CURLOPT_USERPWD, $soapUser . ":" . $soapPassword); // username and password - declared at the top of the doc
curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
curl_setopt($ch, CURLOPT_TIMEOUT, 50);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $xml_post_string); // the SOAP request
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$response = curl_exec($ch);
curl_close($ch);            // Dữ liệu trả về là kiểu stdClass Object

if ($Type == 'Domestic') {
    $start = (strpos($response, '<DomesticResultResult>'));
    $end = (strpos($response, '</DomesticResultResult>'));
    $responseData = substr($response, $start + 22, $end - $start - 22);
}else{
    $start = (strpos($response, '<InternationalResultResult>'));
    $end = (strpos($response, '</InternationalResultResult>'));
    $responseData = substr($response, $start + 27, $end - $start - 27);
}

$pattern = "/<p[^>]*><\\/p[^>]*>/";
//$pattern = "/<[^\/>]*>([\s]?)*<\/[^>]*>/";  use this pattern to remove any empty tag
$resonseArray = (json_decode($responseData));
$arrayDepart = array();
$arrayReturn = array();
if ($Type == 'Domestic') {
    if (count($resonseArray) > 0) {
        foreach ($resonseArray as $item) {
            $RelatedFlights = ($item->RelatedFlights)[0];
            if ($RelatedFlights->Class == 'Eco') {
                if ($item->AirlineCode == 'VJ') {
                    $item->Img_hang = 'VietJetAir.png';
                } else {
                    if ($item->AirlineCode == 'BL' || $item->AirlineCode == 'JQ') {
                        $item->Img_hang = 'jetstar.png';
                    } else {
                        $item->Img_hang = 'VietnamAirlines.png';
                    }
                }
                if ($RelatedFlights->StartPoint == $FromPlace) {
                    $item->departDate = date("Y-m-d", strtotime(str_replace("/", "-", $_POST['DepartDate'])));
                    $item->fromPlace = $TFromPlace;
                    $item->toPlace = $TToPlace;
                    array_push($arrayDepart, $item);
                } else {
                    $item->fromPlace = $TFromPlace;
                    $item->toPlace = $TToPlace;
                    $item->departDate = date("Y-m-d", strtotime(str_replace("/", "-", $_POST['ReturnDate'])));
                    $item->returnDate = date("Y-m-d", strtotime(str_replace("/", "-", $_POST['DepartDate'])));
                    array_push($arrayReturn, $item);
                }
            }

        }
    }
    $str = '';
    foreach ($arrayDepart as $item) {
        $str .= ' <tr class="i-result">
                    <td class="logo-air"><img src="' . SITE_NAME . '/view/default/theme/images/' . $item->Img_hang . '" alt="" /><p>' . $item->FlightNumber . '</p></td>
                    <td class="den-di"><p>' . date("H:i", substr($item->StartDate, stripos($item->StartDate, 'Date(') + 5, 10)) . '<span>' . $item->fromPlace . '</span></p></td>
                    <td class="thoi-gian"><span><?php echo $gio.":".$phut ?></span></td>
                    <td class="den-di"><p>' . date("H:i", substr($item->EndDate, stripos($item->EndDate, 'Date(') + 5, 10)) . '<span>' . $item->toPlace . '</span></p></td>
                    <td class="gia"><p>' . number_format($item->PriceAdult) . ' <sup>vnđ</sup></p><div class="TicketPrice" style="display: none; ">' . $item->PriceAdult . '</div></td>
                    <td class="check-ve">
                        <input type="radio" class="check-ve-radio" id="air-' . $item->FlightNumber . '" name="Block' . $RoundTrip . '" value="' . $item->FlightNumber . '" recec="0" />
                        <label for="air-' . $item->FlightNumber . '"><span></span>&nbsp</label>
                    </td>
                    <td class="chi-tiet" attr="close"><a class="icon-detail" style="cursor:pointer">Xem chi tiết</a></td>
                </tr>
                <tr style="" class="flight-info-detail">
                    <td class="flight-detail-content" colspan="8">
                        <table width="100%" cellspacing="0" cellpadding="0">
                            <tbody class="view-detail-flight">
                            <tr>
                                <td valign="top">
                                    <h4>Chuyến bay</h4>
                                    <p><span>' . $item->AirlineCode . '</span></p>
                                    <p><span>' . $item->FlightNumber . '</b></span></p>
                                    <p>Loại vé: <span>' . $item->FareClass . '</span></p>
                                </td>
                                <td valign="top">
                                    <h4>Khởi hành</h4>
                                    <p>Từ <span class="color-blue">' . $item->fromPlace . ', </span>Việt Nam</p>
                                    <p>Sân bay: <span>' . $FromPlace . '</span></p>
                                    <p>Thời gian: <span class="color-blue">' . date("H:i", substr($item->StartDate, stripos($item->StartDate, 'Date(') + 5, 10)) . '</span>, ' . date("d/m/Y", substr($item->StartDate, stripos($item->StartDate, 'Date(') + 5, 10)) . '</p>
                                </td>
                                <td valign="top">
                                    <h4>Điểm đến</h4>
                                    <p>Tới <span class="color-blue">' . $item->toPlace . ', </span>Việt Nam</p>
                                    <p>Sân bay: <span>' . $ToPlace . '</span></p>
                                    <p>Thời gian: <span class="color-blue">' . date("H:i", substr($item->EndDate, stripos($item->EndDate, 'Date(') + 5, 10)) . '</span>, ' . date("d/m/Y", substr($item->EndDate, stripos($item->EndDate, 'Date(') + 5, 10)) . '</p>
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
                        
                                    <tr>
                                        <td align="center" class="pax">Người lớn</td>
                                        <td align="center" class="pax">' . $Adult . '</td>
                                        <td align="center" class="pax pb-price">' . number_format($Adult * ($item->PriceAdult)) . ' VNĐ</td>
                                        <td align="center" class="pax pb-price">' . number_format(0) . ' VNĐ</td>
                                        <td align="center" style="display:none;" class="pax pb-price">0 VNĐ</td>
                                        <td align="center" class="pax pb-price">' . number_format($Adult * ($item->PriceAdult)) . '</td>
                                    </tr>
                             
                                <tr class="total-b">
                                    <td align="right" class="footer" colspan="3"></td>
                                    <td align="right" class="footer">
                                        <p>Tổng cộng </p></td>
                                    <td align="center" class="footer pb-price" colspan="2">
                                        <p><?php echo $price_total1 + $price_total2 + $price_total3; ?> VNĐ</p>
                                    </td>
                                </tr>
                        
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

    $str1 = '';
    foreach ($arrayReturn as $item) {
        $str1 .= ' <tr class="i-result">
                    <td class="logo-air"><img src="' . SITE_NAME . '/view/default/theme/images/' . $item->Img_hang . '" alt="" /><p>' . $item->FlightNumber . '</p></td>
                    <td class="den-di"><p>' . date("H:i", substr($item->StartDate, stripos($item->StartDate, 'Date(') + 5, 10)) . '<span>' . $item->fromPlace . '</span></p></td>
                    <td class="thoi-gian"><span><?php echo $gio.":".$phut ?></span></td>
                    <td class="den-di"><p>' . date("H:i", substr($item->EndDate, stripos($item->EndDate, 'Date(') + 5, 10)) . '<span>' . $item->toPlace . '</span></p></td>
                    <td class="gia"><p>' . number_format($item->PriceAdult) . ' <sup>vnđ</sup></p><div class="TicketPrice" style="display: none; ">' . $item->PriceAdult . '</div></td>
                    <td class="check-ve">
                        <input type="radio" class="check-ve-radio" id="air-' . $item->FlightNumber . '" name="Block' . $RoundTrip . '" value="' . $item->FlightNumber . '" recec="0" />
                        <label for="air-' . $item->FlightNumber . '"><span></span>&nbsp</label>
                    </td>
                    <td class="chi-tiet" attr="close"><a class="icon-detail" style="cursor:pointer">Xem chi tiết</a></td>
                </tr>
                <tr style="" class="flight-info-detail">
                    <td class="flight-detail-content" colspan="8">
                        <table width="100%" cellspacing="0" cellpadding="0">
                            <tbody class="view-detail-flight">
                            <tr>
                                <td valign="top">
                                    <h4>Chuyến bay</h4>
                                    <p><span>' . $item->AirlineCode . '</span></p>
                                    <p><span>' . $item->FlightNumber . '</b></span></p>
                                    <p>Loại vé: <span>' . $item->FareClass . '</span></p>
                                </td>
                                <td valign="top">
                                    <h4>Khởi hành</h4>
                                    <p>Từ <span class="color-blue">' . $item->fromPlace . ', </span>Việt Nam</p>
                                    <p>Sân bay: <span>' . $FromPlace . '</span></p>
                                    <p>Thời gian: <span class="color-blue">' . date("H:i", substr($item->StartDate, stripos($item->StartDate, 'Date(') + 5, 10)) . '</span>, ' . date("d/m/Y", substr($item->StartDate, stripos($item->StartDate, 'Date(') + 5, 10)) . '</p>
                                </td>
                                <td valign="top">
                                    <h4>Điểm đến</h4>
                                    <p>Tới <span class="color-blue">' . $item->toPlace . ', </span>Việt Nam</p>
                                    <p>Sân bay: <span>' . $ToPlace . '</span></p>
                                    <p>Thời gian: <span class="color-blue">' . date("H:i", substr($item->EndDate, stripos($item->EndDate, 'Date(') + 5, 10)) . '</span>, ' . date("d/m/Y", substr($item->EndDate, stripos($item->EndDate, 'Date(') + 5, 10)) . '</p>
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
                        
                                    <tr>
                                        <td align="center" class="pax">Người lớn</td>
                                        <td align="center" class="pax">' . $Adult . '</td>
                                        <td align="center" class="pax pb-price">' . number_format($Adult * ($item->PriceAdult)) . ' VNĐ</td>
                                        <td align="center" class="pax pb-price">' . number_format(0) . ' VNĐ</td>
                                        <td align="center" style="display:none;" class="pax pb-price">0 VNĐ</td>
                                        <td align="center" class="pax pb-price">' . number_format($Adult * ($item->PriceAdult)) . '</td>
                                    </tr>
                             
                                <tr class="total-b">
                                    <td align="right" class="footer" colspan="3"></td>
                                    <td align="right" class="footer">
                                        <p>Tổng cộng </p></td>
                                    <td align="center" class="footer pb-price" colspan="2">
                                        <p><?php echo $price_total1 + $price_total2 + $price_total3; ?> VNĐ</p>
                                    </td>
                                </tr>
                        
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

    $array = array('depart' => $str, 'return' => $str1);
    print_r($array);
}else{
    $array_internation=array();
    foreach ($resonseArray as $item){
        $ItineraryFlights = ($item->ItineraryFlights)[0];
//        if($ItineraryFlights->AirlineCode=="VJ" || $ItineraryFlights->AirlineCode=="BL" || $ItineraryFlights->AirlineCode=="JQ"||$ItineraryFlights->AirlineCode=="VN"){
//            if ($ItineraryFlights->AirlineCode == 'VJ') {
//                $item->Img_hang = 'VietJetAir.png';
//            } else {
//                if ($ItineraryFlights->AirlineCode == 'BL' || $ItineraryFlights->AirlineCode == 'JQ') {
//                    $item->Img_hang = 'jetstar.png';
//                } else {
//                    $item->Img_hang = 'VietnamAirlines.png';
//                }
//            }
//
//        }

        if($ItineraryFlights->StopNum===0 || $ItineraryFlights->StopNum==1){
            $RelatedItineraryFlights= $ItineraryFlights->RelatedItineraryFlights[0];
            $str.='<tr class="i-result">
                    <td><span>' . $RelatedItineraryFlights->AirlineCode . '</span></td>
                    <td class="den-di"><p>' . date("H:i", substr($RelatedItineraryFlights->StartDate, stripos($RelatedItineraryFlights->StartDate, 'Date(') + 5, 10)) . '<span>' . $RelatedItineraryFlights->StartPoint . '</span></p></td>                              
                    <td class="gia"><p>' . number_format($item->FareAdult) . ' <sup>vnđ</sup></p></td>';
                    if($ItineraryFlights->StopNum===0 ){
                        $str.=' <td>Bay thẳng</td>';
                    }else{
                        $str.=' <td>1 điểm dừng</td>';
                    }
                      $str.=' <td class="check-ve">
                            <input type="radio" class="check-ve-radio" id="air-VJ123" name="Blocktrue" value="VJ123" recec="0">
                            <label for="air-VJ123"><span></span>&nbsp;</label>
                        </td>
                        <td class="chi-tiet " attr="close"><a class="icon-detail" style="cursor:pointer">Xem chi tiết</a></td>
                    </tr>';
            if($ItineraryFlights->StopNum==0){
                $RelatedItineraryFlights= $ItineraryFlights->RelatedItineraryFlights[0];
                $str.='<tr style="" class="flight-info-detail">
                    <td class="flight-detail-content" colspan="8">
                       
                        <table width="100%" class="price-break">
                            <tbody>
                            <tr class="title-b">
                                <td class="den-di"><p>Thời gian từ :' . date("H:i d/m/Y", substr($RelatedItineraryFlights->StartDate, stripos($RelatedItineraryFlights->StartDate, 'Date(') + 5, 10)) . '<span> ' . $RelatedItineraryFlights->StartPoint . '</span></p></td>
                                <td class="den-di"><p>Thời gian đến :' . date("H:i d/m/Y", substr($RelatedItineraryFlights->EndDate, stripos($RelatedItineraryFlights->EndDate, 'Date(') + 5, 10)) . '<span> ' . $RelatedItineraryFlights->EndPoint . '</span></p></td>
                                <td><span>' . $RelatedItineraryFlights->AirlineCode . '</span> <p><span>' . $RelatedItineraryFlights->FlightNumber . '</b></span></p></td>                              
                            </tr>                                                                
                        </table>
                       
                       
                    </td>
                </tr>';
            }else{
                $RelatedItineraryFlights= $ItineraryFlights->RelatedItineraryFlights[0];
                $RelatedItineraryFlights1= $ItineraryFlights->RelatedItineraryFlights[1];
                $str.='<tr style="" class="flight-info-detail">
                    <td class="flight-detail-content" colspan="8">
                       
                        <table width="100%" class="price-break">
                            <tbody>
                            <td class="title-b">
                                <td class="den-di"><p>Thời gian từ : ' . date("H:i d/m/Y", substr($RelatedItineraryFlights->StartDate, stripos($RelatedItineraryFlights->StartDate, 'Date(') + 5, 10)) . '<span> ' . $RelatedItineraryFlights->StartPoint . '</span></p></td>
                                <td class="den-di"><p>Thời gian đến : ' . date("H:i d/m/Y", substr($RelatedItineraryFlights->EndDate, stripos($RelatedItineraryFlights->EndDate, 'Date(') + 5, 10)) . '<span> ' . $RelatedItineraryFlights->EndPoint . '</span></p></td>
                               <td><span>' . $RelatedItineraryFlights->AirlineCode . '</span> <p><span>' . $RelatedItineraryFlights->FlightNumber . '</b></span></p></td>                             
                            </tr>                                                                
                        </table>
                        <table width="100%" class="price-break">
                            <tbody>
                            <tr class="title-b">
                                <td class="den-di"><p>Thời gian từ :' . date("H:i d/m/Y", substr($RelatedItineraryFlights1->StartDate, stripos($RelatedItineraryFlights1->StartDate, 'Date(') + 5, 10)) . '<span> ' . $RelatedItineraryFlights1->StartPoint . '</span></p></td>
                                <td class="den-di"><p>Thời gian đến :' . date("H:i d/m/Y", substr($RelatedItineraryFlights1->EndDate, stripos($RelatedItineraryFlights1->EndDate, 'Date(') + 5, 10)) . '<span> ' . $RelatedItineraryFlights1->EndPoint . '</span></p></td>
                               <td><span>' . $RelatedItineraryFlights1->AirlineCode . '</span> <p><span>' . $RelatedItineraryFlights1->FlightNumber . '</b></span></p></td>                              
                            </tr>                                                                
                        </table>
                       
                    </td>
                </tr>';
            }


        }
    }


    $array = array('depart' => $str, 'return' => '');
    print_r($array);

}

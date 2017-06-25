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
    $DepartDate = date("Y-m-d", strtotime(str_replace("/", "-", $_POST['DepartDate']))).'T00:00:00';
    $ReturnDate = ($_POST['ReturnDate'] && $_POST['ReturnDate'] != "") ? date("Y-m-d", strtotime(str_replace("/", "-", $_POST['ReturnDate']))).'T00:00:00' : "";
    $Adult = $_POST['adult'];
    $Child = $_POST['child'];
    $Infant = $_POST['infant'];
} else {
    $RoundTrip = "false";
    $FromPlace = $_POST['FromPlace'];
    $TFromPlace = $_POST['TFromPlace'];
    $ToPlace = $_POST['ToPlace'];
    $TToPlace = $_POST['TToPlace'];
    $DepartDate = date("Y-m-d", strtotime(str_replace("/", "-", $_POST['DepartDate']))).'T00:00:00';
    $ReturnDate = '';
    $Adult = $_POST['adult'];
    $Child = $_POST['child'];
    $Infant = $_POST['infant'];
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
curl_setopt($ch, CURLOPT_TIMEOUT, 10);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $xml_post_string); // the SOAP request
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

// converting
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

$data['arrayDepart']=$arrayDepart;
$data['arrayReturn']=$arrayReturn;

show_header('', '', '');
show_menu($data, 'trangchu');
show_timkiemchuyenbay($data);
show_footer($data, 'trangchu');

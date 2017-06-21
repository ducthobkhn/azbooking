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
    $DepartDate = date("Y-m-d", strtotime(str_replace("/", "-", $_POST['DepartDate'])));
    $ReturnDate = ($_POST['ReturnDate'] && $_POST['ReturnDate'] != "") ? date("Y-m-d", strtotime(str_replace("/", "-", $_POST['ReturnDate']))) : "";
    $Adult = $_POST['adult'];
    $Child = $_POST['child'];
    $Infant = $_POST['infant'];
} else {
    $RoundTrip = "false";
    $FromPlace = $_POST['FromPlace'];
    $TFromPlace = $_POST['TFromPlace'];
    $ToPlace = $_POST['ToPlace'];
    $TToPlace = $_POST['TToPlace'];
    $DepartDate = date("Y-m-d", strtotime(str_replace("/", "-", $_POST['DepartDate'])));
    $ReturnDate = '';
    $Adult = $_POST['adult'];
    $Child = $_POST['child'];
    $Infant = $_POST['infant'];
}

//print_r($RoundTrip);
//print_r($FromPlace);
//print_r($ToPlace);
//print_r($DepartDate);
//print_r($ReturnDate);

$soapUrl = "http://azbooking.apivemaybay.net/AirlineTicket.asmx"; // asmx URL of WSDL
$soapUser = "azbooking";  //  username
$soapPassword = "7Q@9)nAZ}x%lp?^"; // password

// xml post structure

$xml_post_string = "<x:Envelope xmlns:x=\"http://schemas.xmlsoap.org/soap/envelope/\" xmlns:tem=\"http://tempuri.org/\" >
<x:Header/>
<x:Body>
<tem:DomesticResult>
      <tem:startPoint>SGN</tem:startPoint>
      <tem:endPoint>TBB</tem:endPoint>
      <tem:departureDate>2017-07-03T00:00:00</tem:departureDate>
      <tem:returnDate>2017-07-05T00:00:00</tem:returnDate>
      <tem:adults>1</tem:adults>
      <tem:children>0</tem:children>
      <tem:infants>0</tem:infants>
      <tem:ReturnFlight>true</tem:ReturnFlight>
      <tem:authentication>
        <tem:HeaderUser>azbooking</tem:HeaderUser>
        <tem:HeaderPassword>7Q@9)nAZ}x%lp?^</tem:HeaderPassword>
      </tem:authentication>
    </tem:DomesticResult>
  </x:Body>
</x:Envelope>";

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
curl_close($ch);

print_r(($response));
exit;
show_header('', '', '');
show_menu($data, 'trangchu');
show_index($data);
show_footer($data, 'trangchu');

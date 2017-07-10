<?php
/**
 * Created by PhpStorm.
 * User: Duc Tho
 * Date: 7/9/2017
 * Time: 11:32 PM
 */

//$soapUrl = "http://azbooking.apivemaybay.net/AirlineTicket.asmx"; // asmx URL of WSDL
//$soapUser = "azbooking";  //  username
//$soapPassword = "7Q@9)nAZ}x%lp?^"; // password

// xml post structure
//if($RoundTrip=='true'){
//    $xml_post_string = "<x:Envelope xmlns:x=\"http://schemas.xmlsoap.org/soap/envelope/\" xmlns:tem=\"http://tempuri.org/\" >
//<x:Header/>
//<x:Body>
//<tem:DomesticResult>
//      <tem:startPoint>$FromPlace</tem:startPoint>
//      <tem:endPoint>$ToPlace</tem:endPoint>
//      <tem:departureDate>$DepartDate</tem:departureDate>
//      <tem:returnDate>$ReturnDate</tem:returnDate>
//      <tem:adults>$Adult</tem:adults>
//      <tem:children>$Child</tem:children>
//      <tem:infants>$Infant</tem:infants>
//
//      <tem:authentication>
//        <tem:HeaderUser>azbooking</tem:HeaderUser>
//        <tem:HeaderPassword>7Q@9)nAZ}x%lp?^</tem:HeaderPassword>
//      </tem:authentication>
//    </tem:DomesticResult>
//  </x:Body>
//</x:Envelope>";
//}else{
//    $xml_post_string = "<x:Envelope xmlns:x=\"http://schemas.xmlsoap.org/soap/envelope/\" xmlns:tem=\"http://tempuri.org/\" >
//<x:Header/>
//<x:Body>
//<tem:DomesticResult>
//      <tem:startPoint>$FromPlace</tem:startPoint>
//      <tem:endPoint>$ToPlace</tem:endPoint>
//      <tem:departureDate>$DepartDate</tem:departureDate>
//      <tem:adults>$Adult</tem:adults>
//      <tem:children>$Child</tem:children>
//      <tem:infants>$Infant</tem:infants>
//      <tem:authentication>
//        <tem:HeaderUser>azbooking</tem:HeaderUser>
//        <tem:HeaderPassword>7Q@9)nAZ}x%lp?^</tem:HeaderPassword>
//      </tem:authentication>
//    </tem:DomesticResult>
//  </x:Body>
//</x:Envelope>";
//}
//
//
//$headers = array(
//    "Content-type: text/xml;charset=\"utf-8\"",
//    "SOAPAction:  http://tempuri.org/DomesticResult",
//); //SOAPAction: your op URL
//
//$url = $soapUrl;

// PHP cURL  for https connection with auth
//$ch = curl_init();
//curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);
//curl_setopt($ch, CURLOPT_URL, $url);
//curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
////curl_setopt($ch, CURLOPT_USERPWD, $soapUser . ":" . $soapPassword); // username and password - declared at the top of the doc
//curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
//curl_setopt($ch, CURLOPT_TIMEOUT, 30);
//curl_setopt($ch, CURLOPT_POST, true);
//curl_setopt($ch, CURLOPT_POSTFIELDS, $xml_post_string); // the SOAP request
//curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
//
//$response = curl_exec($ch);
//curl_close($ch);			// Dữ liệu trả về là kiểu stdClass Object
//
//$start= (strpos($response,'<DomesticResultResult>'));
//$end= (strpos($response,'</DomesticResultResult>'));
//$responseData = substr($response,$start+22,$end-$start-22);
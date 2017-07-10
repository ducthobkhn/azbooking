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

$FromNamePlace = '';
$FromCountryName = '';
$FromCountryCode = '';
$ToNamePlace = '';
$ToCountryName = '';
$ToCountryCode = '';
$dk = "cityCode='" . $_POST['FromPlace'] . "'";

$codeFrom = airports_getByTop2('',$dk,'');
foreach($codeFrom as $sanBay) {
    $FromNamePlace = $sanBay->name;
    $FromCountryName = $sanBay->countryName;
    $FromCountryCode = $sanBay->countryCode;
}

$dk="cityCode='".$_POST['ToPlace']."'";
$codeTo = airports_getByTop2('',$dk,'');
foreach($codeTo as $sanBay) {
    $ToNamePlace = $sanBay->name;
    $ToCountryName = $sanBay->countryName;
    $ToCountryCode = $sanBay->countryCode;
}

if (isset($_POST['RoundTrip']) && $_POST['RoundTrip'] == 'true') {
    $RoundTrip = "true";
    $FromPlace = $_POST['FromPlace'];
    $TFromPlace = $_POST['TFromPlace'];
    $ToPlace = $_POST['ToPlace'];
    $TToPlace = $_POST['TToPlace'];
    $DepartDate = date("Y-m-d", strtotime(str_replace("/", "-", $_POST['DepartDate']))) . 'T00:00:00';
    $ReturnDate = ($_POST['ReturnDate'] && $_POST['ReturnDate'] != "") ? date("Y-m-d", strtotime(str_replace("/", "-", $_POST['ReturnDate']))) . 'T00:00:00' : "";
    $Adult = $_POST['adult'];
    $Child = $_POST['child'];
    $Infant = $_POST['infant'];
} else {
    $RoundTrip = "false";
    $FromPlace = $_POST['FromPlace'];
    $TFromPlace = $_POST['TFromPlace'];
    $ToPlace = $_POST['ToPlace'];
    $TToPlace = $_POST['TToPlace'];
    $DepartDate = date("Y-m-d", strtotime(str_replace("/", "-", $_POST['DepartDate']))) . 'T00:00:00';
    $ReturnDate = '';
    $Adult = $_POST['adult'];
    $Child = $_POST['child'];
    $Infant = $_POST['infant'];
}
if(($FromCountryCode==$ToCountryCode)&&($FromCountryCode=='VN')){
    $data['Type']='Domestic';
}else{
    $data['Type']='International';
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
$data["FromNamePlace"] = $FromNamePlace;
$data["FromCountryName"] = $FromCountryName;
$data["FromCountryCode"] = $FromCountryCode;
$data["ToNamePlace"] = $ToNamePlace;
$data["ToCountryName"] = $ToCountryName;
$data["ToCountryCode"] = $ToCountryCode;

show_header('', '', '');
show_menu($data, 'trangchu');
show_timkiemchuyenbay($data);
show_footer($data, 'trangchu');

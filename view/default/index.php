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

    print_r(json_decode($data['response']));
    exit;
//    foreach ($list as $item){
//        print_r($item);
//        exit;
//    }
    print_template($asign, 'index');
}
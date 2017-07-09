<?php
require_once DIR . '/view/default/public.php';
require_once DIR . '/common/locdautiengviet.php';
function view_menu($data = array())
{
    $asign = array();
    $asign['logo'] = $data['config'][0]->Logo;
    print_template($asign, 'menu');
}
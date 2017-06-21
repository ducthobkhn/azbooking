<?php
require_once DIR . '/view/default/public.php';
require_once DIR . '/common/locdautiengviet.php';
function view_menu($data = array())
{
    $asign = array();

    print_template($asign, 'menu');
}
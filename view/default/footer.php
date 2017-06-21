<?php
require_once DIR.'/view/default/public.php';
function view_footer($data=array())
{
    $asign=array();
    print_template($asign,'footer');
}

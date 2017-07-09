<?php
require_once DIR.'/model/gioithieu.php';
require_once DIR.'/model/sqlconnection.php';
//
function gioithieu_Get($command)
{
            $array_result=array();
    $key=md5($command);
    if(CACHE)
    {
        $mycache=ConnectCache();
        $cachecommand=$mycache->get($key);
        if($cachecommand)
        {
            $array_result=$cachecommand;
        }
        else
        {
          $result=mysqli_query(ConnectSql(),$command);
            if($result!=false)while($row=mysqli_fetch_array($result))
            {
                $new_obj=new gioithieu($row);
                $new_obj->decode();
                array_push($array_result,$new_obj);
            }
            $mycache->set($key,$array_result);
            saveCacheGroup($mycache,$key,'gioithieu');
        }
    }
    else
    {
       $result=mysqli_query(ConnectSql(),$command);
       if($result!=false)while($row=mysqli_fetch_array($result))
        {
            $new_obj=new gioithieu($row);
            $new_obj->decode();
            array_push($array_result,$new_obj);
        }
    }
    return $array_result;
}
//
function gioithieu_getById($Id)
{
    return gioithieu_Get('select * from gioithieu where Id='.$Id);
}
//
function gioithieu_getByAll()
{
    return gioithieu_Get('select * from gioithieu');
}
//
function gioithieu_getByTop($top,$where,$order)
{
    return gioithieu_Get("select * from gioithieu ".(($where!='')?(' where '.$where):'').(($order!='')?" Order By ".$order:'').(($top!='')?' limit '.$top:''));
}
//
function gioithieu_getByPaging($CurrentPage, $PageSize,$Order,$where)
{
   return gioithieu_Get("SELECT * FROM  gioithieu ".(($where!='')?(' where '.$where):'')." Order By ".$Order." Limit ".(($CurrentPage-1)*$PageSize)." , ".$PageSize);
}
//
function gioithieu_getByPagingReplace($CurrentPage, $PageSize,$Order,$where)
{
   return gioithieu_Get("SELECT gioithieu.Id, gioithieu.Name, gioithieu.Img, gioithieu.GioiThieu, gioithieu.UuViet, gioithieu.CacDichVu, gioithieu.CamKet, gioithieu.LienHe FROM  gioithieu ".(($where!='')?(' where '.$where):'')." Order By ".$Order." Limit ".(($CurrentPage-1)*$PageSize)." , ".$PageSize);
}
//
function gioithieu_insert($obj)
{
    return exe_query("insert into gioithieu (Name,Img,GioiThieu,UuViet,CacDichVu,CamKet,LienHe) values ('$obj->Name','$obj->Img','$obj->GioiThieu','$obj->UuViet','$obj->CacDichVu','$obj->CamKet','$obj->LienHe')",'gioithieu');
}
//
function gioithieu_update($obj)
{
    return exe_query("update gioithieu set Name='$obj->Name',Img='$obj->Img',GioiThieu='$obj->GioiThieu',UuViet='$obj->UuViet',CacDichVu='$obj->CacDichVu',CamKet='$obj->CamKet',LienHe='$obj->LienHe' where Id=$obj->Id",'gioithieu');
}
//
function gioithieu_delete($obj)
{
    return exe_query('delete from gioithieu where Id='.$obj->Id,'gioithieu');
}
//
function gioithieu_count($where)
{
    $result=mysqli_query(ConnectSql(),'select COUNT(Id) as count from gioithieu '.(($where!='')?'where '.$where:''));
    if($result!=false)
    {
         $row=mysqli_fetch_array($result);
         return $row['count'];
    }
   else return false;
}

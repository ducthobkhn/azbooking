<?php
require_once DIR.'/model/tinkhuyenmai.php';
require_once DIR.'/model/sqlconnection.php';
//
function tinkhuyenmai_Get($command)
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
                $new_obj=new tinkhuyenmai($row);
                $new_obj->decode();
                array_push($array_result,$new_obj);
            }
            $mycache->set($key,$array_result);
            saveCacheGroup($mycache,$key,'tinkhuyenmai');
        }
    }
    else
    {
       $result=mysqli_query(ConnectSql(),$command);
       if($result!=false)while($row=mysqli_fetch_array($result))
        {
            $new_obj=new tinkhuyenmai($row);
            $new_obj->decode();
            array_push($array_result,$new_obj);
        }
    }
    return $array_result;
}
//
function tinkhuyenmai_getById($Id)
{
    return tinkhuyenmai_Get('select * from tinkhuyenmai where Id='.$Id);
}
//
function tinkhuyenmai_getByAll()
{
    return tinkhuyenmai_Get('select * from tinkhuyenmai');
}
//
function tinkhuyenmai_getByTop($top,$where,$order)
{
    return tinkhuyenmai_Get("select * from tinkhuyenmai ".(($where!='')?(' where '.$where):'').(($order!='')?" Order By ".$order:'').(($top!='')?' limit '.$top:''));
}
//
function tinkhuyenmai_getByPaging($CurrentPage, $PageSize,$Order,$where)
{
   return tinkhuyenmai_Get("SELECT * FROM  tinkhuyenmai ".(($where!='')?(' where '.$where):'')." Order By ".$Order." Limit ".(($CurrentPage-1)*$PageSize)." , ".$PageSize);
}
//
function tinkhuyenmai_getByPagingReplace($CurrentPage, $PageSize,$Order,$where)
{
   return tinkhuyenmai_Get("SELECT tinkhuyenmai.Id, tinkhuyenmai.NoiBat, tinkhuyenmai.Name, tinkhuyenmai.Img, tinkhuyenmai.NoiDung, tinkhuyenmai.Title, tinkhuyenmai.Keyword, tinkhuyenmai.Description, tinkhuyenmai.Created FROM  tinkhuyenmai ".(($where!='')?(' where '.$where):'')." Order By ".$Order." Limit ".(($CurrentPage-1)*$PageSize)." , ".$PageSize);
}
//
function tinkhuyenmai_insert($obj)
{
    return exe_query("insert into tinkhuyenmai (NoiBat,Name,Img,NoiDung,Title,Keyword,Description,Created) values ('$obj->NoiBat','$obj->Name','$obj->Img','$obj->NoiDung','$obj->Title','$obj->Keyword','$obj->Description','$obj->Created')",'tinkhuyenmai');
}
//
function tinkhuyenmai_update($obj)
{
    return exe_query("update tinkhuyenmai set NoiBat='$obj->NoiBat',Name='$obj->Name',Img='$obj->Img',NoiDung='$obj->NoiDung',Title='$obj->Title',Keyword='$obj->Keyword',Description='$obj->Description',Created='$obj->Created' where Id=$obj->Id",'tinkhuyenmai');
}
//
function tinkhuyenmai_delete($obj)
{
    return exe_query('delete from tinkhuyenmai where Id='.$obj->Id,'tinkhuyenmai');
}
//
function tinkhuyenmai_count($where)
{
    $result=mysqli_query(ConnectSql(),'select COUNT(Id) as count from tinkhuyenmai '.(($where!='')?'where '.$where:''));
    if($result!=false)
    {
         $row=mysqli_fetch_array($result);
         return $row['count'];
    }
   else return false;
}

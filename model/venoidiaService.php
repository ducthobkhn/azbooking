<?php
require_once DIR.'/model/venoidia.php';
require_once DIR.'/model/sqlconnection.php';
//
function venoidia_Get($command)
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
                $new_obj=new venoidia($row);
                $new_obj->decode();
                array_push($array_result,$new_obj);
            }
            $mycache->set($key,$array_result);
            saveCacheGroup($mycache,$key,'venoidia');
        }
    }
    else
    {
       $result=mysqli_query(ConnectSql(),$command);
       if($result!=false)while($row=mysqli_fetch_array($result))
        {
            $new_obj=new venoidia($row);
            $new_obj->decode();
            array_push($array_result,$new_obj);
        }
    }
    return $array_result;
}
//
function venoidia_getById($Id)
{
    return venoidia_Get('select * from venoidia where Id='.$Id);
}
//
function venoidia_getByAll()
{
    return venoidia_Get('select * from venoidia');
}
//
function venoidia_getByTop($top,$where,$order)
{
    return venoidia_Get("select * from venoidia ".(($where!='')?(' where '.$where):'').(($order!='')?" Order By ".$order:'').(($top!='')?' limit '.$top:''));
}
//
function venoidia_getByPaging($CurrentPage, $PageSize,$Order,$where)
{
   return venoidia_Get("SELECT * FROM  venoidia ".(($where!='')?(' where '.$where):'')." Order By ".$Order." Limit ".(($CurrentPage-1)*$PageSize)." , ".$PageSize);
}
//
function venoidia_getByPagingReplace($CurrentPage, $PageSize,$Order,$where)
{
   return venoidia_Get("SELECT venoidia.Id, loaive.Name as DanhMucId, venoidia.Name, venoidia.MaChuyenBay, venoidia.DiemDi, venoidia.DiemDen, venoidia.NgayDi, venoidia.Gia, venoidia.Img, venoidia.Img_hang, venoidia.NoiDung, venoidia.Title, venoidia.Keyword, venoidia.Description, venoidia.Created FROM  venoidia, loaive where loaive.Id=venoidia.DanhMucId  ".(($where!='')?(' and '.$where):'')." Order By ".$Order." Limit ".(($CurrentPage-1)*$PageSize)." , ".$PageSize);
}
//
function venoidia_insert($obj)
{
    return exe_query("insert into venoidia (DanhMucId,Name,MaChuyenBay,DiemDi,DiemDen,NgayDi,Gia,Img,Img_hang,NoiDung,Title,Keyword,Description,Created) values ('$obj->DanhMucId','$obj->Name','$obj->MaChuyenBay','$obj->DiemDi','$obj->DiemDen','$obj->NgayDi','$obj->Gia','$obj->Img','$obj->Img_hang','$obj->NoiDung','$obj->Title','$obj->Keyword','$obj->Description','$obj->Created')",'venoidia');
}
//
function venoidia_update($obj)
{
    return exe_query("update venoidia set DanhMucId='$obj->DanhMucId',Name='$obj->Name',MaChuyenBay='$obj->MaChuyenBay',DiemDi='$obj->DiemDi',DiemDen='$obj->DiemDen',NgayDi='$obj->NgayDi',Gia='$obj->Gia',Img='$obj->Img',Img_hang='$obj->Img_hang',NoiDung='$obj->NoiDung',Title='$obj->Title',Keyword='$obj->Keyword',Description='$obj->Description',Created='$obj->Created' where Id=$obj->Id",'venoidia');
}
//
function venoidia_delete($obj)
{
    return exe_query('delete from venoidia where Id='.$obj->Id,'venoidia');
}
//
function venoidia_count($where)
{
    $result=mysqli_query(ConnectSql(),'select COUNT(Id) as count from venoidia '.(($where!='')?'where '.$where:''));
    if($result!=false)
    {
         $row=mysqli_fetch_array($result);
         return $row['count'];
    }
   else return false;
}

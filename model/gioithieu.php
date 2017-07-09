<?php
class gioithieu
{
    public $Id,$Name,$Img,$GioiThieu,$UuViet,$CacDichVu,$CamKet,$LienHe;
    public function gioithieu($data=array())
    {
    $this->Id=isset($data['Id'])?$data['Id']:'';
    $this->Name=isset($data['Name'])?$data['Name']:'';
    $this->Img=isset($data['Img'])?$data['Img']:'';
    $this->GioiThieu=isset($data['GioiThieu'])?$data['GioiThieu']:'';
    $this->UuViet=isset($data['UuViet'])?$data['UuViet']:'';
    $this->CacDichVu=isset($data['CacDichVu'])?$data['CacDichVu']:'';
    $this->CamKet=isset($data['CamKet'])?$data['CamKet']:'';
    $this->LienHe=isset($data['LienHe'])?$data['LienHe']:'';
          $this->encode();
    }
    public function encode()
        {
            $this->Id=addslashes($this->Id);
            $this->Name=addslashes($this->Name);
            $this->Img=addslashes($this->Img);
            $this->GioiThieu=addslashes($this->GioiThieu);
            $this->UuViet=addslashes($this->UuViet);
            $this->CacDichVu=addslashes($this->CacDichVu);
            $this->CamKet=addslashes($this->CamKet);
            $this->LienHe=addslashes($this->LienHe);
        }
    public function decode()
        {
            $this->Id=stripslashes($this->Id);
            $this->Name=stripslashes($this->Name);
            $this->Img=stripslashes($this->Img);
            $this->GioiThieu=stripslashes($this->GioiThieu);
            $this->UuViet=stripslashes($this->UuViet);
            $this->CacDichVu=stripslashes($this->CacDichVu);
            $this->CamKet=stripslashes($this->CamKet);
            $this->LienHe=stripslashes($this->LienHe);
        }
}

<?php
class hotro
{
    public $Id,$DanhMucId,$LoaiHoTro,$Name,$Skype,$Phone;
    public function hotro($data=array())
    {
    $this->Id=isset($data['Id'])?$data['Id']:'';
    $this->DanhMucId=isset($data['DanhMucId'])?$data['DanhMucId']:'';
    $this->LoaiHoTro=isset($data['LoaiHoTro'])?$data['LoaiHoTro']:'';
    $this->Name=isset($data['Name'])?$data['Name']:'';
    $this->Skype=isset($data['Skype'])?$data['Skype']:'';
    $this->Phone=isset($data['Phone'])?$data['Phone']:'';
          $this->encode();
    }
    public function encode()
        {
            $this->Id=addslashes($this->Id);
            $this->DanhMucId=addslashes($this->DanhMucId);
            $this->LoaiHoTro=addslashes($this->LoaiHoTro);
            $this->Name=addslashes($this->Name);
            $this->Skype=addslashes($this->Skype);
            $this->Phone=addslashes($this->Phone);
        }
    public function decode()
        {
            $this->Id=stripslashes($this->Id);
            $this->DanhMucId=stripslashes($this->DanhMucId);
            $this->LoaiHoTro=stripslashes($this->LoaiHoTro);
            $this->Name=stripslashes($this->Name);
            $this->Skype=stripslashes($this->Skype);
            $this->Phone=stripslashes($this->Phone);
        }
}

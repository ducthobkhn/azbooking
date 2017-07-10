<?php
class tieuchi
{
    public $Id,$Name,$Img,$MoTaNgan;
    public function tieuchi($data=array())
    {
    $this->Id=isset($data['Id'])?$data['Id']:'';
    $this->Name=isset($data['Name'])?$data['Name']:'';
    $this->Img=isset($data['Img'])?$data['Img']:'';
    $this->MoTaNgan=isset($data['MoTaNgan'])?$data['MoTaNgan']:'';
          $this->encode();
    }
    public function encode()
        {
            $this->Id=addslashes($this->Id);
            $this->Name=addslashes($this->Name);
            $this->Img=addslashes($this->Img);
            $this->MoTaNgan=addslashes($this->MoTaNgan);
        }
    public function decode()
        {
            $this->Id=stripslashes($this->Id);
            $this->Name=stripslashes($this->Name);
            $this->Img=stripslashes($this->Img);
            $this->MoTaNgan=stripslashes($this->MoTaNgan);
        }
}

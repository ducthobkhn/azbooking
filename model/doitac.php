<?php
class doitac
{
    public $Id,$Name,$Img,$Link;
    public function doitac($data=array())
    {
    $this->Id=isset($data['Id'])?$data['Id']:'';
    $this->Name=isset($data['Name'])?$data['Name']:'';
    $this->Img=isset($data['Img'])?$data['Img']:'';
    $this->Link=isset($data['Link'])?$data['Link']:'';
          $this->encode();
    }
    public function encode()
        {
            $this->Id=addslashes($this->Id);
            $this->Name=addslashes($this->Name);
            $this->Img=addslashes($this->Img);
            $this->Link=addslashes($this->Link);
        }
    public function decode()
        {
            $this->Id=stripslashes($this->Id);
            $this->Name=stripslashes($this->Name);
            $this->Img=stripslashes($this->Img);
            $this->Link=stripslashes($this->Link);
        }
}

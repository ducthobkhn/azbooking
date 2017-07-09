<?php
class tinkhuyenmai
{
    public $Id,$NoiBat,$Name,$Img,$NoiDung,$Title,$Keyword,$Description,$Created;
    public function tinkhuyenmai($data=array())
    {
    $this->Id=isset($data['Id'])?$data['Id']:'';
    $this->NoiBat=isset($data['NoiBat'])?$data['NoiBat']:'';
    $this->Name=isset($data['Name'])?$data['Name']:'';
    $this->Img=isset($data['Img'])?$data['Img']:'';
    $this->NoiDung=isset($data['NoiDung'])?$data['NoiDung']:'';
    $this->Title=isset($data['Title'])?$data['Title']:'';
    $this->Keyword=isset($data['Keyword'])?$data['Keyword']:'';
    $this->Description=isset($data['Description'])?$data['Description']:'';
    $this->Created=isset($data['Created'])?$data['Created']:'';
          $this->encode();
    }
    public function encode()
        {
            $this->Id=addslashes($this->Id);
            $this->NoiBat=addslashes($this->NoiBat);
            $this->Name=addslashes($this->Name);
            $this->Img=addslashes($this->Img);
            $this->NoiDung=addslashes($this->NoiDung);
            $this->Title=addslashes($this->Title);
            $this->Keyword=addslashes($this->Keyword);
            $this->Description=addslashes($this->Description);
            $this->Created=addslashes($this->Created);
        }
    public function decode()
        {
            $this->Id=stripslashes($this->Id);
            $this->NoiBat=stripslashes($this->NoiBat);
            $this->Name=stripslashes($this->Name);
            $this->Img=stripslashes($this->Img);
            $this->NoiDung=stripslashes($this->NoiDung);
            $this->Title=stripslashes($this->Title);
            $this->Keyword=stripslashes($this->Keyword);
            $this->Description=stripslashes($this->Description);
            $this->Created=stripslashes($this->Created);
        }
}

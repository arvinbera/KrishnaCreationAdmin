<?php
namespace App\CoreFile;
class BaseResponse
{
    public $IsSuccess;
    public $Data;
    public $Message;
    public $Error;
    function __construct()
    {
    $this->IsSuccess=false;
    $this->Data=null;
    $this->Message="Invalid Model";
    $this->Error=null;
    }

}
?>
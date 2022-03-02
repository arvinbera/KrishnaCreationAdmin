<?php
 namespace App\CoreFile;

use Facade\FlareClient\Stacktrace\File;

class FileHelper
 {
     public static $UploadDir="uploads/";

     public static function UploadFile($temp,$name){
        $serverFile=FileHelper::$UploadDir.$name;
         move_uploaded_file($temp,$serverFile);
         return $serverFile;
     }

     public static function DoUpload($file){

        $temp=$file->getPathName();
        $fileName=md5(uniqid()).".".$file->extension();
        return FileHelper::UploadFile($temp,$fileName);

     }
     public static function DeleteFile($file)
     {
        $urlInfo = pathinfo($file);
				if (isset($urlInfo['filename']) && isset($urlInfo['extension'])) {
					$name=$urlInfo['filename'].'.'.$urlInfo['extension'];
					$file=FileHelper::$UploadDir.$name;
					if (is_file($file)){
					return unlink($file);
                }
                return true;
            }
     }
     public static function BindUrl($fileName){
         return UIHelper::BaseUrl()."/".$fileName;
     }
 }
?>
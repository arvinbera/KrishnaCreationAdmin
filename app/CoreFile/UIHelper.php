<?php
namespace App\CoreFile;
use DateTime;

class UIHelper{
    public  static function NewID(){
		return substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0);
	}
    public static function BaseUrl(){
		if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') 
				    $link = "https"; 
				else
				    $link = "http"; 
				$link .= "://";  
				$link .= $_SERVER['HTTP_HOST'];  
				//$link .= $_SERVER['REQUEST_URI']; 
				return  $link;
		}
        public static function GetDateTime(){
			date_default_timezone_set("Asia/Kolkata");
			$fineStamp = date('Y-m-d\TH:i:s').substr(microtime(), 1, 9);
			$d = new DateTime($fineStamp);
			$date=$d->format('Y-m-d H:i:s.u').PHP_EOL;
			return substr($date, 0, -2);
		}
}
?>
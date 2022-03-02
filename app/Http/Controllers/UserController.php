<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Http\Controllers\Core\BaseController;
use Illuminate\Http\Request;

class UserController extends BaseController
{
    public function ssguru()
    {
        $data = array(
            'ApiToken' => '34dad929-a9c3-49bc-a35b-72f2d9ae9b49'
        );
        
        $url="http://ssguru.com/ssguru_test_api/api/portal/User/List";
        $handle = curl_init($url);
        curl_setopt($handle, CURLOPT_POST, true);
        curl_setopt($handle, CURLOPT_POSTFIELDS,json_encode($data));
        curl_setopt($handle, CURLOPT_HTTPHEADER,array(
            'Content-Type:application/json'
        ));
       $res= curl_exec($handle);
        curl_close($handle);

    echo $res;
    }
    public function list()//Product List
    {
        $entity=Customer::orderBy("created_at","DESC")->get();
        $this->Response->IsSuccess=true;
        $this->Response->Data=$entity;
        $this->Response->Message="Customer List";
        return $this->rModel();
    }
    public function usercount()
    {
        $entity=Customer::all()->count();
        $this->Response->IsSuccess=true;
        $this->Response->Data=$entity;
        $this->Response->Message="Customer List";
        return $this->rModel();
    }
}

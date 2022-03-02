<?php

namespace App\Http\Controllers\Core;

use App\CoreFile\BaseResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    public $Response;
    public $Auth;
    public $CreateBy;
    function __construct()
    {
        $this->Response=new BaseResponse();
    }
    public function rModel()
    {
        return response()->json($this->Response);
    }
}

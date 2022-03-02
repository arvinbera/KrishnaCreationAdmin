<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Http\Controllers\Core\BaseController;
use App\Product;
use Illuminate\Http\Request;

class DashboardController extends BaseController
{
    public function dashboard()
    {
     $obj=array(
         "total_customer"=>Customer::count(),
         "total_product"=>Product::count()
     );
     $this->Response->IsSuccess=true;
     $this->Response->Data=$obj;
     $this->Response->Message="Customer List";
     return $this->rModel();
    }
}

<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductImage;
use App\CoreFile\FileHelper;
use Illuminate\Http\Request;
use App\http\Controllers\Core\BaseController;

class ImageController extends BaseController
{
    public function create(Request $request)
    {   
        $obj=Product::where("id",$request->id)->first(); 
        
        if($request->hasFile("file"))
        {
            $url=FileHelper::DoUpload($request->file);
            $obj->product_image_url=$url;
        }
        
        //$obj->customerid="productid";
        
        $obj->product_name=$obj->product_name;
        $obj->price=$obj->price;
        $obj->category=$obj->category;
        $obj->amount=$obj->amount;
        Product::where("id",$request->id)->update($obj->toArray());
        $this->Response->IsSuccess=true;
        $this->Response->Message="Image Inserted";
        $this->Response->Data=$obj;
        return $this->rModel();
    }
    public function multiple(Request $request)
    {


        $url=null;
       if($request->hasFile("file"))
       {
        foreach($request->file as $data)
        {
         $url=FileHelper::DoUpload($data);
         $entity=new ProductImage();
         $entity->product_id=$request->id;
         $entity->url=$url;
         $entity->save();
        }
       }
       $this->Response->IsSuccess=true;
       $this->Response->Message="Images are Inserted";
       return $this->rModel();
    }
}

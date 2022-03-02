<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Core\BaseController;
use App\CoreFile\UIHelper;
class ProductController extends BaseController
{
    public function add(Request $request)//Add Product
    {

        
        $entity= new Product();
        $entity->product_name=$request->product_name??"";
        $entity->amount=$request->amount??"";
        $entity->price=$request->price;
        $entity->category=$request->category??"";
        $entity->product_image_url=$request->product_image_url??"URL";
        $entity->ApiToken=UIHelper::NewID();
        $entity->save();
        $this->Response->IsSuccess = true;
        $this->Response->Message = "Data Inserted";
        $this->Response->Data = $entity;
        return $this->rModel();
    }

    public function details(Request $request)// Product Details
    {
        $entity=Product::where("id",$request->id)->with('product_images')->first();
        if(!$entity){

            $this->Response->Message="Data not found";
            return $this->rModel();
        
          }
        $this->Response->IsSuccess=true;
        $entity->product_image_url=UIHelper::BaseUrl()."/".$entity->product_image_url;
        $this->Response->Data=$entity;
        $this->Response->Message="Product Details";
        return $this->rModel();
    }
    public function list(Request $request)//Product List
    {
        $entity=Product::orderBy("created_at","DESC")->get();
 

        $list=array();
        foreach($entity as $data){
            $data->product_image_url=UIHelper::BaseUrl()."/".$data->product_image_url;
            array_push($list,$data);

        }
        $res=array(
            "products"=>$list,
            "total_products"=>$entity->count()
        );
        $this->Response->IsSuccess=true;
        $this->Response->Data=$res;
        $this->Response->Message="Product List";
        return $this->rModel();
    }
    public function update(Request $request)//Product Update
    {
        $entity=Product::where("id",$request->id)->first();
        if(!$entity){
            $this->Response->Message="Data Not Found";
            return $this->rModel();
          }
        $entity->product_name=$request->name??$entity->product_name;
        $entity->price=$request->price??$entity->price;
        $entity->category=$request->category??$entity->category;
        $entity->amount=$request->amount??$entity->amount;
        Product::where("id",$request->id)->update($entity->toArray());
        $this->Response->IsSuccess=true;
        $this->Response->Message="Product Details Updated";
        return $this->rModel();
    }
    public function productcount()
    {
        $entity=Product::count();
        $this->Response->IsSuccess=true;
        $this->Response->Data=$entity;
        $this->Response->Message="Product Count";
        return $this->rModel();
    }
    public function DeleteSingleProduct(Request $request)
    {

        if(!Product::where("id",$request->id)->exists()){

            $this->Response->IsSuccess=true;
            $this->Response->Message="Product not found";
            return $this->rModel();

        }
        Product::where("id",$request->id)->delete();
        $this->Response->IsSuccess=true;
        $this->Response->Message="Product Deleted";
        return $this->rModel();
    }
    public function DeleteMultipleProduct(Request $request)
    {
        foreach($request->id as $id)
        {
         Product::where("id",$id)->delete();
        }
        $this->Response->IsSuccess=true;
        $this->Response->Message="Products are deleted";
        return $this->rModel();
    }
}

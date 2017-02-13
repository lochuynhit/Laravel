<?php

namespace App\Http\Controllers;

use App\Http\Requests\productsRequest;
//use Illuminate\Http\Request;
use App\Category;
use App\Products;
use App\image;
use DB;
use File;
use Request;
use Illuminate\Support\Facades\Input;
class Product extends Controller
{
    public function getAdd(){
    	$parent = Category::select('id','name_cate','parent_id_cate')->orderBy('id','DESC')->get()->toArray();
    	return view('admin.product.add',compact('parent'));
    }
    public function postAdd(productsRequest $request){
        $upload_images = $request->file('fImages')->getClientOriginalName();
    	$product = new Products;
    	$product->name_product	=	$request->txtName;
    	$product->alias_product	=	filterAlias($request->txtName);
    	$product->price_product	=	$request->txtPrice;
    	$product->info_product	=	$request->txtIntro;
    	$product->content_product	=	$request->txtContent;
    	$product->image_product	=	$upload_images;
    	$product->keywords_product	=	$request->txtKeyword;
    	$product->description_product	=	$request->txtDescription;
    	$product->cate_id	=	$request->txtParent;
    	$product->user_id	=	1;
        $request->file('fImages')->move('resources/upload',$upload_images);
        $product->save();
        $pro_id = $product->id;
        if(Input::hasFile('ImagesDetail')){
            foreach (Input::file('ImagesDetail') as $file) {
                $product_img = new image;
                if(isset($file)){
                    $product_img->image = $file->getClientOriginalName();
                    $product_img->product_id = $pro_id;
                    $file->move('resources/upload/detail/',$file->getClientOriginalName());
                    $product_img->save();
                }
            }
        }
        
        return redirect()->route('admin.product.getAdd')->with(['flash_messeger'=>'success ! complete add Product','alert_messeger'=>'success']);
    }
    public function getList(){
        $data = Products::select('id','name_product','price_product','info_product','content_product','image_product','keywords_product','description_product','cate_id','user_id','created_at')->get()->toArray();
    	return view('admin.product.list',compact('data'));
    }

    public function getDelete($id){
        $product_detail = Products::find($id)->images;
        foreach ($product_detail as $value) {
            File::delete('resources/upload/detail/'.$value['image']);
        }
        $product = Products::findOrFail($id);
        File::delete('resources/upload/'.$product->image_product);
        $product->delete($id);
        return redirect()->route('admin.product.getList')->with(['flash_messeger'=>'success ! complete Delete Product','alert_messeger'=>'success']);
    }
    public function getEdit($id){
        $data = Products::findOrFail($id)->toArray();
        $parent = Category::select('id','name_cate','parent_id_cate')->orderBy('id','DESC')->get()->toArray();
        $img_detail = Products::find($id)->images;
        return view('admin.product.edit',compact('data','parent','img_detail'));
    }
    public function getImgDelete($id){
        if(request::ajax()){
            $idHinh = request::get("idHinh");
            $img_detail = image::findOrFail($idHinh);
            if(!empty($img_detail)){
                $img_url = 'resources/upload/detail/'.$img_detail->image;
                if(File::exists($img_url)){
                    File::delete($img_url);
                }
                $img_detail->delete();
            }
            return "done";
        }
    }
    public function postEdit($id,productsRequest $request){ 
        $product = Products::findOrFail($id);
        /* request fImages */
        $img_current = 'resources/upload/'.request::Input('img_current');        
        if(!empty(Request::file('fImages'))){
           $file_name = request::file('fImages')->getClientOriginalName();
           $product->image_product = $file_name;
           request::file('fImages')->move('resources/upload',$file_name);
           if(File::exists($img_current)){
                File::delete($img_current);
           }
        }
        /* end request image */
        $product->name_product  =   $request->txtName;
        $product->alias_product =   filterAlias($request->txtName);
        $product->price_product =   $request->txtPrice;
        $product->info_product  =   $request->txtIntro;
        $product->content_product   =   $request->txtContent;
        $product->keywords_product  =   $request->txtKeywords;
        $product->description_product   =   $request->txtDescription;
        $product->cate_id   =   $request->txtParent;
        $product->user_id   =   1;
        $product->save();
        $pro_id = $product->id;
        /* request img_detail */
        if(Input::hasFile('ImagesDetail')){
            $getImg_detail = Request::file('ImagesDetail');
            foreach ($getImg_detail as $file) {
                $img_detail = new image;
                if (isset($file)) {
                    $img_detail->image = $file->getClientOriginalName();
                    $img_detail->product_id = $pro_id;
                    $file->move('resources/upload/detail/',$file->getClientOriginalName());
                    $img_detail->save();
                }
            }

        }
        /* end request img_detail */
        return redirect()->route('admin.product.getList')->with(['flash_messeger'=>'success ! complete Edit Product','alert_messeger'=>'success']);
    }
}
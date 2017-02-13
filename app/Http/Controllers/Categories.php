<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\categoryRequest;
use App\Category;

class Categories extends Controller
{
	public function getList (){
		$list_cate = Category::select('id','name_cate','alias_cate','parent_id_cate','keyword_cate','description_cate')->get()->toArray();
		return view('admin.cate.list',compact('list_cate'));
	}
    public function getAdd (){
    	$parent = Category::select('id','name_cate','parent_id_cate')->orderBy('id','DESC')->get()->toArray();
    	return view('admin.cate.add',compact('parent'));
    }
    public function postAdd (categoryRequest $request){
    	$cate = new Category;
		$cate->name_cate = $request ->txtCateName;
		$cate->alias_cate = filterAlias($request ->txtCateName);
		$cate->parent_id_cate = $request->txtParent;
		$cate->keyword_cate = $request ->txtKeyword; 
		$cate->description_cate = $request ->txtdescription;
		$cate->save(); 
		return redirect()->route('admin.cate.getList')->with(['flash_messeger'=>'success ! complete add category','alert_messeger'=>'success']);
    }
    public function getDelete ($id){
        $parent = Category::where('parent_id_cate',$id)->count();
        if ($parent == 0) {
            $cate = Category::find($id);
            $cate->delete('id');
            return redirect()->route('admin.cate.getList')->with(['flash_messeger'=>'success ! complete Delete category','alert_messeger'=>'success']);
        }else{
            echo    "<script type='text/javascript'>
                        alert('Sorry no delete this category');
                        window.location = ' ";
                                                echo route('admin.cate.getList');
            echo        "'
                        </script>";
        }
    	
    }
    public function getEdit ($id){
        $data = Category::findOrFail($id)->toArray();
        $parent = Category::select('id','name_cate','parent_id_cate')->where('id','<>',$id)->orderBy('id','DESC')->get()->toArray();
        return view('admin.cate.edit',compact('data','parent'));
    }
    public function postEdit (Request $request,$id){
        $this->validate($request,
                ['txtCateName'=>'required|unique:categories,name_cate'],
                ['txtCateName.required'=>'Please enter Name Category']
            );
        $cate = Category::find($id);
        $cate->name_cate = $request ->txtCateName;
        $cate->alias_cate = filterAlias($request ->txtCateName);
        $cate->parent_id_cate = $request->txtParent;
        $cate->keyword_cate = $request ->txtKeyword; 
        $cate->description_cate = $request ->txtdescription;
        $cate->save(); 
        return redirect()->route('admin.cate.getList')->with(['flash_messeger'=>'success ! complete edit category','alert_messeger'=>'success']);
    }

}

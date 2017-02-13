<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Http\Requests\userRequest;
use Hash;
use App\User;

class userController extends Controller
{
    public function getAdd(){
    	return view('admin.user.add');
    }

    public function postAdd(userRequest $request){
    	$user = new User;
    	$user->username 		= 	$request->txtUser;
    	$user->password 		=	Hash::make($request->txtPass);
    	$user->email 			=	$request->txtEmail;
    	$user->level 			=	$request->rdoLevel;
    	$user->remember_token	= 	$request->_token;
    	$user->save();
    	return redirect()->route('admin.user.getList')->with(['flash_messeger'=>'success ! complete add User','alert_messeger'=>'success']);
    }

    public function getList(){
    	$data = User::select('id','username', 'email','level')->get()->toArray();
    	return view('admin.user.list',compact('data'));
    }

    public function getDelete($id){
    	$data = User::findOrFail($id);
    	$data->delete();
    	return redirect()->route('admin.user.getList')->with(['flash_messeger'=>'success ! complete Delete User','alert_messeger'=>'success']);
    }

    public function getEdit($id){
    	$data = User::findOrFail($id);
    	return view('admin.user.edit',compact('data'));
    }

    public function postEdit(){
    	
    }

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $fillable = [
    	'id','name_cate','alias_cate','parent_id_cate','keyword_cate','description_cate'
    ];
    public $timestamps = false;

    public function Product(){
    	return $this -> hasMany('App\Products');
    }
}

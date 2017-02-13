<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Products as ProductsModel;

class Products extends Model
{
    protected $table = 'products';
    protected $fillable = [
        'id','name_product','alias_product','price_product','info_product','content_product','image_product','keywords_product','description_product','cate_id','user_id','created_at','updated_at'
    ];
    public $timestamps = true;

    public function Category(){
    	return $this -> belongTo('App\Category');
    }
    public function User(){
    	return $this -> belongTo('App\User');
    }
    public function images(){
    	return $this -> hasMany('App\image','product_id');
    }
}

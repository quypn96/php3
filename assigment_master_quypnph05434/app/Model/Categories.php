<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $table = 'categories';

    public $fillable = ['name'];

    public function setSlugCate($slug_cate){
    	$this->attributes['slug_category'] = str_slug($slug_cate,'');
    }

    public function posts(){
    	return $this->hasMany('App\Model\Post','category_id');
    }
}

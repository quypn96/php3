<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';

    public $fillable = ['title', 'category_id', 'author', 'status', 'short_desc', 'content'];
    
    public function setSlugPost($slug_post){
    	$this->attributes['slug_post'] = str_slug($slug_post,'-').'.'.rand(10,10000);
    }

    public function category(){
    	return $this->belongsTo('App\Model\Categories', 'category_id');
    }
}

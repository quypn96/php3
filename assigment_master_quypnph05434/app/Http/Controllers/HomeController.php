<?php

namespace App\Http\Controllers;


use App\Model\Post;
use App\Model\Categories;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index( Request $request ){
        if ( $request->keyword == null || $request->keyword == "") {
		       $posts = Post::paginate(10);             
	        }else {
	           $posts = Post::where('title', 'like', "%$request->keyword%")->paginate(10); 
	           $posts->withPath( "?keyword=". $request->keyword  );     	 
	        }
	    	return view('index', compact('posts'));
	}



    public function detail($slug_post){
    	$post = Post::where('slug_post', $slug_post)->first();
    	$sameCategory = Post::where('category_id', $post->category_id)->inRandomOrder()->paginate(4);
    	return view('detail', compact('post','sameCategory'));
    }
    
    public function getAllPostsByCategoryId($slug_category)
    {
    	$categories = Categories::where('slug_category', $slug_category)->first();
        // dd($categories);
    	$posts = Post::where('category_id', $categories->id)->paginate(10);
    	return view('menu', compact('posts','slug_category'));
    }

    public function detailPostWithCategory($slug_category,$slug_post){

    	$post = Post::where('slug_post', $slug_post)->first();
    	$sameCategory = Post::where('category_id', $post->category_id)->inRandomOrder()->paginate(4);
    	return view('detail', compact('post','sameCategory'));
    }
    
}

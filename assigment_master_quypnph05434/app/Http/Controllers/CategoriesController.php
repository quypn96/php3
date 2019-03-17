<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Categories;

class CategoriesController extends Controller
{
    public function index(Request $request){
    	if(isset($request->keyword) && $request->keyword != ""){
    		$cates = Categories::where('name', 'like', "%$request->keyword%")->get();
    	}else{
    		$cates = Categories::all();
    	}
    	return view('cate-list', ['data' => $cates]);
    }
}

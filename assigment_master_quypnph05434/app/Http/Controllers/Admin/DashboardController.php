<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Categories;
use App\Model\Post;
use App\User;

class DashboardController extends Controller
{
    public function index(){
    	$totalCate = Categories::count();
    	$totalPost = Post::count();
    	$totalUser = User::count();
    	
    	return view('admin.admin', 
    					[
    						"totalCate" => $totalCate, 
    						"totalPost" => $totalPost, 
    						"totalUser" => $totalUser,
    					]
    				);
    }
}

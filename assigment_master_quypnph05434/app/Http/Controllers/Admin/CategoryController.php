<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Post;
use App\Model\Categories;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    public function index()
    {
    	

    	$cates= Categories::withCount('posts')->get();

    	return view('admin.category.index',[
    		'cates' => $cates,
    	]);

    }
    public function remove($id){
    	$cate = Categories::find($id);
    	if ($cate != null) {
    		$cate->delete();
    	}
    	return redirect(route('cate.list'));
    }

    public function add(){
    	$category = new Categories();
    	$cates = Categories::all();

    	return view(
    		'admin.category.form', 
    		['category'=> $category,'cates'=>$cates]
    	);
    }

    public function edit($id){
    	$category = Categories::find($id);
    	if ($category != null) {
    		$cates = Categories::all();
    		return view(
    		'admin.category.form', 
    		['category'=> $category,'cates'=>$cates]
    		);

       	}
       	redirect(route('cate.list'));
    	
    }
    public function save(Request $request){
        $validatedData = $request->validate([
                'name' => ['required',
                    Rule::unique('categories')->ignore($request->id),
                ]
            ],
            [
                'name.required' => 'Vui lòng nhập tên danh mục',
                'name.unique' => 'Danh mục đã tồn tại',
            ]
        );


    	if($request->id == null){
    		$model = new Categories();
    	}else{
    		$model = Categories::find($request->id);
    	}

        $model->setSlugCate($request->name);
        $model->fill($request->all());
    	$model->save();
    	return redirect(route('cate.list'));
    }
}

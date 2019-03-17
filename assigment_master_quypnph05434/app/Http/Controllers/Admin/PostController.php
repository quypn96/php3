<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Post;
use App\Model\Categories;
use Illuminate\Validation\Rule;
// use DateTime;
// use Carbon\Carbon;

class PostController extends Controller
{
    public function index(Request $request){
        
        $query = " 0=0";
        if ($request->status != "" && $request->status !=null) {
            $query .=  " and status = $request->status";
            $pathStatus = "status=".$request->status;
        }else {
            $pathStatus = "";
        }
        if ($request->category_id != "" && $request->category_id !=null) {
            $query .=  " and category_id = $request->category_id";
            $pathCategory = "category_id=".$request->category_id;
        }else {
            $pathCategory = "";
        }
        if ($request->title != "" && $request->title !=null) {
            $query .=  " and title like '%$request->title%'";
            $pathTitle = "title=".$request->title;
        }else {
            $pathTitle = "";
        }

        if ($request == null || $request=="") {
            $post = Post::paginate(10);
        }else {
            $post = Post::whereRaw($query)->paginate(10);
            $post->withPath( "?".$pathTitle.'&'.$pathStatus ."&".$pathCategory  ); 
        }
        $cates=Categories::all();
        
    	return view('admin.post.index',[
    		'posts' => $post,
            'cates' => $cates,
    	]);
    }

    public function remove($id){
    	$post = Post::find($id);
    	if ($post != null) {
    		$post->delete();
    	}
    	return redirect(route('post.list'));
    }

    public function destroy(Request $request){
        $list = explode(',',$request->listId );
        // dd($list);
        Post::destroy($list);
        return redirect(route('post.list'));
    }

    public function add(){
    	$post = new Post();
    	$cates = Categories::all();

    	return view(
    		'admin.post.form', 
    		['post'=> $post,'cates'=>$cates]
    	);
    }

    public function edit($id){
    	$post = Post::find($id);
    	if ($post != null) {
    		$cates = Categories::all();
    		return view(
    		'admin.post.form', 
    		['post'=> $post,'cates'=>$cates]
    		);

       	}
       	redirect(route('post.list'));
    	
    }
    public function save(Request $request){

        if ($request->id==null) {
            $validateImage = "image|required";
        }else{
            $validateImage = "image";
                
        }
        $validatedData = $request->validate([
                'title' => [
                    'required',
                    Rule::unique('posts')->ignore($request->id),
                    'max:191'
                ],
                'author'=> 'required|max:100', 
                'image' => "$validateImage",
                'category_id' => 'required', 
                'status' => 'required',
                'short_desc'=> 'required',
                'content' => 'required'
            ],
            [
                'title.required' => 'Vui lòng nhập tiêu đề',
                'title.unique' => 'Tiêu đề đã tồn tại',
                'title.max' => 'Độ dài tối đa không vượt quá 191 ký tự',

                'author.required' => 'Vui lòng nhập tác giả',
                'author.max' => 'Độ dài tối đa không vượt quá 100 kí tự',

                'image.image' => 'Vui lòng chọn đúng định dạng ảnh',
                'image.required' => 'Vui lòng chọn ảnh',

                'category_id.required' => 'Vui lòng chọn danh mục',

                'status.required' => 'Vui lòng chọn trạng thái',

                'short_desc.required' => 'Vui lòng nhập mô tả ngắn',

                'content.required' => 'Vui lòng nhập nội dung'

            ]
        );


        if($request->id == null){
            $model = new Post();
        }else{
            $model = Post::find($request->id);
        }
        $model->setSlugPost($request->title);    
    	$model->fill($request->all());

        if ($request->hasFile('image')) {
            // lay ra duoi anh
            $ext = $request->image->extension();
            // lay ten anh go
            $filename = $request->image->getClientOriginalName();
            // sinh ra ten anh moi theo dang slug
            $filename = str_slug(str_replace("." . $ext, "", $filename));
            
            // ten anh + string random + duoi
            $filename = $filename . "-" . str_random(20) . "." . $ext;
            // luu anh 
            $path = $request->image->storeAs('bai-viet', $filename);
            // gan gia tri duong anh anh moi vao trong model
            $model->image = "uploaded/$path";
        }
        
    	$model->save();
    	return redirect(route('post.list'));
    }
}

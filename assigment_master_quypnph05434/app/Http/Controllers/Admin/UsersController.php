<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{	
	protected function index(){
        $users = Auth::user()->all();
        return view('admin.user.index',['users' => $users]);
    }

    protected function profile(){
    	
    	return view('admin.user.profile');
    }

    protected function editProfile($id){
        $user = User::find($id);
        if ($user != null) {
            return view(
            'admin.user.profile-form', 
            ['user'=> $user]
            );

        }
        redirect(route('user.profile'));
    }

    protected function saveProfile(Request $request){

        if (isset($request->role)) {
            return redirect(route('user.profile.edit',['id'=>Auth::user()->id]));
        }


        if ($request->id==null) {
            $validateImage = "image|required";
        }else{
            $validateImage = "image";
                
        }
        $validatedData = $request->validate([
                'name' => [
                    'required',
                    // Rule::unique('posts')->ignore($request->id),
                    'max:191'
                ],
                'current_password'=>'required',
                'password'=> "required|min:6",
                'confirm_password'=> "required|min:6",
                'email'=> ['required',
                            Rule::unique('users')->ignore($request->id),
                            'max:100'], 
                'image' => "$validateImage",
                
            ],
            [
                'name.required' => 'Vui lòng nhập tiêu đề',
                // 'title.unique' => 'Tiêu đề đã tồn tại',
                'name.max' => 'Độ dài tối đa không vượt quá 191 ký tự',

                'email.required' => 'Vui lòng nhập email',
                'email.unique' => 'Email đã tồn tại',
                'email.max' => 'Độ dài tối đa không vượt quá 100 kí tự',

                'image.image' => 'Vui lòng chọn đúng định dạng ảnh',
                'image.required' => 'Vui lòng chọn ảnh',

                'password.required' =>'Vui lòng nhập mật khẩu mới',
                'password.min' =>'Password tối thiểu 6 kí tự',

                'current_password.required' =>'Vui lòng nhập mật khẩu',
                'current_password.min' =>'Password tối thiểu 6 kí tự',

                'confirm_password.required' =>'Vui lòng nhập lại password',
                'confirm_password.min' =>'Password tối thiểu 6 kí tự',
                // 'password.regex' =>'Password không chứa các kí tự đặc biệt',
                
            ]
        );


        if( !(Hash::check($request->current_password , Auth::user()->password))){
            
            
            return redirect(route('user.profile.edit',['id'=>Auth::user()->id]))->withErrors(['current_password'=>"Mật khẩu không đúng"]);
        }else{
            if ($request->password != $request->confirm_password) {
              return redirect(route('user.profile.edit',['id'=>Auth::user()->id]))->withErrors(['confirm_password'=>"Mật khẩu không khớp"]);  
            }
        }
        $model = User::find($request->id);
        // $model->setSlugPost($request->title);    
        $model->fill($request->all());

        $model->password = Hash::make($request->password);

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
            $path = $request->image->storeAs('user-img', $filename);
            // gan gia tri duong anh anh moi vao trong model
            $model->image = "uploaded/$path";
        }
        
        $model->save();
        return redirect(route('login'));
    }

    protected function add(){
    	$user = new User();

    	return view(
    		'admin.user.form', 
    		['user'=> $user]
    	);
    }

    protected function edit($id){
    	$user = User::find($id);
    	if ($user != null) {
    		return view(
    		'admin.user.form', 
    		['user'=> $user]
    		);

       	}
       	redirect(route('user.list'));
    }

    protected function remove($id){
        $user = User::find($id);
        if ($user!=null && $user->role < 500) {
            $user->delete();
        }
        return redirect(route('user.list'));
    }

    protected function save(Request $request){
        if ($request->id==null) {
            $validateImage = "image|required";
            $validatePassword = "required|min:6";
            $validateEmail = "required";
        }else{
            $validateImage = "image";
            $validatePassword = "";
            $validateEmail = "";
                
        }
        $validatedData = $request->validate([
                'name' => [
                    'required',
                    // Rule::unique('posts')->ignore($request->id),
                    'max:191'
                ],
                'role'=>'required',
                'password'=> "$validatePassword",
                'email'=> ["$validateEmail",
                			Rule::unique('users')->ignore($request->id),
                			'max:100'], 
                'image' => "$validateImage",
                
            ],
            [
                'name.required' => 'Vui lòng nhập tiêu đề',
                // 'title.unique' => 'Tiêu đề đã tồn tại',
                'name.max' => 'Độ dài tối đa không vượt quá 191 ký tự',

                'email.required' => 'Vui lòng nhập email',
                'email.unique' => 'Email đã tồn tại',
                'email.max' => 'Độ dài tối đa không vượt quá 100 kí tự',

                'image.image' => 'Vui lòng chọn đúng định dạng ảnh',
                'image.required' => 'Vui lòng chọn ảnh',

                'password.required' =>'Vui lòng nhập password',
                'password.min' =>'Password tối thiểu 6 kí tự',
                
                'role.required'=>'Vui lòng chọn quyền quản lí '
                
            ]
        );


        if($request->id == null){
            $model = new User();
        }else{
            $model = User::find($request->id);
        }
        // $model->setSlugPost($request->title);    
    	$model->fill($request->all());

    	if ($request->id ==null) {
            $model->password = Hash::make($request->password);
        }

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
            $path = $request->image->storeAs('user-img', $filename);
            // gan gia tri duong anh anh moi vao trong model
            $model->image = "uploaded/$path";
        }
        
    	$model->save();
    	return redirect(route('user.list'));
    }
}

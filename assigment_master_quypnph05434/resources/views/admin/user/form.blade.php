


@extends('layouts.main-admin')
@php
	$title = $user->id == null? "Thêm tài khoản": "Sửa tài khoản";
	$roles= [
      "Admin" => '500',
      "Quản trị" => '200',
      "Member" => '1',
  ];
  // dd($user->image);
@endphp
@section('title', $title)
@section('pagename', $title)
@section('content')
	
	<div class="register-box">
		<div class="register-box-body">
			<p class="login-box-msg">Register a new membership</p>
			<form enctype="multipart/form-data"
					action="{{ route('user.save') }}"
					method="post">
				@csrf
				<input type="hidden" name="id" value="{{$user->id}}">
				
					
						<div class="form-group has-feedback">
							<label>Name</label>
							<input type="text" name="name" class="form-control" value="{{old('name',$user->name)}}">
							<span class="glyphicon glyphicon-user form-control-feedback"></span>
							@if($errors)
								<span class="text-danger">{{$errors->first('name')}}</span>
							@endif
						</div>
						@if ($user->id == null)

							
							<div class="form-group has-feedback">
								<label>Email</label>
								<input type="email" name="email" class="form-control" value="{{old('email', $user->email)}}" >
								<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
								@if($errors)
									<span class="text-danger">{{$errors->first('email')}}</span>
								@endif
							</div>
							<div class="form-group has-feedback">
							<label>Password</label>
							<input type="password" name="password" class="form-control">
							<span class="glyphicon glyphicon-lock form-control-feedback"></span>
							@if($errors)
								<span class="text-danger">{{$errors->first('password')}}</span>
							@endif
						</div>
						@endif
						<div class="form-group">
							<label>Quyền hạn</label>
							<br>
							
							@foreach ($roles as $key=>$value)
								<input type="radio" name="role" value="{{ $value }}" @if ($value ==$user->role)
									checked="true" 
								@endif> {{ $key }} &nbsp; 
							@endforeach
							
							@if($errors)
								<span class="text-danger">{{$errors->first('role')}}</span>
							@endif
						</div>
					
					
						<div class="row">
							<div class="">
								<img id="imageTarget" src="{{asset($user->image)}}" class="img-responsive">
							</div>
						</div>
						<div class="form-group">
							<label>Avata</label>

							<input type="file" name="image" class="form-control" >
							@if($errors)
								<span class="text-danger">{{$errors->first('image')}}</span>
							@endif
						</div>
						
				<div class="col-md-4"">
					
					<button type="submit" class="btn btn-primary btn-block btn-flat">Lưu</button>
				</div>
				<div class="col-md-4">
					<a href="{{ route('user.list') }}"
						class="btn btn-danger btn-danger btn-flat">Huỷ</a>
				</div>
			</form>
		</div>
	</div>	


@endsection
@section('js')
	
	<script type="text/javascript">
		// CKEDITOR.replace('content');
		function getBase64(file, selector) {
		    var reader = new FileReader();
		    reader.readAsDataURL(file);
		    reader.onload = function () {
		    	// console.log(reader.result);
		      $(selector).attr('src', reader.result);
		    };
		    reader.onerror = function (error) {
		       console.log('Error: ', error);
		    };
	  	}
		  var img = document.querySelector('[name="image"]');
		  img.onchange = function(){
		    var file = this.files[0];
		    if(file == undefined){
		      $('#imageTarget').attr('src', '{{asset('img/default.jpg')}}');
		    }else{
		      getBase64(file, '#imageTarget');
		    }
		  }
	</script>
@endsection
	































	
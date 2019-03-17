


@extends('layouts.main-admin')
@php
	$title = "ChangePassword";
  // dd($user->image);
@endphp
@section('title', $title)
@section('content')
	
	<div class="register-box">
		<div class="register-box-body">
			<div class="register-logo">
				<b>{{$title}}</b>
			</div>
			<form enctype="multipart/form-data"
					action="{{ route('user.profile.save') }}"
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
						
						<div class="form-group has-feedback">
							<label>Email</label>
							<input type="email" name="email" class="form-control" value="{{old('email', $user->email)}}">
							<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
							@if($errors)
								<span class="text-danger">{{$errors->first('email')}}</span>
							@endif
						</div>
						<div class="form-group has-feedback">
							<label>Mật khẩu hiện tại</label>
							<input type="password" name="current_password" class="form-control" >
							<span class="glyphicon glyphicon-lock form-control-feedback"></span>
							@if($errors)
								<span class="text-danger">{{$errors->first('current_password')}}</span>
							@endif
							
						</div>
						<div class="form-group has-feedback">
							<label>Mật khẩu mới</label>
							<input type="password" name="password" class="form-control" >
							<span class="glyphicon glyphicon-lock form-control-feedback"></span>
							@if($errors)
								<span class="text-danger">{{$errors->first('password')}}</span>
							@endif
						</div>
						<div class="form-group has-feedback">
							<label>Nhập lại mật khẩu mới</label>
							<input type="password" name="confirm_password" class="form-control" >
							<span class="glyphicon glyphicon-lock form-control-feedback"></span>
							@if($errors)
								<span class="text-danger">{{$errors->first('confirm_password')}}</span>
							@endif
						</div>
						
						
					
					
						<div class="row">
							<div class="col-md-6 col-md-offset-3">
								<img id="imageTarget" src="{{asset($user->image)}}" class="img-responsive">
							</div>
						</div>
						<div class="form-group has-feedback">
							<label>Avata</label>

							<input type="file" name="image" class="form-control" >
							@if($errors)
								<span class="text-danger">{{$errors->first('image')}}</span>
							@endif
						</div>
					
				
				
				<div class="text-right">
					<a href="{{ route('user.profile') }}"
						class="btn btn-sm btn-danger">Huỷ</a>
					<button type="submit" class="btn btn-sm btn-primary">Lưu</button>
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
	































	
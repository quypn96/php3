@extends('layouts.main-admin')
@php
	$title = $post->id == null? "Thêm bài viết": "Sửa bài viết";
	$status= [
      "Hủy đăng" => '-1',
      "Nháp" => '0',
      "Active" => '1',
  ];
  // dd($post->image);
@endphp
@section('title', $title)
@section('pagename', $title)
@section('content')
	
	<form enctype="multipart/form-data"
			action="{{ route('post.save') }}"
			method="post">
		@csrf
		<input type="hidden" name="id" value="{{$post->id}}">
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label>Tiêu đề</label>
					<input type="text" name="title" class="form-control" value="{{old('title',$post->title)}}">
					@if($errors)
						<span class="text-danger">{{$errors->first('title')}}</span>
					@endif
				</div>
				<div class="form-group">
					<label>Danh mục</label>
					<select name="category_id" class="form-control">
						@foreach ($cates as $item)
							<option 
								@if($item->id == $post->category_id)
								selected
								@endif
								value="{{$item->id}}">{{$item->name}}</option>
						@endforeach
					</select>
					@if($errors)
						<span class="text-danger">{{$errors->first('category_id')}}</span>
					@endif
				</div>
				<div class="form-group">
					<label>Tác giả</label>
					<input type="text" name="author" class="form-control" value="{{old('author', $post->author)}}">
					@if($errors)
						<span class="text-danger">{{$errors->first('author')}}</span>
					@endif
				</div>
				<div class="form-group">
					<label>Trạng thái</label>
					<br>
					
					@foreach ($status as $key=>$value)
						<input type="radio" name="status" value="{{ $value }}" @if ($value ==$post->status)
							checked="true" 
						@endif> {{ $key }} &nbsp; 
					@endforeach
					{{-- <input type="radio" name="status" value="-1"> Huỷ đăng &nbsp;
					<input type="radio" name="status" value="0"> Nháp &nbsp;
					<input type="radio" name="status" value="1"> Active &nbsp; --}}
					@if($errors)
						<span class="text-danger">{{$errors->first('status')}}</span>
					@endif
				</div>
			</div>
			<div class="col-md-6">
				<div class="row">
					<div class="col-md-6 col-md-offset-3">
						<img id="imageTarget" src="{{asset($post->image)}}" class="img-responsive">
					</div>
				</div>
				<div class="form-group">
					<label>Ảnh bài viết</label>

					<input type="file" name="image" class="form-control" >
					@if($errors)
						<span class="text-danger">{{$errors->first('image')}}</span>
					@endif
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="form-group">
					<label>Mô tả ngắn</label>
					<textarea class="form-control" name="short_desc" rows="5">{!! old('short_desc',$post->short_desc) !!}</textarea>
					@if($errors)
						<span class="text-danger">{{$errors->first('short_desc')}}</span>
					@endif
				</div>	
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="form-group">
					<label>Nội dung</label>
					<textarea id="content" class="form-control" name="content" rows="15">{!! $post->content !!}</textarea>
					@if($errors)
						<span class="text-danger">{{$errors->first('content')}}</span>
					@endif
				</div>
			</div>
		</div>
		<div class="text-right">
			<a href="{{ route('post.list') }}"
				class="btn btn-sm btn-danger">Huỷ</a>
			<button type="submit" class="btn btn-sm btn-primary">Lưu</button>
		</div>
	</form>


@endsection
@section('js')
	
	<script type="text/javascript">
		CKEDITOR.replace('content');
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
	
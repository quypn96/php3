@extends('layouts.main-admin')
@php
	$title = $category->id == null? "Thêm danh mục": "Sửa danh mục";
@endphp
@section('title', $title)
@section('pagename', $title)
@section('content')
	
	<form enctype="multipart/form-data"
			action="{{ route('cate.save') }}"
			method="post">
		@csrf
		<input type="hidden" name="id" value="{{$category->id}}">
		<div class="row">
			<div class="col-md-6">
				<h3>{{$category->name}}</h3>
				<div class="form-group">
					<label>Name</label>
					<input type="text" name="name" class="form-control" value="{{$category->name}}">
					@if($errors)
						<span class="text-danger">{{$errors->first('name')}}</span>
					@endif
				</div>
				
				<div class="text-center">
				<a href="{{ route('cate.list') }}"
					class="btn btn-sm btn-danger">Huỷ</a>
				<button type="submit" class="btn btn-sm btn-primary">Lưu</button>
				</div>
			</div>
			<div class="col-md-6">
				<table class="table table-bordered">
			        <tbody>
			      <tr>
			          <th style="width: 10px">#</th>
			          <th>Name</th>
			          <th>Slug</th>
			          
			        </tr>
			        @foreach ($cates as $c)
			          <tr>
			            <td>{{$c->id}}</td>
			            <td>{{$c->name}}</td>
			            <td>
			              {{$c->slug_category}}
			            </td>
			            
			          </tr>
			        @endforeach
			        
			      </tbody>
			      </table>
			</div>
		</div>
		
		
		
	</form>


@endsection
@section('js')
	
@endsection
	
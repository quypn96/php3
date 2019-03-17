@extends('layouts.main-admin')
@section('title', 'Profile')
@section('pagename', 'Profile')
@section('content')
@php
  	$role=[
  		"Admin"=>500,
  		"Quản trị viên"=>200,
  		"Member" =>1
  	];
@endphp
<div class="box">
    <!-- /.box-header -->
    <div class="col-md-4 col-md-offset-4">
    	<div class="box-body box-profile">
	      <img class="profile-user-img img-responsive img-circle" src="{{ asset(Auth::user()->image) }}" alt="User profile picture">

	      <h3 class="profile-username text-center">{{Auth::user()->name}}</h3>

	      <p class="text-muted text-center">Software Engineer</p>

	      <ul class="list-group list-group-unbordered">
	        <li class="list-group-item">
	          <b>Name</b> <a class="pull-right">{{Auth::user()->name}}</a>
	        </li>
	        <li class="list-group-item">
	          <b>Email</b> <a class="pull-right">{{Auth::user()->email}}</a>
	        </li>
	        <li class="list-group-item">
	          <b>Quyền</b> <a class="pull-right">
	          	@foreach ($role as $key=>$value)
	        						@if (Auth::user()->role == $value)
	        							{{ $key }}
	        						@endif
	        					@endforeach
	          </a>
	        </li>
	      </ul>

	      <a href="{{ route('user.profile.edit',['id'=>Auth::user()->id]) }}" class="btn btn-primary btn-block"><b>ChangePassword</b></a>
	      <a href="{{ route('dashboard') }}" class="btn btn-primary btn-block"><b>Dashboard</b></a>
	    </div>
    </div>
        {{-- <div class="row">
        	<div class="col-md-3">
        		
        	</div>
        	<div class="col-md-3">
        		<div class="row">
        			<h3 class="">Name: <span>{{Auth::user()->name}}</span></h3>
        		</div>
        		<div class="row">
        			<h3 class="">Email: <span>{{Auth::user()->email}}</span></h3>
        		</div>
        		<div class="row">
        			<h3 class="">Quyền: 
        				<span>
        					@foreach ($role as $key=>$value)
        						@if (Auth::user()->role == $value)
        							{{ $key }}
        						@endif
        					@endforeach
        				</span>
        			</h3>
        		</div>
        	</div>
        	<div class="col-md-3">
        		<h3>Ảnh đại diện</h3>
        		<img src="{{ asset(Auth::user()->image) }}" alt="" width="100">
        	</div>
        </div>
        <div class="row text-center">
        	<a href="{{ route('user.profile.edit',['id'=>Auth::user()->id]) }}" class="btn btn-success">ChangePassword</a>
        	<a href="{{ route('dashboard') }}" class="btn btn-danger">Dashboard</a>
        </div>	 --}}
			      
    </div>
    <!-- /.box-body -->
    
  </div>
@endsection
@section('js')
  
  
@endsection
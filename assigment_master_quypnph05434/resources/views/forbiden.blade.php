@extends('layouts.main-index')
@section('title','Error')
@section('content')
	<div class="container">
		@if($errors->any())
	    <h4 class="text-danger">{{$errors->first()}}</h4>
	  @endif			
	</div>		
@endsection
@section('js')

@endsection	
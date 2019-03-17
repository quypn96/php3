@extends('layouts.main-index')
@section('title')
	{{ $post->title }}
@endsection
@section('content')
<div class="section">
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<div class="section-row sticky-container">
					<div class="main-post">
						<h3>{{ $post->title }}</h3>
						<p>{{ $post->short_desc }} </p>
						
						<figure class="figure-img">
							<img class="img-responsive" src=" {{ asset($post->image) }} " alt="">
							<figcaption></figcaption>
						</figure>
						<p>{!! $post->content !!}</p>
						<p>Tác giả: {{ $post->author }}</p>
						{{-- <p>{{ $post->count_view }}</p> --}}
					</div>
					<div class="post-shares sticky-shares">
						<a href="#" class="share-facebook"><i class="fa fa-facebook"></i></a>
						<a href="#" class="share-twitter"><i class="fa fa-twitter"></i></a>
						<a href="#" class="share-google-plus"><i class="fa fa-google-plus"></i></a>
						<a href="#" class="share-pinterest"><i class="fa fa-pinterest"></i></a>
						<a href="#" class="share-linkedin"><i class="fa fa-linkedin"></i></a>
						<a href="#"><i class="fa fa-envelope"></i></a>
					</div>
				</div>
			</div>
			@include('_share.detail.aside')
		</div>
	</div>
</div>		


	
@endsection
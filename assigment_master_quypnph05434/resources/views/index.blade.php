@extends('layouts.main-index')
@section('title')
	Home
@endsection
@section('content')
@php
    use Carbon\Carbon;
@endphp
		
<div class="section">
	
	<div class="section section-grey">
		<div class="container">
			<div class="row">
				@foreach ($posts as $post)

					@php
		                $date = new Carbon($post->created_at);
		                $created_at = $date->toFormattedDateString();
		            @endphp

					<div class="col-md-4">
						<div class="post">
							<a class="post-img" href="{{ $post->slug_post }}">
								<img src="{{ $post->image }}">
							</a>
							<div class="post-body">
								<div class="post-meta">
									<a class="post-category cat-1" href="{{ route('post.by.cate', ['slug_category' => $post->category->slug_category ]) }}">{{ $post->category->name}}</a>
									<span class="post-date">{{ $created_at}}</span>
								</div>
								<h3 class="post-title"><a href="{{ $post->slug_post }}">{{ $post->title }}</a></h3>
							</div>
						</div>
					</div>
				@endforeach
			</div>
		</div>
	</div>
	{{ $posts->links() }}
</div>		

@endsection
@section('js')
	{{-- expr --}}
@endsection
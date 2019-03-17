<div class="col-md-4">
						<!-- ad -->
						{{-- <div class="aside-widget text-center">
							<a href="#" style="display: inline-block;margin: auto;">
								<img class="img-responsive" src="{{ asset('./img/ad-1.jpg" alt="') }}">
							</a>
						</div> --}}
						<!-- /ad -->

						<!-- post widget -->
						<div class="aside-widget">
							<div class="section-title">
								<h2>Cùng chủ đề</h2>
							</div>
							@foreach ($sameCategory as $post)
								{{-- expr --}}
							<div class="post post-widget">
								<a class="post-img" href="{{ $post->slug_post  }}"><img src="{{ asset($post->image) }}"></a>
								<div class="post-body">
									<h3 class="post-title"><a href="{{ $post->slug_post  }}">{{ $post->title }}</a></h3>
								</div>
								<div>
									<span>{{ $post->author }}</span>
									{{-- <span>{{ $post->count_view }}</span> --}}
								</div>
							</div>

							@endforeach
					
						</div>
						<!-- /post widget -->

						<!-- post widget -->
						{{-- <div class="aside-widget">
							<div class="section-title">
								<h2>Featured Posts</h2>
							</div>
							<div class="post post-thumb">
								<a class="post-img" href="blog-post.html"><img src="{{ asset('./img/post-2.jpg" alt="') }}"></a>
								<div class="post-body">
									<div class="post-meta">
										<a class="post-category cat-3" href="#">Jquery</a>
										<span class="post-date">March 27, 2018</span>
									</div>
									<h3 class="post-title"><a href="blog-post.html">Ask HN: Does Anybody Still Use JQuery?</a></h3>
								</div>
							</div>

							<div class="post post-thumb">
								<a class="post-img" href="blog-post.html"><img src="{{ asset('./img/post-1.jpg" alt="') }}"></a>
								<div class="post-body">
									<div class="post-meta">
										<a class="post-category cat-2" href="#">JavaScript</a>
										<span class="post-date">March 27, 2018</span>
									</div>
									<h3 class="post-title"><a href="blog-post.html">Chrome Extension Protects Against JavaScript-Based CPU Side-Channel Attacks</a></h3>
								</div>
							</div>
						</div> --}}
						<!-- /post widget -->
						
						<!-- catagories -->
						<div class="aside-widget">
							<div class="section-title">
								<h2>Catagories</h2>
							</div>
							<div class="category-widget">
								<ul>
									<li><a href="#" class="cat-1">Web Design<span>340</span></a></li>
									<li><a href="#" class="cat-2">JavaScript<span>74</span></a></li>
									<li><a href="#" class="cat-4">JQuery<span>41</span></a></li>
									<li><a href="#" class="cat-3">CSS<span>35</span></a></li>
								</ul>
							</div>
						</div>
						<!-- /catagories -->
						
						<!-- tags -->
						<div class="aside-widget">
							<div class="tags-widget">
								<ul>
									<li><a href="#">Chrome</a></li>
									<li><a href="#">CSS</a></li>
									<li><a href="#">Tutorial</a></li>
									<li><a href="#">Backend</a></li>
									<li><a href="#">JQuery</a></li>
									<li><a href="#">Design</a></li>
									<li><a href="#">Development</a></li>
									<li><a href="#">JavaScript</a></li>
									<li><a href="#">Website</a></li>
								</ul>
							</div>
						</div>
						<!-- /tags -->
						
						<!-- archive -->
						<div class="aside-widget">
							<div class="section-title">
								<h2>Archive</h2>
							</div>
							<div class="archive-widget">
								<ul>
									<li><a href="#">January 2018</a></li>
									<li><a href="#">Febuary 2018</a></li>
									<li><a href="#">March 2018</a></li>
								</ul>
							</div>
						</div>
						<!-- /archive -->
					</div>
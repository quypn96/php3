@php
	$keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';
							
@endphp
<header id="header">
			<!-- Nav -->
	<div id="nav">
		<!-- Main Nav -->
		<div id="nav-fixed">
			<div class="container">
				<!-- logo -->
				<div class="nav-logo">
					<a href="/" class="logo"><img src="{{ asset('img/logo.png') }}"></a>
				</div>
				<!-- /logo -->

				<!-- nav -->
				<ul class="nav-menu nav navbar-nav">
					
					@foreach ($menus as $menu)
						<li><a href="/{{ $menu->slug_category }}">{{ $menu->name }}</a></li>
					@endforeach 
					
				</ul>
				<!-- /nav -->

				<!-- search & aside toggle -->
				<div class="nav-btns">
					<button class="aside-btn"><i class="fa fa-bars"></i></button>
					<button class="search-btn"><i class="fa fa-search"></i></button>
					
						<form action="/" method="get" accept-charset="utf-8" class="search-form">
							<input class="search-input" type="text" value="{{$keyword}}" name="keyword" placeholder="Enter Your Search ...">
							
						
						<button class="search-close"><i class="fa fa-times"></i></button>
						</form>
				</div>
				<!-- /search & aside toggle -->
			</div>
		</div>
		<!-- /Main Nav -->

		<!-- Aside Nav -->
		<div id="nav-aside">
			<!-- nav -->
			<div class="section-row">
				<ul class="nav-aside-menu">
					<li><a href="index.html">Home</a></li>
					<li><a href="about.html">About Us</a></li>
					<li><a href="#') }}">Join Us</a></li>
					<li><a href="#') }}">Advertisement</a></li>
					<li><a href="contact.html">Contacts</a></li>
				</ul>
			</div>
			<!-- /nav -->

			<!-- widget posts -->
			<div class="section-row">
				<h3>Recent Posts</h3>
				<div class="post post-widget">
					<a class="post-img" href="blog-post.html"><img src="{{ asset('img/widget-2.jpg') }}"></a>
					<div class="post-body">
						<h3 class="post-title"><a href="blog-post.html">Pagedraw UI Builder Turns Your Website Design Mockup Into Code Automatically</a></h3>
					</div>
				</div>

				<div class="post post-widget">
					<a class="post-img" href="blog-post.html"><img src="{{ asset('img/widget-3.jpg') }}"></a>
					<div class="post-body">
						<h3 class="post-title"><a href="blog-post.html">Why Node.js Is The Coolest Kid On The Backend Development Block!</a></h3>
					</div>
				</div>

				<div class="post post-widget">
					<a class="post-img" href="blog-post.html"><img src="{{ asset('img/widget-4.jpg') }}"></a>
					<div class="post-body">
						<h3 class="post-title"><a href="blog-post.html">Tell-A-Tool: Guide To Web Design And Development Tools</a></h3>
					</div>
				</div>
			</div>
			<!-- /widget posts -->

			<!-- social links -->
			<div class="section-row">
				<h3>Follow us</h3>
				<ul class="nav-aside-social">
					<li><a href="#"><i class="fa fa-facebook') }}"></i></a></li>
					<li><a href="#"><i class="fa fa-twitter') }}"></i></a></li>
					<li><a href="#"><i class="fa fa-google-plus') }}"></i></a></li>
					<li><a href="#"><i class="fa fa-pinterest') }}"></i></a></li>
				</ul>
			</div>
			<!-- /social links -->

			<!-- aside nav close -->
			<button class="nav-aside-close"><i class="fa fa-times"></i></button>
			<!-- /aside nav close -->
		</div>
		<!-- Aside Nav -->
	</div>
	<!-- /Nav -->
</header>
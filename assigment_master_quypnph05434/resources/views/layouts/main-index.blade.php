<!DOCTYPE html>
<html lang="en">
	<head>
		<title>@yield('title')</title>
		
		@include('_share.index.assets-css')

    </head>
	<body>

		<!-- Header -->
		@include('_share.index.header')
		<!-- /Header -->

		<!-- section -->
		@yield('content')
		<!-- /section -->

		<!-- Footer -->
		@include('_share.index.footer')
		<!-- /Footer -->

		<!-- jQuery Plugins -->
		@include('_share.index.assets-js', ['some' => 'data'])
		@yield('js')
	</body>
</html>

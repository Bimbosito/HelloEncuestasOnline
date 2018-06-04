<!DOCTYPE html>
<html>
<head>
	<title>@yield('title','Main')</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.css')}}">

</head>
<body>
	<!-- Menú de navegación -->
		@include('Home.template.nav')
	 <section>
   	@yield('content')
   </section>

</body>
</html>
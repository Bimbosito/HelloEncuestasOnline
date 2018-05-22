
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>@yield('title','Encuestas')</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('plugins/bootstrap/css/bootstrap.css') }}">
</head>
<body>
	@include('Encuestas.template.nav')
   <section>
   	@yield('content')
   </section>
   <script type="{{ asset('plugins/bootstrap/js/bootstrap.js') }}"></script>
    <script type="{{ asset('plugins/bootstrap/js/bootstrap.min.js') }}"></script>
   <script type="{{ asset('plugins/jquery/jquery.js') }}"></script>
</body>
</html>
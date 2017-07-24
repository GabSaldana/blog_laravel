<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Panel de administrador</title>
	<!-- los yield son de blade y sirven ara colocar contenido dentro de la plantilla
	de la vista-->
	<!-- Bootstrap core CSS -->
    <!--link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"-->
    <link href="{{ asset('plugins/bootstrap/css/bootstrap.css') }}" rel="stylesheet">
	<!-- Custom styles for this template -->
    <link href="{{ asset('css/general.css') }}" rel="stylesheet">
    <!--Flash notifications-->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <!--Font Awesome icons-->
    <script src="https://use.fontawesome.com/3c4bc4c435.js"></script>
	
</head>
<body>	
	
	@include('admin.template.partials.nav')
	<section>
		<div class="page-header" 
		style="background-color:#009688; color:white; margin-top:30px;" >
  			<h3>@yield('title','Default')</h>
		</div>
		<div class="panel-body">
			@include('flash::message')
			@yield('content')
		</div>
	</section>

	<!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!--script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script-->
    <script src="{{ asset('plugins/jquery/jquery-3.1.1.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.js') }}"></script>
    <!--script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script-->
</body>
</html>

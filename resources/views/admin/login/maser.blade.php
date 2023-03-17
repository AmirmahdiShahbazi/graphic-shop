<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <link rel="stylesheet" href="/login/css/style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">


</head>

<!-- partial:index.partial.html -->
<script src="https://code.jquery.com/jquery-2.1.0.min.js" ></script>
<body>

<form action="{{route('admin.login')}}" method="POST">
@csrf
<div id="formWrapper">



<div id="form" >
	@if ($errors->any())
	<div class="alert alert-danger" style="margin: 5px;">
		<ul>
			@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
	@endif



	@if(session('success'))
	<div style="margin-right: 300px;margin-left: 50px;" class="alert alert-success">{{session('success')}}</div>
	@endif
	@if(session('failed'))
		<div class="alert alert-danger">{{session('failed')}}</div>
	@endif



	
<div class="logo">
<p style="font-weight: 700;color:rgb(111, 111, 111)">Admin-panel</p>
</div>
		<div class="form-item">
			<p class="formLabel">Email</p>
			<input type="email" name="email" id="email" class="form-style"/>
		</div>
		<div class="form-item">
			<p class="formLabel">Password</p>
			<input type="password" name="password" id="password" class="form-style" />
			<!-- <div class="pw-view"><i class="fa fa-eye"></i></div> -->				
		</div>
		<div class="form-item">
		<input type="submit" class="login pull-right" value="Log In">
		<div class="clear-fix"></div>
		</div>
</div>

</div>
</form>

<!-- partial -->
  <script  src="/login/js/script.js"></script>

</body>
</html>

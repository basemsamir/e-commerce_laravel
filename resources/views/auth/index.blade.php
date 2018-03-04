@extends('layouts.master')


@section('breadcrumb')
<div class="products-breadcrumb">
		<div class="container">
			<ul>
				<li><i class="fa fa-home" aria-hidden="true"></i><a href="{{ route('home') }}">Home</a><span>|</span></li>
				<li>Sign In & Sign Up</li>
			</ul>
		</div>
</div>
@stop


@section('content')
<div class="w3_login">
	<h3>Sign In &amp; Sign Up</h3>
<!---728x90--->
	<div class="w3_login_module">
		<div class="module form-module">
		  <div class="toggle"><i class="fa fa-times fa-pencil"></i>
			<div class="tooltip">Click Me</div>
		  </div>
			@if(old('register'))
			<div class="form">
			<h2>Create an account</h2>
			<form action="{{ route('register')}}" method="post">
				{{ csrf_field() }}
				<input type="text" name="name" placeholder="Name" value="{{old('name')}}" required=" ">
				@if($errors->has('name'))
					<span style="color:red">* {{$errors->first('name')}}</span>
				@endif
				<input type="password" name="password" placeholder="Password" required=" ">
				@if($errors->has('password'))
					<span style="color:red">* {{$errors->first('password')}}</span>
				@endif
				<input type="email" name="email" placeholder="Email Address" value="{{ old('email') }}" required=" ">
				@if($errors->has('email'))
					<span style="color:red">* {{$errors->first('email')}}</span>
				@endif
				<input type="text" name="phone" placeholder="Phone Number" value="{{ old('phone') }}" required=" ">
				@if($errors->has('phone'))
					<span style="color:red">* {{$errors->first('phone')}}</span>
				@endif
				<input type="hidden" name="register" value="true">
				<input type="submit" value="Register">
			</form>
			</div>
			<div class="form">
			<h2>Login to your account</h2>
				<form action="{{ route('login')}}" method="post">
					{{ csrf_field() }}
					@if($errors->has('name') || $errors->has('password'))
						<span style="color:red">* {{$errors->first('name')}}</span>
					@endif
				  <input type="text" name="name" placeholder="Username" required=" ">
				  <input type="password" name="password" placeholder="Password" required=" ">
					<input type="hidden" name="login" value="">
				  <input type="submit" value="Login">
				</form>
		  </div>
			@elseif(old('login') || 1==1)
			<div class="form">
			<h2>Login to your account</h2>
				<form action="{{ route('login')}}" method="post">
					{{ csrf_field() }}

					@if($errors->has('name') || $errors->has('password'))
						<span style="color:red">* {{$errors->first('name')}}</span>
					@endif
				  <input type="text" name="name" placeholder="Username" required=" ">
				  <input type="password" name="password" placeholder="Password" required=" ">
					<input type="hidden" name="login" value="">
				  <input type="submit" value="Login">
				</form>
		  </div>
			<div class="form">
			<h2>Create an account</h2>
			<form action="{{ route('register')}}" method="post">
				{{ csrf_field() }}
				<input type="text" name="name" placeholder="Username" required=" ">
				@if($errors->has('name'))
					<span>{{$errors->first('name')}}</span>
				@endif
				<input type="password" name="password" placeholder="Password" required=" ">
				@if($errors->has('password'))
					<span>{{$errors->first('password')}}</span>
				@endif
				<input type="email" name="email" placeholder="Email Address" required=" ">
				@if($errors->has('email'))
					<span>{{$errors->first('email')}}</span>
				@endif
				<input type="text" name="phone" placeholder="Phone Number" required=" ">
				@if($errors->has('phone'))
					<span>{{$errors->first('phone')}}</span>
				@endif
				<input type="hidden" name="register" value="true">
				<input type="submit" value="Register">
			</form>
			</div>
		  @endif
		</div>
	</div>
	<script>
		$('.toggle').click(function(){
		  // Switches the Icon
		  $(this).children('i').toggleClass('fa-pencil');
		  // Switches the forms
		  $('.form').animate({
			height: "toggle",
			'padding-top': 'toggle',
			'padding-bottom': 'toggle',
			opacity: "toggle"
		  }, "slow");
		});
	</script>
</div>
@stop

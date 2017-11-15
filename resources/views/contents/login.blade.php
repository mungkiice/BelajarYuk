@extends('layouts.master')
@section('content')
<div class="fh5co-blog-style-1">
	<div class="container">
		<div class="main-agileits" style="background-image: url(images/full_1.jpg);">
			<div class="mainw3-agileinfo form">
				<div id="login">    
					<form action="#" method="post"> 
						<div class="field-wrap">
							<label> Enter Your Email<span class="req">*</span> </label>
							<input type="email"required autocomplete="off"/>
						</div> 
						<div class="field-wrap">
							<label> Your Password<span class="req">*</span> </label>
							<input type="password"required autocomplete="off"/>
						</div> 
						<p class="forgot"><a href="#">Forgot Password?</a></p> 
						<button class="button button-block"/>Log In</button> 
					</form> 
				</div>
			</div>
		</div>
	</div>
</div>
<form-login></form-login>
@endsection
<template>
	<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header" align="center">
					<a href="#home" id="gambarlogo"><img src="/images/Logo.png" alt="logo" height="50px"></a>	
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
					</button>
				</div>

				<!-- Begin # DIV Form -->
				<div id="div-forms">

					<!-- Begin # Login Form -->
					<form id="login-form">
						<div class="modal-body">
							<div id="div-lost-msg">
								<div id="icon-lost-msg" class="glyphicon glyphicon-chevron-right"></div>
								<span id="text-lost-msg">Login</span>
							</div>
							<div class="input-field col s12">
								<select class="form-control" v-model="loginAsPengajar">
									<option value="1" selected >Saya Pelajar</option>
									<option value="2">Saya Pengajar</option>
								</select>
							</div>
							<input id="login_username" v-model="email" class="form-control" type="text" placeholder="Email" required>
							<input id="login_password" v-model="password" class="form-control" type="password" placeholder="Password" required>
							<div class="checkbox">
								<label></label>
							</div>
						</div>
						<div class="modal-footer">
							<div>
								<button type="submit" class="btn btn-primary btn-lg btn-block" @click.prevent="login" style="margin-top: -40px;">Login</button>
							</div>
							<p>
								<input type="checkbox" id="test5" />
								<label for="test5">Ingat Akun Saya</label>
							</p>
							<div>
								<button id="login_lost_btn" type="button" class="btn btn-link" style="margin-top: -20px;"><p>Lupa Password</p></button>
								<button id="login_register_btn" type="button" class="btn btn-link" style="margin-top: -20px;"><p>Register</p></button>
							</div>
						</div>
					</form>
					<!-- End # Login Form -->

					<!-- Begin | Lost Password Form -->
					<form id="lost-form" style="display:none;">
						<div class="modal-body">
							<div id="div-lost-msg">
								<div id="icon-lost-msg" class="glyphicon glyphicon-chevron-right"></div>
								<span id="text-lost-msg">Type your e-mail.</span>
							</div>
							<input id="lost_email" class="form-control" type="text" placeholder="E-Mail (type ERROR for error effect)" required>
						</div>
						<div class="modal-footer">
							<div>
								<button type="submit" class="btn btn-primary btn-lg btn-block">Send</button>
							</div>
							<div>
								<button id="lost_login_btn" type="button" class="btn btn-link"><p>Login</p></button>
								<button id="lost_register_btn" type="button" class="btn btn-link"><p>Register</p></button>
							</div>
						</div>
					</form>
					<!-- End | Lost Password Form -->

					<!-- Begin | Register Form -->
					<form id="register-form" style="display:none;">
						<div class="modal-body">
							<div id="div-register-msg">
								<div id="icon-register-msg" class="glyphicon glyphicon-chevron-right"></div>
								<span id="text-register-msg">Register an account.</span>
							</div>
							<input id="register_username" class="form-control" type="text" placeholder="Username (type ERROR for error effect)" required>
							<input id="register_email" class="form-control" type="text" placeholder="E-Mail" required>
							<input id="register_password" class="form-control" type="password" placeholder="Password" required>
						</div>
						<div class="modal-footer">
							<div>
								<button type="submit" class="btn btn-primary btn-lg btn-block">Register</button>
							</div>
							<div>
								<button id="register_login_btn" type="button" class="btn btn-link"><p>Login</p></button>
								<button id="register_lost_btn" type="button" class="btn btn-link"><p>Lupa Password</p></button>
							</div>
						</div>
					</form>
					<!-- End | Register Form -->
				</div>
				<!-- End # DIV Form -->
			</div>
		</div>
	</div>
</template>
<script>
export default{
	data(){
		return{
			'email' : '',
			'password' : '',
			'loginAsPengajar' : 1,
			'loginUrl': '',
			'count' : 0,
		};
	},
	watch:{
		loginAsPengajar(){
			this.loginUrl = this.loginAsPengajar == 2 ? '/pengajar': '/user';
		}
	},
	methods:{
		login(){
			let formData = new FormData();
			formData.append('email', this.email);
			formData.append('password', this.password);
			axios.post(this.loginUrl + '/login', formData)
			.then(success => {
				$('#login-modal').modal('hide');
				window.location = '/berita';
			},
			error => {
				console.log(error.data);
			});
		}
	}
}
</script>
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
				<div id="div-forms" style="height:auto">

					<!-- Begin # Login Form -->
					<form id="login-form">
						<div class="modal-body">
							<div id="div-lost-msg">
								<div id="icon-lost-msg" class="glyphicon glyphicon-chevron-right"></div>
								<span id="text-lost-msg">Login</span>
							</div>
							<p>
								<input name="group2" type="radio" id="test1" value="1" v-model="loginAsPengajar" />
								<label for="test1">Saya Seorang Pelajar</label>
								<input name="group2" type="radio" id="test2" value="2" v-model="loginAsPengajar" />
								<label for="test2">Saya Seorang Pengajar</label>
							</p>
							<input id="login_username" v-model="email" class="form-control" type="text" placeholder="Email" required>
							<input id="login_password" v-model="password" class="form-control" type="password" placeholder="Password" required>
						</div>
						<div class="modal-footer">
							<div>
								<button type="submit" class="btn btn-primary btn-lg btn-block" @click.prevent="login">Login</button>
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
							<input id="lost_email" class="form-control" type="text" placeholder="" required>
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
							<input id="register_username" class="form-control" type="text" placeholder="Nama Lengkap" v-model="nama" required>
							<input id="register_email" class="form-control" type="text" placeholder="E-Mail" v-model="email" required>
							<input id="register_password" class="form-control" type="password" placeholder="Password" v-model="password" required>
							<input id="register_password_confirmation" class="form-control" type="password" placeholder="Password Confirmation" v-model="password_confirmation" required>
							<p>
								<input name="group1" type="radio" id="test3" value="Laki-Laki" v-model="gender" />
								<label for="test1">Laki=Laki</label>
								<input name="group1" type="radio" id="test4" value="Perempuan" v-model="gender" />
								<label for="test2">Perempuan</label>
							</p>
							<input id="register_no_telp" class="form-control" type="number" placeholder="No Telp" v-model="no_telp" required>
							<textarea class="materialize-textarea" placeholder="Alamat" v-model="alamat" required></textarea>
						</div>
						<div class="modal-footer">
							<div>
								<button type="submit" class="btn btn-primary btn-lg btn-block" @click.prevent="register">Register</button>
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
			nama : '',
			gender : '',
			no_telp : '',
			alamat : '',
			email : '',
			password : '',
			password_confirmation:'',	
			loginAsPengajar : 1,
			loginUrl: '/user',
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
		},
		register(){
			let formData = new FormData();
			formData.append('nama', this.email);
			formData.append('email', this.email);
			formData.append('password', this.password);
			formData.append('gender', this.gender);
			formData.append('alamat', this.alamat);
			formData.append('no_telp', this.no_telp);
			axios.post('user/register', formData)
			.then(success => {
				$('#login-modal').modal('hide');
				window.location = '/home';
			},
			error => {
				console.log(error.data);
			});
		}
	}
}
</script>
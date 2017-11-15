<template>
	<nav class="fh5co-nav-style-1" role="navigation" data-offcanvass-position="fh5co-offcanvass-left">
		<div class="container">
        <!-- <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 fh5co-logo">
            <a href="#" class="js-fh5co-mobile-toggle fh5co-nav-toggle"><i></i></a>
            <a href="#">Voltage</a>
        </div> -->
        <div class="col-lg-5 col-md-5 col-sm-5 fh5co-link-wrap">
        	<ul data-offcanvass="yes">
        		<li class="active"><a href="/home">Belajar</a></li>
        		<li><a href="/diskusi">Diskusi</a></li>
        		<li><a href="/kampanye">Donasi</a></li>
        		<li><a href="/kegiatan">Kesini</a></li>
        		<li><a href="/berita">Berita Pendidikan</a></li>
        	</ul>
        </div> 
        <div class="col-lg-0 col-md-2 col-sm-5 text-center fh5co-link-wrap">
        	<ul data-offcanvass="yes">
        		<a href="/home" id="gambarlogo"><img src="/images/Logo.png" alt="logo" height="50px"></a>                    
        	</ul>
        </div> 
        <div class="col-lg-5 col-md-5 col-sm-5 text-right fh5co-link-wrap">
        	<ul class="fh5co-special" data-offcanvass="yes">
        		<!-- <li><a href="#">Tentang Kami</a></li> -->
        		<!-- <li><a href="#">Bantuan</a></li> -->
        		<div v-if="loggedIn">
        			<li><a href="" v-text="userLoggedIn.nama"></a></li>
        			<li>
        				<a href="#"
        				@click.prevent="logout">
        				Logout
        			</a>

        			<form id="logout-form" :action="actionLogout" method="POST" style="display: none;">
                        window.App.crsf_token         
                    </form>
        		</li>
        	</div>
        	<li v-else><a href="#" class="call-to-action" data-toggle="modal" data-target="#login-modal" id="login">Login</a></li>
        </ul>
    </div>
</div>
</nav>
</template>
<script>
export default{
	computed:{
		loggedIn(){
			return window.App.pengajarSignedIn || window.App.userSignedIn;
		},
		userLoggedIn(){
			return window.App.user || window.App.pengajar;
		},
		actionLogout(){
			if (window.App.userSignedIn) {
				return 'user/logout';
			}
			else if(window.App.pengajarSignedIn){
				return 'pengajar/logout';
			}
		}
	},
	methods:{
		logout(){
			this.$el.querySelector('#logout-form').submit();
		},

	}
}
</script>
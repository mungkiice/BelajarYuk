<style type="text/css">
.img-utama{
	width: 200px;
	height: 200px;
}
</style>
<template>
	<div class="fh5co-blog-style-1">
		<div class="container">
			<h2>My Profile</h2>
			<div class="row"></div>
			<div class="col-md-3">
				<div class="row" id="profil">
					<center><img :src="dataProfile.foto" class="img-circle img-utama"></center>
					<p id="profil-nama" v-text="dataProfile.nama"></p>
					<hr width="90%" align="center">
					<p id="profil-ket">Alamat</p>
					<p v-text="dataProfile.alamat"></p>
					<hr width="90%" align="center">
					<p id="profil-ket">Jenis Kelamin</p>
					<p v-text="dataProfile.gender"></p>
					<hr width="90%" align="center">
					<p id="profil-ket">No. Telp</p>
					<p v-text="dataProfile.no_telp"></p>
					<hr width="90%" align="center">
				</div>
			</div>
			<div class="col-md-9" id="profil">
				<p id="profil-status" v-text="dataProfile.nama + ' - ' + status"></p>
				<p v-text="dataProfile.email"><span class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span></p>
				<hr width="100%" align="center">
				<div class="row">
					<div class="col-md-3">
						<p><span class="glyphicon glyphicon-question-sign" aria-hidden="true"></span><span v-text="' Bertanya '+countPertanyaaan+'x'"></span></p>
					</div>
					<div class="col-md-3">
						<p><span class="glyphicon glyphicon-comment" aria-hidden="true"></span><span v-text="' Menjawab '+countJawaban+'x'"></span></p>
					</div>
					<div class="col-md-6">
						<a href="" @click.prevent=""><p><span class="glyphicon glyphicon-flag" aria-hidden="true"></span> Report</p></a>
					</div>
				</div>
			</div>

			<div class="col-md-9" id="profil">
				<p>Aktivitas Terakhir...</p>
				<div class="tab-content">
					<activity v-for="(aktivitas, index) in showedAktivitas" :key="aktivitas.id" :data="aktivitas" :actor="[dataProfile.id, dataProfile.nama]"></activity>
				</div>
			</div>
		</div>
	</div>
</template>
<script>
import Activity from '../components/Activity.vue';
export default{
	components:{Activity},
	data(){
		return{
			dataProfile: false,
			dataPertanyaan: false,
			dataJawaban: false,
			dataAktivitas : false,
			array : false,	
		};
	},
	created(){
		this.array = location.pathname.split('/');
		this.fetch();
	},
	computed:{
		showedAktivitas(){
			return this.dataAktivitas;
		},
		status(){
			return this.dataProfile.pendidikan_terakhir ? 'Pengajar' : 'Pelajar';
		},
		countPertanyaaan(){
			return this.dataPertanyaan.length;
		},
		countJawaban(){
			return this.dataJawaban.length;
		}
	},
	methods:{
		fetch(){
			if (window.App.userSignedIn) {
				axios.get('/api/v1/users/'+this.array[2]).then((response) => {
					this.dataProfile = response.data;
					this.dataJawaban = this.dataProfile.jawaban.data;
					this.dataPertanyaan = this.dataProfile.pertanyaan.data;
					this.dataAktivitas = this.dataProfile.aktivitas.data;
				});
			}else if (window.App.pengajarSignedIn){
				axios.get('/api/v1/pengajar/myprofile/'+this.array).then((response) => {
					this.dataProfile = response.data;
					this.dataJawaban = this.dataProfile.jawaban.data;
					this.dataPertanyaan = this.dataProfile.pertanyaan.data;
					this.dataAktivitas = this.dataProfile.aktivitas.data;
				});
			}else{
				axios.get('/api/v1/users/'+this.array[2]).then((response) => {
					this.dataProfile = response.data;
					this.dataJawaban = this.dataProfile.jawaban.data;
					this.dataPertanyaan = this.dataProfile.pertanyaan.data;
					this.dataAktivitas = this.dataProfile.aktivitas.data;
				});
			}
		}
	}
}
</script>
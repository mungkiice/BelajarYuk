<style>
.input-judul{
	font-size: 32px;

}
.div-bottom{
	margin-top: 20px;
}
</style>
<template>
	<div>
		<div class="fh5co-blog-style-1">
			<div class="container">
				<div class="col-md-2"></div>
				<div class="col-md-8" id="kontenDiskusi">
					<form >
						<p>Judul Pertanyaan</p>
						<!-- <input type="text" name="" class="form-control input-judul"> -->
						<textarea class="form-control" rows="1" v-model="judul"></textarea>
						<p>Isi Pertanyaan</p>
						<textarea class="form-control" rows="10" v-model="konten"></textarea>
						<span>Upload file gambar jika perlu</span>
						<input type="file" name="foto" @change="onFileChange">
						<div class="row div-bottom">
							<div class="col-sm-7">
								<select class="form-control select-kategori" v-model="pelajaran_id">
									<option value="" disabled selected>Mata Pelajaran</option>
									<option v-for="pelajaran in pelajarans" :value="pelajaran.id" v-text="pelajaran.nama"></option>
								</select>
							</div>
							<div class="col-sm-5" id="tbDiskusi">
								<button type="submit" class="dropdown-button btn" id="tombolTanya" @click="postPertanyaan">Diskusikan!</button>
							</div>	
						</div>				
					</form>
				</div>
			</div>
		</div>
		<div class="fixed-action-btn horizontal click-to-toggle">
			<a class="btn-floating btn-large red">
				<i class="material-icons">menu</i>
			</a>
			<ul>
				<li><a class="btn-floating red"><i class="material-icons">insert_chart</i></a></li>
				<li><a class="btn-floating yellow darken-1"><i class="material-icons">format_quote</i></a></li>
				<li><a class="btn-floating green"><i class="material-icons">publish</i></a></li>
				<li><a class="btn-floating blue"><i class="material-icons">attach_file</i></a></li>
			</ul>
		</div>
	</div>
</template>
<script>
export default{
	data(){
		return{
			pelajarans: false,
			pelajaran_id:'',
			judul:'',
			konten:'',
			foto:'',
		};
	},
	created(){
		this.fetchPelajaran();
	},
	methods:{
		fetchPelajaran(){
			axios.get('/api/v1/pelajaran').then(this.refresh);
		},
		postPertanyaan(){
			let formData = new FormData();
			formData.append('judul', this.judul);
			formData.append('konten', this.konten);
			formData.append('pelajaran_id', this.pelajaran_id);
			formData.append('foto', this.foto);
			axios.post('/api/v1/pertanyaan', formData)
			.then(
				success => {
					// this.$router.router.go('/welcome');
					// axios.get('/welcome');
					window.location = '/diskusi';
				}, 
				error => {
					console.log(error.data);
				});
		},
		onFileChange(e){
			let files = e.target.files || e.dataTransfer.files;
			this.foto = files[0];
		},	
		refresh({data}){
			this.pelajarans = data.data;
		}
	}
}
</script>
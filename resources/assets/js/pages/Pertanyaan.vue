<template>
	<div class="fh5co-blog-style-1">
		<div class="container">
			<h2 class="fh5co-heading wow fadeInUp" data-wow-duration="1s" data-wow-delay=".5s" id="judul" v-text="pertanyaan.judul"></h2>
			<div class="row">
				<div class="col-md-8 wow fadeInUp" data-wow-duration="1s" data-wow-delay="1s" id="tentangKampanye">
					<div class="row" id="kontenDiskusi1">
						<div class="col-md-2" id="potoDiskusi">
							<img :src="user.foto" class="img-circle"> 
							<center><a href="" id="penanya" v-text="user.nama"></a></center>
						</div>
						<div class="col-md-10" id="pertanyaanDiskusi">
							<a href="" v-text="pertanyaan.pelajaran"></a>
							<p v-text="pertanyaan.konten"></p>
							<button type="button" class="btn btn-default btn-xs" id="tombolJawab"><p>Report</p></button>
						</div>
					</div>
					<div class="row" id="kontenJawaban">
						<p>Jawaban yang lain</p>
						<jawaban v-for="jawaban in jawabans" :key="jawaban.id" :data="jawaban"></jawaban>
					</div>				
					<form-jawaban></form-jawaban>
					<!-- <hr width="90%" align="center">  -->
				</div>

				<div class="col-md-4" id="sebelah">
					<p class="fh5co-heading wow fadeInUp" data-wow-duration="1s" data-wow-delay=".5s" id="hasilKumpul">Pertanyaan Lainnya</p>
					<pertanyaan-sebelah v-for="pertanyaan in pertanyaanLain" :key="pertanyaan.id" :data="pertanyaan"></pertanyaan-sebelah>
				</div>
			</div>
		</div>
	</div>
</template>
<script>
import Jawaban from '../components/Jawaban.vue';
import PertanyaanSebelah from '../components/PertanyaanSideBar.vue';
import FormJawaban from '../components/Formjawaban.vue';
// import collection from '../mixins/Collection.js';
export default{
	components:{Jawaban, PertanyaanSebelah, FormJawaban},
	// mixins:[collection],
	data(){
		return{
			pertanyaan : false,
			jawabans:false,
			array:false,
			pertanyaanLain:false,
			user:false,
		};
	},
	created(){
		this.array = location.pathname.split('/');
		this.fetchData();
	},
	methods:{
		fetchData(){
			this.fetchPertanyaan();
			this.fetchJawaban();
			this.fetchPertanyaanLain();
		},
		fetchPertanyaan(){
			axios.get('/api/v1/pertanyaan/' + this.array[2] + '/' + this.array[3]).then(this.savePertanyaan);
		},
		fetchPertanyaanLain(){
			axios.get('/api/v1/pertanyaan/' + this.array[2]).then(this.savePertanyaanLain);
		},
		fetchJawaban(){
			axios.get('/api/v1/pertanyaan/' + this.array[3] + '/jawaban').then(this.saveJawaban);
		},
		savePertanyaan({data}){
			this.pertanyaan = data;
			this.user = data.user;
		},
		savePertanyaanLain({data}){
			this.pertanyaanLain = data.data;
		},
		saveJawaban({data}){
			this.jawabans = data.data;
		}
	}
}
</script>
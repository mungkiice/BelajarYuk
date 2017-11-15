<template>
	<div class="fh5co-blog-style-1">
		<div class="container">

			<h2 class="wow fadeInUp" data-wow-duration="1s" data-wow-delay=".5s">Cari Gurumu Disini!</h2>
			<div class="row"></div>
			<div class="col-md-3">
				<p class="fh5co-heading wow fadeInUp" data-wow-duration="1s" data-wow-delay=".5s" id="hasilKumpul" style="font-size: large; margin-bottom: -5px;">Kategori Mata Pelajaran</p>
				<div class="collection wow fadeInUp" data-wow-duration="1s" data-wow-delay=".8s">
					<a href="#!" @click.prevent="fetchDataPengajar(false, 1)" :class="isSelected(false)" >Semua</a>
					<a href="#!" v-for="pelajaran in pelajarans" :class="isSelected(pelajaran.nama)"  :key="pelajaran.id" 
					@click.prevent="fetchDataPengajar(pelajaran.nama, 1)" v-text="pelajaran.nama"></a>
				</div>
				<br>
				<!-- <p class="fh5co-heading wow fadeInUp" data-wow-duration="1s" data-wow-delay=".5s" id="hasilKumpul" style="font-size: large; margin-bottom: -5px; margin-top: -10px;">Mata Pelajaran Populer</p>
				<div class="collection wow fadeInUp" data-wow-duration="1s" data-wow-delay=".8s">
					<a href="#!" class="collection-item">Fisika Kelas ...</a>
					<a href="#!" class="collection-item">Kimia Kelas ...</a>
					<a href="#!" class="collection-item">Biologi Kelas ...</a>
				</div> -->

			</div>
			<div class="col-md-9">
				<pengajar v-for="(pengajar, indeks) in pengajars" :key="pengajar.id" :data="pengajar"></pengajar>
				<paginator :dataSet="dataSet" @changed="refetchDataPengajar"></paginator>
			</div>
		</div>
	</div>
</template>
<script>
import Pengajar from '../components/Pengajar.vue';
export default{
	components:{Pengajar},
	data(){
		return{
			pengajars:false,
			pelajarans:false,
			currentPelajaran:false,
			dataSet:false,
		}
	},
	computed:{
		activePelajaran(){
			if(!currentPelajaran){
				return 'Semua Pelajaran';
			}else{
				return currentPelajaran;
			}
		}
	},
	created(){
		this.fetchData();
	},
	methods:{
		isSelected(selected){
			return [
				'collection-item',
				this.currentPelajaran == selected ? 'active' : null,
			];
		},
		fetchData(){
			this.fetchDataPelajaran();
			this.fetchDataPengajar();
		},
		fetchDataPengajar(pelajaran, page){
			axios.get(this.url(pelajaran, page)).then((response) => {
				this.pengajars = response.data.data;
				this.dataSet = response.data;
				window.scrollTo(0,0);
			});
		},
		refetchDataPengajar(page){
			this.fetchDataPengajar(this.currentPelajaran, page);
		},
		fetchDataPelajaran(){
			axios.get('/api/v1/pelajaran').then((response) => {
				this.pelajarans = response.data.data;
			});
		},
		url(pelajaran, page){
			if(!page){
				let query = location.search.match(/page=(\d+)/);
				page = query ? query[1] : 1;
			}
			if(!pelajaran){
				this.currentPelajaran = false;
				return 'api/v1/pengajar?page='+page;
			}else{
				this.currentPelajaran = pelajaran;
				return 'api/v1/pengajar/'+pelajaran+'/?page='+page;
			}
		},
	}
}
</script>
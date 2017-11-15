<template>
	<div class="fh5co-blog-style-1">
		<div class="container">
			<div class="col-md-10">
				<h2 class="fh5co-heading wow fadeInUp" data-wow-duration="1s" data-wow-delay=".5s">Bingung? Diskusiin aja Disini!</h2>
			</div>
			<div class="col-md-2">
				<a class="btn btn-default" id="tombolJawab" href="/bertanya">Yuk Bertanya!</a>
			</div>
			<div class="row">
				<div class="col-md-8" id="tentangKampanye">
					<div class="tab-content wow fadeInUp" data-wow-duration="1s" data-wow-delay=".7s">
						<p class="fh5co-heading wow fadeInUp" data-wow-duration="1s" data-wow-delay=".5s" id="hasilKumpul" v-text="activePelajaran"></p>
						<hr width="100%" align="center">
						<pertanyaan v-for="(pertanyaan, index) in items" :key="pertanyaan.id" :data="pertanyaan"></pertanyaan>
					</div>
					<paginator :dataSet="dataSet" @changed="refetchPertanyaan"></paginator>
				</div>
				<div class="col-md-4 wow fadeInUp" data-wow-duration="1s" data-wow-delay=".8s" id="tentangProgres">
					<p class="fh5co-heading wow fadeInUp" data-wow-duration="1s" data-wow-delay=".5s" id="hasilKumpul">Kategori Mata Pelajaran</p>
					<div class="collection">
						<a href="#!" :class="isSelected(false)" @click.prevent="fetchPertanyaan(false, 1)">Semua</a>
						<a href="#!"  v-for="pelajaran in pelajarans" :class="isSelected(pelajaran.nama)" :key="pelajaran.id" @click.prevent="fetchPertanyaan(pelajaran.nama, 1)" v-text="pelajaran.nama"></a>
					</div>
					<br>
					      <!-- <p class="fh5co-heading wow fadeInUp" data-wow-duration="1s" data-wow-delay=".5s" id="hasilKumpul">Mata Pelajaran Poluper</p>
						  <div class="collection">
					        <a href="#!" class="collection-item">Fisika Kelas ...</a>
					        <a href="#!" class="collection-item">Kimia Kelas ...</a>
					        <a href="#!" class="collection-item">Biologi Kelas ...</a>
					    </div> -->
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</template>
<script>
import Pertanyaan from '../components/Pertanyaan.vue';
export default{
	components:{Pertanyaan},
	data(){
		return{
			dataSet : false,
			items:false,
			pelajarans:false,
			currentPelajaran:false,
		};
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
		this.fetchPertanyaan();
		this.fetchPelajaran();
	},
	computed:{
		activePelajaran(){
			return this.currentPelajaran ? this.currentPelajaran : 'Semua Pelajaran';
		}
	},
	methods:{
		isSelected(selected){
			return [
				'collection-item',
				this.currentPelajaran == selected ? 'active' : null,
			];
		},
		fetchPelajaran(){
			axios.get('api/v1/pelajaran').then(this.refreshPelajaran);
		},
		refreshPelajaran({data}){
			this.pelajarans = data.data;
		},
		fetchPertanyaan(pelajaran, page){
			axios.get(this.url(pelajaran, page)).then(this.refresh);
		},
		refetchPertanyaan(page){
			this.fetchPertanyaan(this.currentPelajaran, page);
		},
		url(pelajaran, page){
			if(!page){
				let query = location.search.match(/page=(\d+)/);
				page = query ? query[1] : 1;
			}
			if(!pelajaran){
				this.currentPelajaran = false;
				return 'api/v1/pertanyaan?page='+page;
			}else{
				this.currentPelajaran = pelajaran;
				return 'api/v1/pertanyaan/'+pelajaran+'/?page='+page;
			}
		},
		refresh({data}){
			this.dataSet = data;
			this.items = data.data;
			window.scrollTo(0, 0);
		},
	}
}
</script>
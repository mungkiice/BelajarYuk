<template>
	<div class="fh5co-blog-style-1">
		<div class="container">
			<div class="row p-b">
				<div class="col-md-6 col-md-offset-3 text-center">
					<h2 class="fh5co-heading wow fadeInUp" data-wow-duration="1s" data-wow-delay=".5s">Baca Yuk</h2>
					<p class="wow fadeInUp" data-wow-duration="1s" data-wow-delay=".8s">Kami sajikan berita - berita aktual dan terkini seputar pendidikan</p>
				</div>
			</div>
			<div class="row p-b">
				<div v-for="(berita, index) in items" :key="berita.id">
					<berita :data="berita"></berita>
					<div class="clearfix" v-if="enter(index)"></div>
				</div>
			</div>
			<paginator :dataSet="dataSet" @changed="fetch"></paginator>
		</div>
	</div>
</template>
<script>
import Berita from '../components/Berita.vue';
export default{
	components:{Berita},
	data(){
		return{
			dataSet : false,
			items : false,
		};
	},
	created(){
		this.fetch();
	},
	methods:{
		fetch(page){
			axios.get(this.url(page)).then(this.refresh);
		},
		url(page){
			if(!page){
				let query = location.search.match(/page=(\d+)/);
				page = query ? query[1] : 1;
			}
			return 'api/v1/berita?page='+page;
		},
		refresh({data}){
			this.dataSet = data;
			this.items = data.data;
			window.scrollTo(0, 0);
		},
		enter(param){
			var hasil = (param + 1) % 3;
			return (hasil != 0) ? false : true;
		},
	}
}
</script>
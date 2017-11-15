<template>
	<div class="fh5co-blog-style-1">
		<div class="container">
			<h2 class="fh5co-heading wow fadeInUp" data-wow-duration="1s" data-wow-delay=".5s" v-text="">Donasi untuk Bambang</h2>
			<div class="row">
				<div class="col-md-8" id="tentangKampanye">
					
					<div class="fh5co-post-image wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.7s">
						<div class="fh5co-overlay"></div>	
						<img src="" alt="Image" class="img-responsive">
					</div>
					<p class="cover-text-sublead wow fadeInUp" data-wow-duration="1s" data-wow-delay="1s" id="ketKampanye"><br>Ayo bantu pak Bambang dalam menjalankan hidup, karena beban hidupnya tidak kunjung selesai ia membutuhkan bantuan kita semua!</p>
				</div>
				<div class="col-md-4" id="tentangProgres">
					<p class="fh5co-heading wow fadeInUp" data-wow-duration="1s" data-wow-delay=".5s" id="hasilKumpul">Rp. 14.045.123</p>
					<p class="fh5co-heading wow fadeInUp" data-wow-duration="1s" data-wow-delay="1s" >Terkumpul dari target Rp. 100.000.000</p>
					<progress value="7.1" max="100" class="fh5co-heading wow fadeInUp" data-wow-duration="1s" data-wow-delay="1.2s" style="width: 100%;"></progress>
					<div class="row">
						<div class="col-xs-6">
							<p class="fh5co-heading wow fadeInUp" data-wow-duration="1s" data-wow-delay="1.5s" style="text-align: left;">7.1% Terkumpul</p>
						</div>
						<div class="col-xs-6">
							<p class="fh5co-heading wow fadeInUp" data-wow-duration="1s" data-wow-delay="1.5s" style="text-align: right;">14 hari lagi</p>
						</div>
					</div>
					<button type="button" class="btn btn-success wow fadeInUp" data-wow-duration="1s" data-wow-delay="2s" style="width: 100%;">Donasi Sekarang!</button>
				</div>
			</div>
		</div>
	</div>
</template>
<script>
export default{
	// data(){
	// 	return{
	// 		data : false,
	// 	};
	// },
	// created(){
	// 	axios.get('/api/kampanye').then(this.refresh);
	// },
	// methods:{
	// 	refresh({data}){
	// 		this.data = data;
	// 	}
	// }
}
</script>
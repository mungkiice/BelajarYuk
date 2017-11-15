<template>
	<div class="col-md-4 col-sm-6 col-xs-6 col-xxs-12">
		<div class="fh5co-post wow fadeInLeft"  data-wow-duration="1s" data-wow-delay="1.7s">
			<div class="fh5co-post-image">
				<div class="fh5co-overlay"></div>		
				<img :src="data.foto" alt="Image" class="img-responsive">
			</div>
			<div class="fh5co-post-text">
				<h3><a :href="'/kampanye/'+ data.id" v-text="data.judul"></a></h3>
				<p v-text="data.konten"></p>
			</div>
			<div class="fh5co-post-text">
				<hr>
				<p v-text="'Penggalang : ' + data.penggalang"></p>
				<p v-text="'Alamat : ' + data.alamat"></p>
				<p v-text="'No. Telp : ' + data.no_telp"></p>
				<!-- <center>
					<div class="col-sm-4">
						<a href=""><center>RP. 0<br>Terkumpul</center></a>
					</div>
					<div class="col-sm-4">
						<a href=""><center>0%<br>Tercapai</center></a>
					</div>
					<div class="col-sm-4">
						<a href=""><center>15 <br>Hari lagi</center></a>
					</div>
				</center> -->
			</div>
		</div>
	</div>
</template>
<script>
export default{
	props:['data'],
	computed:{

	},	
	methods:{
	}
}
</script>
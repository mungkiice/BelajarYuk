<template>
	<div class="col-md-4 col-sm-6 col-xs-6 col-xxs-12">
		<div class="fh5co-post wow fadeInLeft"  data-wow-duration="1s" data-wow-delay="1.1s">
			<div class="fh5co-post-image">
				<div class="fh5co-overlay"></div>
				<img :src="data.foto" alt="Image" class="img-responsive">
			</div>
			<div class="fh5co-post-text">
				<h3><a href="#" v-text="data.judul"></a></h3>
				<p v-text="data.konten"></p>
			</div>
			<div class="fh5co-post-meta">
				<a href="#"><i class="icon-clock2"></i><span v-text="data.created_at"></span></a>
			</div>
		</div>
	</div>
</template>
<script>
export default{
	props:['data'],
}
</script>
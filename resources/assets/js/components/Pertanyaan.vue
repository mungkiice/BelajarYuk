<style>

</style>
<template>
	<div class="row" id="kontenDiskusi">
		<div class="col-md-2" id="potoDiskusi">
			<img :src="data.user.foto" class="img-circle"> 
			<center><a href="" id="penanya" v-text="data.user.nama"></a></center>
		</div>
		<div class="col-md-10" id="pertanyaanDiskusi">
			<a :href="'/pertanyaan/' + data.pelajaran + '/' + data.id" v-text="data.judul"></a>
			
			<p v-text="data.konten"></p>
			<!-- <button type="button" class="btn btn-default btn-xs" id="tombolJawab"><p>Jawab</p></button> -->
		</div>
	</div>
</template>
<script>
export default{
	props:['data'],
}
</script>
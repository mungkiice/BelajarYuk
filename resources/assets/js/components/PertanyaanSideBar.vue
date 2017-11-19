<template>
	<div class="row" id="kontenDiskusi">
		<div class="col-md-3" id="potoPertanyaanLain">
			<img :src="data.user.foto" class="img-circle">
		</div>
		<div class="col-md-9" id="pertanyaanDiskusi">
			<a :href="'/profil/' + data.user.id" id="penanya" v-text="data.user.nama"></a>
			<a href="" v-text="data.judul"></a>
			<!-- <p v-text="data.konten"></p> -->
			<!-- <button type="button" class="btn btn-default btn-xs" id="tombolJawab"><p>Jawab</p></button> -->
		</div>
	</div>
</template>
<script>
export default{
	props:['data'],
}
</script>
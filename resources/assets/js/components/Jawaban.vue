<template>
	<div>
		<div class="col-md-2" id="potoDiskusi">
			<img :src="data.subject.foto" class="img-circle"> 
		</div>
		<div class="col-md-10" id="pertanyaanDiskusi">
			<a href="" id="penanya" v-text="data.subject.nama"></a>
			<p id="jawaban" v-text="data.konten"></p>
			<button type="button" class="btn btn-default btn-xs" id="tombolJawab"><p>Report</p></button>
		</div>
		<hr width="90%" align="center">
	</div>
</template>
<script>
export default{
	props:['data'],
}
</script>
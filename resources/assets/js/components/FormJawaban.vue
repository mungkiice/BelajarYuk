<template>
	<div class="row">
		<p>Jawabanmu!</p>
		<textarea class="form-control" rows="5" v-model="konten"></textarea>
		<p>Upload foto jika diperlukan</p>
		<input type="file" class="" name="foto" @change="onFileChange">
		<button type="submit" class="btn btn-success" id="tombolTanya" @click="postJawaban">Kirim!</button>
	</div>
</template>
<script>
export default{
	data(){
		return{
			konten : '',
			foto : '',
			array : false,
		};
	},
	created(){
		this.array = location.pathname.split('/');
	},
	methods:{
		postJawaban(){
			let formData = new FormData();
			formData.append('konten', this.konten);
			formData.append('foto', this.foto);
			axios.post('/api/v1/pertanyaan/' + this.array[3] + '/jawaban', 
				formData)
			.then(response => {
				this.foto = false;
				this.konten = false;
				// flash();
				this.$emit('created', response.data);
			});
		},
		onFileChange(e) {
			let files = e.target.files || e.dataTransfer.files;
			if (!files.length)
				return;
			this.createImage(files[0]);
		},
		createImage(file) {
			let reader = new FileReader();
			let vm = this;
			reader.onload = (e) => {
				vm.foto = e.target.result;
			};
			reader.readAsDataURL(file);
		},
	}
}
</script>
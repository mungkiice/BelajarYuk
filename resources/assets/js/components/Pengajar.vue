<template>
	<div class="col-md-4" id="profilGuruTampil">
		<center>
			<img :src="data.foto" class="img-circle" style="margin-top: 10px; max-width: 200px;">
		</center>
		<hr width="90%" align="center">
		<p id="profil-nama-guru" v-text="data.nama"></p>
		<div id="bioGuru"><p v-text="data.bio"></p></div>
		<div style=" bottom: 0px;">
		<div>
		<center><p style="font-weight: bold; background-color: #00C853; color: white; padding : 10px 0 10px 0; margin-bottom : -15px; border-radius : 10px;"> Rp. 100.000 / Sesi</p></center></div>							
			<hr width="100%" align="center" style="margin-bottom: 5px;">
			<div class="col-md-4" id="kotak">
				<center>
					<i class="fa fa-star" style="color: yellow;"></i>
					<p id="ketnya">Rating</p>
					<p id="angkanya" v-text="ratingCount"></p>
				</center>
			</div>
			<div class="col-md-4">
				<center>
					<i class="fa fa-pencil-square-o" style="color: blue;"></i>
					<p id="ketnya">Ulasan</p>
					<p id="angkanya" v-text="ulasanCount"></p>
				</center>
			</div>
			<div class="col-md-4">
				<center>
					<i class="fa fa-comments" style="color: green;"></i>
					<p id="ketnya">Jawab</p>
					<p id="angkanya" v-text="jawabCount"></p>
				</center>
			</div>

			<hr width="100%" align="center" style="margin-bottom: 0px;">
			<i class="fa fa-tags"><span v-text="pelajarans" style="font-size: small;"></span></i>	
		</div>					
	</div>
</template>
<script>
export default{
	props:['data'],
	data(){
		return{
			dataUlasan : this.data.ulasan.data,
			dataJawaban : this.data.jawaban.data,
			dataPelajaran : this.data.pelajaran.data,
		};
	},
	computed:{
		ulasanCount(){
			return this.dataUlasan.length;
		},
		ratingCount(){
			var count = 0;
			var temp = 0;
			for (var i = this.dataUlasan.length - 1; i >= 0; i--) {
				temp += this.dataUlasan[i].rating;
				count++;
			}
			var hasil = temp / count
			return hasil.toFixed(2);
		},
		jawabCount(){
			return this.data.jawaban.data.length;
		},
		pelajarans(){
			var hasil = '';
			for (var i = 0; i <= this.dataPelajaran.length - 1; i++) {
				if(i == this.dataPelajaran.length - 1){
					hasil += this.dataPelajaran[i].nama + '.';
					break;
				}
				hasil += this.dataPelajaran[i].nama + ', ';
			}
			return hasil
		}
	}
}
</script>
<template>
	<div class="row" id="profil">
		<!-- <div class="col-md-1">
			<center><img src="images/test.jpg" class="img-circle" style="width: 50px; height: auto"></center>
		</div> -->
		<div class="col-md-12">
			<a href="" style="float:left">
				<div>
					<a style="float: left; margin-top: 25px;" :href="linkAktor" v-text="aktor"></a>
					<a style="float: left; margin-top: 25px; font-style: italic; font-size: x-small;" href="" v-text="keterangan"></a>	
				</div>
			</a>
			<hr width="100%" align="center" style="margin-bottom: 20px;">
			<p v-text="data.subject.data.konten"></p>
			<hr width="100%" align="center">
			<!-- <button type="button" class="btn btn-default btn-xs" style="float: right; margin-top: 10px; margin-bottom: 10px;"><p>Jawab</p></button> -->
		</div>
	</div>
</template>
<script>
export default{
	props:['data', 'actor'],
	computed:{
		keterangan(){
			return ' Menulis pertanyaan ' + this.data.created_at;
		},
		aktor(){
			return this.actor[1] + ' --  ';
		},
		linkAktor(){
			return '/profil/' + this.actor[0];
		}
	}
}
</script>
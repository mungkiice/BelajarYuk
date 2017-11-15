<template>
	<div class="modal fade" id="tunggu-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header" align="center">
					<div id="loading">
						<ul class="bokeh">
							<li></li>
							<li></li>
							<li></li>
						</ul>
					</div>
				</div> 
				<div class="modal-body" align="center">

				</div>   
				<div class="modal-footer" align="center">
					<br><br><br><br>
				</div>                     
			</div>
		</div>
	</div>
</template>
<script>
// export default{
// 	data(){
// 		return{
// 			show:false	
// 		}	
// 	},
// 	created(){
// 		window.events.$on('loading', message => this.loading(message));
// 	},
// 	methods:{
// 		loading(message){
// 			this.show = true;
// 		}
// 	}
// }
</script>
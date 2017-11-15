<template>
	<div class="row" v-if="shouldPaginate">
		<div :class="btnPrev" data-wow-duration="1s" data-wow-delay="1s" v-show="prevUrl">
			<a href="#" class="btn btn-primary btn-lg" rel="prev" @click.prevent="page--">&laquo; Prev</a>
		</div>
		<div class="col-md-4 col-md-offset-4 text-center wow fadeInUp" data-wow-duration="1s" data-wow-delay="1s" v-show="nextUrl">
			<a href="#" class="btn btn-primary btn-lg" rel="next" @click.prevent="page++">Next &raquo;</a>
		</div>
	</div>
</template>
<script>
export default{
	//accept property from the parent
	props:['dataSet'],
	data(){
		return{
			page:1,
			prevUrl:'',
			nextUrl:'',
		}
	},
	watch:{
	//watch whenever dataSet is changed then do something
	dataSet(){
		this.page = this.dataSet.meta.pagination.current_page;
		this.prevUrl = this.dataSet.meta.pagination.links.previous;
		this.nextUrl = this.dataSet.meta.pagination.links.next;
	},
		// keep an eye on page property
		page(){
			this.broadcast().updateUrl();
		}
	},
	computed:{
		shouldPaginate(){
			//return true if we do have a previous url or next url
			return !! this.prevUrl || !! this.nextUrl;
		},
		btnPrev(){
			return[
			'col-md-4 text-center wow fadeInUp',
			this.nextUrl ? null : 'col-md-offset-4',
			];
		}
	},
	methods:{
		broadcast(){
			// fire an action to the parent called changed and then send through the page data
			return this.$emit('changed', this.page);
		},
		updateUrl(){
			// update the url on the browser using Javascript history API
			// we dont have a state and we dont worry about the title 
			history.pushState(null, null, '?page=' + this.page);
		}
	}
}
</script>
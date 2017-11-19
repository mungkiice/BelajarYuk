<template>
	<div>
		<div class="fh5co-cover fh5co-cover-style-2 js-full-height" id="slide" data-stellar-background-ratio="0.5">
			<span class="scroll-btn wow fadeInUp" data-wow-duration="1s" data-wow-delay="1.4s">
				<a href="#">
					<span class="mouse"><span></span></span>
				</a>
			</span>
			<div class="fh5co-overlay" style="background: url(images/banner-home.png); background-position: center; background-repeat: no-repeat; background-size: cover;"  ></div>
			<div class="fh5co-cover-text">
				<div class="container">
					<div class="row">
						<div class="col-md-push-6 col-md-6 full-height js-full-height">
							<div class="fh5co-cover-intro">
								<h1 class="cover-text-lead wow fadeInUp" data-wow-duration="1s" data-wow-delay=".5s">Belajar Yuk</h1>
								<h2 class="cover-text-sublead wow fadeInUp" data-wow-duration="1s" data-wow-delay=".8s">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics.</h2>
								<p class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="1.1s"><a href="http://freehtml5.co/" class="btn btn-primary btn-outline btn-lg">See Our Work</a></p>
							</div>
						</div>
					</div>
				</div>	
			</div>
		</div>

		<div class="fh5co-blog-style-1" id="secondPage">
			<div class="container">
				<div class="row p-b">
					<div class="col-md-6 col-md-offset-3 text-center">
						<h2 class="fh5co-heading wow fadeInUp" data-wow-duration="1s" data-wow-delay=".5s">Berita Seputar Pendidikan</h2>
						<p class="wow fadeInUp" data-wow-duration="1s" data-wow-delay=".8s">Kami menyajikan berita - berita terkini seputar pendidikan di Indonesia</p>
					</div>
				</div>
				<div class="row p-b">
					<div v-for="berita in beritas" :key="berita.id">
						<berita :data="berita"></berita>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4 col-md-offset-4 text-center wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.5s">
						<a href="/berita" class="btn btn-primary btn-lg">Berita Lainnya</a>
					</div>
				</div>
			</div>
		</div>

		<div class="fh5co-blog-style-1" id="3Page" style="background-color: #F5F5F5;">
			<div class="container">
				<div class="row p-b">
					<div class="col-md-6 col-md-offset-3 text-center">
						<h2 class="fh5co-heading wow fadeInUp" data-wow-duration="1s" data-wow-delay=".5s">Donasi untuk teman - teman kita</h2>
						<p class="wow fadeInUp" data-wow-duration="1s" data-wow-delay=".8s">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. </p>
					</div>
				</div>
				<div class="row p-b">
					<div v-for="kampanye in kampanyes" :key="kampanye.id">
						<kampanye :data="kampanye"></kampanye>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4 col-md-offset-4 text-center wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.5s">
						<a href="/kampanye" class="btn btn-primary btn-lg">Donasi Lainnya</a>
					</div>
				</div>
			</div>
		</div>

		<div class="fh5co-blog-style-1" id="4Page" style="background-color: #EEEEEE;">
			<div class="container">
				<div class="row p-b">
					<div class="col-md-6 col-md-offset-3 text-center">
						<h2 class="fh5co-heading wow fadeInUp" data-wow-duration="1s" data-wow-delay=".5s">Event - event seru dan menarik</h2>
						<p class="wow fadeInUp" data-wow-duration="1s" data-wow-delay=".8s">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. </p>
					</div>
				</div>
				<div class="row p-b">
					<div v-for="kegiatan in kegiatans" :key="kegiatan.id">
						<kegiatan :data="kegiatan"></kegiatan>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4 col-md-offset-4 text-center wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.5s">
						<a href="/kegiatan" class="btn btn-primary btn-lg">Event Lainnya</a>
					</div>
				</div>
			</div>
		</div>

		<!-- <div class="fh5co-features-style-1" id="3rdPage" style="background-image: url(images/full_4.jpg);" data-stellar-background-ratio="0.5">
			<div class="fh5co-overlay"></div>
			<div class="container" style="z-index: 3; position: relative;">
				<div class="row p-b">
					<div class="col-md-6 col-md-offset-3 text-center wow fadeInUp" data-wow-duration="1s" data-wow-delay=".5s">
						<h2 class="fh5co-heading">We Help Brands Grow</h2>
					</div>
				</div>
				<div class="row">
					<div class="fh5co-features">
						<div class="fh5co-feature wow fadeInUp" data-wow-duration="1s" data-wow-delay=".8s">
							<a href="">
								<div class="icon"><i class="icon-ribbon"></i></div>
								<h3>Brand Strategy</h3>
								<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.</p>
							</a>
						</div>
						<div class="fh5co-feature wow fadeInUp" data-wow-duration="1s" data-wow-delay="1.1s">

						</div>
						<div class="fh5co-feature wow fadeInUp" data-wow-duration="1s" data-wow-delay="1.4s">
							<div class="icon"><i class=" icon-monitor"></i></div>
							<h3>Web Development</h3>
							<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.</p>
						</div>

						<div class="fh5co-feature wow fadeInUp" data-wow-duration="1s" data-wow-delay="1.7s">
							<div class="icon"><i class="icon-video2"></i></div>
							<h3>Video Direction</h3>
							<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.</p>
						</div>
						<div class="fh5co-feature wow fadeInUp" data-wow-duration="1s" data-wow-delay="2s">

						</div>
						<div class="fh5co-feature wow fadeInUp" data-wow-duration="1s" data-wow-delay="2.3s">
							<div class="icon"><i class="icon-mail2"></i></div>
							<h3>Email Strategy</h3>
							<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.</p>
						</div>
					</div>
				</div>
			</div>
		</div> -->

		<!-- <div class="fh5co-features-style-2" id="4thPage">
			<div class="container">
				<div class="row p-b">
					<div class="col-md-6 col-md-offset-3 text-center">
						<h2 class="fh5co-heading wow fadeInUp" data-wow-duration="1s" data-wow-delay=".5s">Why Choose Us</h2>
						<p class="wow fadeInUp" data-wow-duration="1s" data-wow-delay=".8s">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics.</p>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4 col-sm-6 col-xs-6 col-xxs-12 fh5co-feature wow fadeInUp" data-wow-duration="1s" data-wow-delay="1.1s">
						<div class="fh5co-icon"><i class="icon-command"></i></div>
						<div class="fh5co-desc">
							<h3>100% Free</h3>
							<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. </p>
						</div>	
					</div>
					<div class="col-md-4 col-sm-6 col-xs-6 col-xxs-12 fh5co-feature wow fadeInUp" data-wow-duration="1s" data-wow-delay="1.4s">
						<div class="fh5co-icon"><i class="icon-eye22"></i></div>
						<div class="fh5co-desc">
							<h3>Retina Ready</h3>
							<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. </p>
						</div>
					</div>
					<div class="clearfix visible-sm-block visible-xs-block"></div>
					<div class="col-md-4 col-sm-6 col-xs-6 col-xxs-12 fh5co-feature wow fadeInUp" data-wow-duration="1s" data-wow-delay="1.7s">
						<div class="fh5co-icon"><i class="icon-toggle"></i></div>
						<div class="fh5co-desc">
							<h3>Fully Responsive</h3>
							<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. </p>
						</div>
					</div>
					<div class="col-md-4 col-sm-6 col-xs-6 col-xxs-12 fh5co-feature wow fadeInUp" data-wow-duration="1s" data-wow-delay="2s">
						<div class="fh5co-icon"><i class="icon-archive22"></i></div>
						<div class="fh5co-desc">
							<h3>Lightweight</h3>
							<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. </p>
						</div>	
					</div>
					<div class="clearfix visible-sm-block visible-xs-block"></div>
					<div class="col-md-4 col-sm-6 col-xs-6 col-xxs-12 fh5co-feature wow fadeInUp" data-wow-duration="1s" data-wow-delay="2.3s">
						<div class="fh5co-icon"><i class="icon-heart22"></i></div>
						<div class="fh5co-desc">
							<h3>Made with Love</h3>
							<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. </p>
						</div>
					</div>
					<div class="col-md-4 col-sm-6 col-xs-6 col-xxs-12 fh5co-feature wow fadeInUp" data-wow-duration="1s" data-wow-delay="2.6s">
						<div class="fh5co-icon"><i class="icon-umbrella"></i></div>
						<div class="fh5co-desc">
							<h3>Eco Friendly</h3>
							<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. </p>
						</div>
					</div>
					<div class="clearfix visible-sm-block visible-xs-block"></div>
				</div>
			</div>
		</div> -->

		<!-- <div class="fh5co-pricing-style-2" id="lastPage">
			<div class="container">
				<div class="row">
					<div class="row p-b">
						<div class="col-md-6 col-md-offset-3 text-center">
							<h2 class="fh5co-heading wow fadeInUp" data-wow-duration="1s" data-wow-delay=".5s">Pengajar - pengajar yang asik dan berkompeten</h2>
							<p class="wow fadeInUp" data-wow-duration="1s" data-wow-delay=".7s">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. </p>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="pricing">
						<div class="pricing-item wow fadeInUp" data-wow-duration="1s" data-wow-delay="1.1s">
							<h3 class="pricing-title">Basic</h3>
							<p class="pricing-sentence">Little description here</p>
							<div class="pricing-price"><span class="pricing-currency">$</span>19<span class="pricing-period">/ month</span></div>
							<ul class="pricing-feature-list">
								<li class="pricing-feature">10 presentations/month</li>
								<li class="pricing-feature">Support at $25/hour</li>
								<li class="pricing-feature">1 campaign/month</li>
							</ul>
							<button class="btn btn-success btn-outline">Choose plan</button>
						</div>
						<div class="pricing-item pricing-item-featured wow fadeInUp" data-wow-duration="1s" data-wow-delay="1.4s">
							<h3 class="pricing-title">Standard</h3>
							<p class="pricing-sentence">Little description here</p>
							<div class="pricing-price"><span class="pricing-currency">$</span>29<span class="pricing-period">/ month</span></div>
							<ul class="pricing-feature-list">
								<li class="pricing-feature">50 presentations/month</li>
								<li class="pricing-feature">5 hours of free support</li>
								<li class="pricing-feature">10 campaigns/month</li>
							</ul>
							<button class="btn btn-success btn-lg">Choose plan</button>
						</div>
						<div class="pricing-item wow fadeInUp" data-wow-duration="1s" data-wow-delay="1.7s">
							<h3 class="pricing-title">Enterprise</h3>
							<p class="pricing-sentence">Little description here</p>
							<div class="pricing-price"><span class="pricing-currency">$</span>79<span class="pricing-period">/ month</span></div>
							<ul class="pricing-feature-list">
								<li class="pricing-feature">Unlimited presentations</li>
								<li class="pricing-feature">Unlimited support</li>
								<li class="pricing-feature">Unlimited campaigns</li>
							</ul>
							<button class="btn btn-success btn-outline">Choose plan</button>
						</div>
					</div>
				</div>
			</div>
		</div> -->

		<!-- <div class="fh5co-content-style-6">
			<div class="container">
				<div class="row p-b text-center">
					<div class="col-md-6 col-md-offset-3">
						<h2 class="wow fadeInUp" data-wow-duration="1s" data-wow-delay=".5s">Explore the impossibility.</h2>
						<p class="wow fadeInUp" data-wow-duration="1s" data-wow-delay=".8s">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics.</p>
					</div>
				</div>
				<div class="row">
					<div class="col-md-3 col-sm-6 col-xs-6 col-xxs-12 wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".5s">
						<a href="#" class="link-block">
							<figure><img src="images/img_same_dimension_1.jpg" alt="Image" class="img-responsive img-rounded"></figure>
							<h3>Responsive Layout</h3>
							<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
							<p><a href="#" class="btn btn-primary btn-sm">Learn More</a></p>
						</a>
					</div>
					<div class="col-md-3 col-sm-6 col-xs-6 col-xxs-12 wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".8s">
						<a href="#" class="link-block">
							<figure><img src="images/img_same_dimension_2.jpg" alt="Image" class="img-responsive img-rounded"></figure>
							<h3>Retina Ready</h3>
							<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
							<p><a href="#" class="btn btn-primary btn-sm">Learn More</a></p>
						</a>
					</div>
					<div class="clearfix visible-sm-block"></div>
					<div class="col-md-3 col-sm-6 col-xs-6 col-xxs-12 wow fadeInLeft" data-wow-duration="1s" data-wow-delay="1.1s">
						<a href="#" class="link-block">
							<figure><img src="images/img_same_dimension_3.jpg" alt="Image" class="img-responsive img-rounded"></figure>
							<h3>Creative UI Design</h3>
							<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
							<p><a href="#" class="btn btn-primary btn-sm">Learn More</a></p>
						</a>
					</div>
					<div class="col-md-3 col-sm-6 col-xs-6 col-xxs-12 wow fadeInLeft" data-wow-duration="1s" data-wow-delay="1.4s">
						<a href="#" class="link-block">
							<figure><img src="images/img_same_dimension_4.jpg" alt="Image" class="img-responsive img-rounded"></figure>
							<h3>Responsive Layout</h3>
							<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
							<p><a href="#" class="btn btn-primary btn-sm">Learn More</a></p>
						</a>
					</div>
				</div>
			</div>
		</div> -->

		<div class="fh5co-testimonial-style-2">
			<div class="container">
				<div class="row p-b">
					<div class="col-md-6 col-md-offset-3 text-center">
						<h2 class="fh5co-heading wow fadeInUp" data-wow-duration="1s" data-wow-delay=".5s">Diskusikan pelajaran mu disini</h2>
						<p class="wow fadeInUp" data-wow-duration="1s" data-wow-delay=".8s">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. </p>
					</div>
				</div>
				<div class="row">
					<div v-for="(pertanyaan, indeks) in pertanyaans" :key="pertanyaan.id">
						<div class="col-md-4 col-sm-6 col-xs-12">
							<a :href="'/pertanyaan/' + pertanyaan.pelajaran.nama + '/' + pertanyaan.id">
								<div class="fh5co-testimonial-item wow fadeInUp" data-wow-duration="1s" data-wow-delay="1.1s">
									<div class="fh5co-name">
										<img :src="pertanyaan.user.foto" alt="profile">
										<div class="fh5co-meta">
											<h3 v-text="pertanyaan.user.nama"></h3>
											<span class="fh5co-company" v-text="pertanyaan.created_at"></span>
										</div>
									</div>
									<div class="fh5co-text">
										<p>&ldquo;<span style="color:gray" v-text="pertanyaan.konten"></span>&rdquo;</p>
									</div>
								</div>	
							</a>
						</div>
						<div class="clearfix" v-show="(indeks + 1) % 3 == 0"></div>
					</div>
				</div>
			</div>	
		</div>
		<div class="fh5co-counter-style-2" style="background-image: url(images/full_2.jpg);" data-stellar-background-ratio="0.5">
			<div class="fh5co-overlay"></div>
			<div class="container">
				<div class="fh5co-section-content-wrap">
					<div class="fh5co-section-content">
						<div class="row">
							<div class="col-md-4 text-center wow fadeInUp" data-wow-duration="1s" data-wow-delay=".5s">
								<div class="icon">
									<i class="icon-command"></i>
								</div>
								<span class="fh5co-counter js-counter" data-from="0" data-to="28" data-speed="5000" data-refresh-interval="50"></span>
								<span class="fh5co-counter-label">Muhammad Iqbal Kurniawan</span>

							</div>
							<div class="col-md-4 text-center wow fadeInUp" data-wow-duration="1s" data-wow-delay=".8s">
								<div class="icon">
									<i class="icon-power"></i>
								</div>
								<span class="fh5co-counter js-counter" data-from="0" data-to="57" data-speed="5000" data-refresh-interval="50"></span>
								<span class="fh5co-counter-label">Achmad Rizki Aditama</span>
							</div>
							<div class="col-md-4 text-center wow fadeInUp" data-wow-duration="1s" data-wow-delay="1.1s">
								<div class="icon">
									<i class="icon-code2"></i>
								</div>
								<span class="fh5co-counter js-counter" data-from="0" data-to="34023" data-speed="5000" data-refresh-interval="50"></span>
								<span class="fh5co-counter-label">Arif Luthfiansyah</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>
<script>
import Berita from '../components/Berita.vue';
import Kampanye from '../components/Kampanye.vue';
import Kegiatan from '../components/Kegiatan.vue';
// import Berita from '../components/Berita.vue';
// import Berita from '../components/Berita.vue';
export default{
	components:{Berita, Kampanye, Kegiatan},
	data(){
		return {
			beritas:false,
			kampanyes:false,
			kegiatans:false,
			pertanyaans:false,
			pengajars:false,
		};
	},
	created(){
		this.fetchData();
	},
	methods:{
		fetchData(){
			this.fetchDataPengajar();
			this.fetchDataBerita();
			this.fetchDataKegiatan();
			this.fetchDataKampanye();
			this.fetchDataPertanyaan();
		},
		fetchDataBerita(){
			axios.get('/api/v1/berita').then((response) => {
				this.beritas = response.data.data.slice(0,3);
			});
		},
		fetchDataKegiatan(){
			axios.get('/api/v1/kegiatan').then((response) => {
				this.kegiatans = response.data.data.slice(0,3);
			});
		},
		fetchDataKampanye(){
			axios.get('/api/v1/kampanye').then((response) => {
				this.kampanyes = response.data.data.slice(0,3);
			});
		},
		fetchDataPertanyaan(){
			axios.get('/api/v1/pertanyaan').then((response) => {
				this.pertanyaans = response.data.data.slice(0,6);
			});
		},
		fetchDataPengajar(){
			axios.get('/api/v1/pengajar').then((response) => {
				this.pengajars = response.data.data.slice(0,3);
			});
		},
	}
}
</script>
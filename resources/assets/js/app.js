
/**
* First we will load all of this project's JavaScript dependencies which 
* includes Vue and other libraries. It is a great starting point when
* building robust, powerful web applications using Vue and Laravel.
*/


require('./bootstrap');

window.Vue = require('vue');

/**
* Next, we will create a fresh Vue application instance and attach it to
* the page. Then, you may begin adding components to this application
* or customize the JavaScript scaffolding to fit your unique needs.
*/
Vue.component(
	'passport-clients',
	require('./components/passport/Clients.vue')
	);

Vue.component(
	'passport-authorized-clients',
	require('./components/passport/AuthorizedClients.vue')
	);
Vue.component(
	'passport-personal-access-tokens',
	require('./components/passport/PersonalAccessTokens.vue')
	);
Vue.component('paginator', require('./components/Paginator.vue'));
Vue.component('indeks-berita', require('./pages/Berita.vue'));
Vue.component('indeks-kampanye', require('./pages/Kampanye.vue'));
Vue.component('detail-kampanye', require('./pages/KampanyeDetail.vue'));
Vue.component('indeks-diskusi', require('./pages/Diskusi.vue'));
Vue.component('form-pertanyaan', require('./pages/FormPertanyaan.vue'));
Vue.component('detail-profile', require('./pages/Profile.vue'));
Vue.component('detail-pertanyaan', require('./pages/Pertanyaan.vue'));
Vue.component('indeks-kegiatan', require('./pages/Kegiatan.vue'));
Vue.component('indeks-pengajar', require('./pages/Pengajar.vue'));
Vue.component('form-pesan-guru', require('./pages/FormPesanGuru.vue'));
Vue.component('form-login', require('./components/FormLogin.vue'));
Vue.component('layout-navigation', require('./components/Navigation.vue'));
Vue.component('loading', require('./components/Loading.vue'));
const app = new Vue({
	el: '#app'
});

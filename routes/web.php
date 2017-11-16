<?php
use App\Pertanyaan;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('web_user', function () {
	return auth()->guard('web_user')->id();
});
Route::get('web_pengajar', function () {
	return auth()->guard('web_pengajar')->id();
});
Route::get('api_user', function () {
	return auth()->guard('user')->id();
});
Route::get('api_pengajar', function () {
	return auth()->guard('pengajar')->id();
});
Route::get('middleware', function(){
	return 'accessed';
})->middleware();
Route::get('/', 'HomeController@index');
Route::get('home', 'HomeController@index')->name('home');
Route::get('berita', 'WebController@indexBerita');
Route::get('diskusi', 'WebController@indexDiskusi');
Route::get('pertanyaan/{pelajaran}/{id}', 'WebController@detailDiskusi');
Route::get('kampanye', 'WebController@indexKampanye');
Route::get('kampanye/{id}', 'WebController@detailKampanye');
Route::get('profil/{id?}', 'WebController@detailProfil');
Route::get('bertanya', 'WebController@formPertanyaan');
Route::get('kegiatan', 'WebController@indexKegiatan');
Route::get('pengajar', 'WebController@indexPengajar');
Route::get('pesanguru', 'WebController@formPesanGuru');
Route::get('formlogin', 'WebController@formLogin');
Route::prefix('pengajar')->group(function(){
	Route::get('login', 'Auth\Pengajar\LoginController@showLoginForm')->name('pengajar.login');
	Route::post('login', 'Auth\Pengajar\LoginController@login');
	Route::post('logout', 'Auth\Pengajar\LoginController@logout')->name('pengajar.logout');

	Route::post('password/email', 'Auth\Pengajar\ForgotPasswordController@sendResetLinkEmail')->name('pengajar.password.email');
	Route::get('password/reset', 'Auth\Pengajar\ForgotPasswordController@showLinkRequestForm')->name('pengajar.password.request');

	Route::post('password/reset', 'Auth\Pengajar\ResetPasswordController@reset');
	Route::get('password/reset/{token}', 'Auth\Pengajar\ResetPasswordController@showResetForm')->name('pengajar.password.reset');
	
	Route::get('register', 'Auth\Pengajar\RegisterController@showRegistrationForm')->name('pengajar.register');
	Route::post('register', 'Auth\Pengajar\RegisterController@register');
});
Route::prefix('user')->group(function(){
	Route::get('login', 'Auth\User\LoginController@showLoginForm')->name('user.login');
	Route::post('login', 'Auth\User\LoginController@login');
	Route::post('logout', 'Auth\User\LoginController@logout')->name('user.logout');
	Route::post('password/email', 'Auth\User\ForgotPasswordController@sendResetLinkEmail')->name('user.password.email');
	Route::get('password/reset', 'Auth\User\ForgotPasswordController@showLinkRequestForm')->name('user.password.request');
	
	Route::post('password/reset', 'Auth\User\ResetPasswordController@reset');
	Route::get('password/reset/{token}', 'Auth\User\ResetPasswordController@showResetForm')->name('user.password.reset');
	
	Route::get('register', 'Auth\User\RegisterController@showRegistrationForm')->name('user.register');
	Route::post('register', 'Auth\User\RegisterController@register');
});

Route::group(['prefix' => 'admin'], function () {
	Voyager::routes();
});

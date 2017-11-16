<?php

use Illuminate\Http\Request;
Route::prefix('v1')->group(function(){
	Route::resource('kampanye','Api\KampanyeController');
	Route::resource('berita', 'Api\BeritaController');
	Route::resource('kursus','Api\KursusController');
	Route::resource('pelajaran','Api\PelajaranController');
	Route::resource('provinsi', 'Api\ProvinsiController');
	Route::resource('kabupaten', 'Api\KabupatenController');
	Route::resource('kecamatan', 'Api\KecamatanController');
	Route::resource('kelurahan', 'Api\KelurahanController');

	Route::resource('penyelenggara','Api\PenyelenggaraController');
	Route::post('penyelenggara/{penyelenggara}/kegiatan', 'Api\KegiatanController@store');
	Route::get('penyelenggara/{penyelenggara}/kegiatan', 'Api\KegiatanController@index');
	Route::get('kegiatan', 'Api\KegiatanController@index');
	Route::get('kegiatan/{kegiatan}', 'Api\KegiatanController@show');
	Route::put('kegiatan/{kegiatan}', 'Api\KegiatanController@update');
	Route::delete('kegiatan/{kegiatan}', 'Api\KegiatanController@destroy');

	Route::put('jawaban/{jawaban}', 'Api\JawabanController@update');
	Route::delete('jawaban/{jawaban}', 'Api\JawabanController@destroy');
	Route::get('jawaban/{jawaban}', 'Api\JawabanController@show');

	Route::delete('ulasan/{ulasan}', 'Api\UlasanController@destroy');
	Route::get('ulasan/{ulasan}', 'Api\UlasanController@show');
	Route::put('ulasan/{ulasan}', 'Api\UlasanController@update');

	Route::resource('users','Api\UserController');
	Route::post('users/{user}/respon', 'Api\UserController@responOrder');
	Route::post('users/updatePlayerID', 'Api\UserController@setPlayerID');
	
	Route::prefix('pertanyaan')->group(function(){
		Route::get('{pertanyaan}/jawaban', 'Api\JawabanController@index');
		Route::post('{pertanyaan}/jawaban', 'Api\JawabanController@store');

		Route::get('{pelajaran?}','Api\PertanyaanController@index');
		Route::get('{pelajaran}/{pertanyaan}','Api\PertanyaanController@show');
		Route::post('', 'Api\PertanyaanController@store');
		Route::delete('{pertanyaan}', 'Api\PertanyaanController@destroy');
		Route::put('{pertanyaan}', 'Api\PertanyaanController@update');
	});
	Route::prefix('pengajar')->group(function(){
		Route::get('{pengajar}/ulasan', 'Api\UlasanController@index');
		Route::post('{pengajar}/ulasan', 'Api\UlasanController@store');

		Route::post('{pengajar}/pesanguru', 'Api\PengajarController@pesanGuru');
		Route::post('updatePlayerID', 'Api\PengajarController@setPlayerID');
		Route::get('{pelajaran?}', 'Api\PengajarController@index');
		Route::delete('{pengajar}', 'Api\PengajarController@destroy');
		Route::post('{pengajar}/pesan', 'Api\PengajarController@pesanGuru');
		Route::post('','Api\PengajarController@store');
		Route::put('{pengajar}', 'Api\PengajarController@update');
		Route::get('{pelajaran}/{pengajar}', 'Api\PengajarController@show');
	});
});

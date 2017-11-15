<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebController extends Controller
{
	public function indexBerita(){
		return view('contents.berita');
	}
	public function indexPengajar(){
		return view('contents.cari_guru');
	}
	public function indexDiskusi(){
		return view('contents.diskusi');
	}
	public function detailDiskusi(){
		return view('contents.diskusi_detail');
	}
	public function indexKampanye(){
		return view('contents.kampanye');
	}
	public function detailKampanye(){
		return view('contents.kampanye_detail');
	}
	public function detailProfil(){
		return view('contents.profil');
	}
	public function formPertanyaan(){
		return view('contents.bertanya');
	}
	public function indexKegiatan(){
		return view('contents.kegiatan');
	}
	public function formPesanGuru(){
		return view('contents.pesan_guru');
	}
	public function formLogin(){
		return view('contents.login');
	}
}

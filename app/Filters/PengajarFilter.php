<?php

namespace App\Filters;

use App\Pengajar;
use App\Kabupaten;
use App\Kecamatan;

class PengajarFilter extends Filters{
	protected $filters = ['lokasi'];
    protected function lokasi($kabupaten){
        // $kota = Kabupaten::where('nama', $kota)->firstOrFail();
        $kabupaten = Kabupaten::where('nama', $kabupaten)->firstOrFail();
        return $this->builder
        ->where('kabupaten_id', $kabupaten->id);
        // ->orWhere('kabupaten_id', optional($kabupaten->kota)->id);
    }
}
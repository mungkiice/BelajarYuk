<?php

namespace App\Transformers;
use App\Pengajar;
use League\Fractal\TransformerAbstract;

class PengajarTransformer extends TransformerAbstract
{
    protected $availableIncludes = ['ulasan', 'pelajaran', 'jawaban'];
     /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Pengajar $pengajar)
    {
        return [
        'id' => $pengajar->id,
        'nama' => $pengajar->nama,
        'foto' => $pengajar->foto,
        'email' => $pengajar->email,
        'bio' => $pengajar->bio,
        'pendidikan_terakhir' => $pengajar->pendidikan_terakhir,
        'alamat' => $pengajar->alamat,
        'no_telp' => $pengajar->no_telp,
        'gender' => $pengajar->gender,
        'aktif' => $pengajar->aktif,
        'tarif' => $pengajar->tarif,
        'kecamatan' => $pengajar->kecamatan->nama,
        'kota' => $pengajar->kota->nama,
        'registered' => $pengajar->created_at->diffForHumans(),
        ];
    }
    public function includeUlasan(Pengajar $pengajar){
        $ulasan = $pengajar->ulasan;
        return $this->collection($ulasan, new UlasanTransformer);
    }
    public function includePelajaran(Pengajar $pengajar){
        $pelajaran = $pengajar->pelajaran;
        return $this->collection($pelajaran, new PelajaranTransformer);
    }
    public function includeJawaban(Pengajar $pengajar){
        $jawaban = $pengajar->jawaban;
        return $this->collection($jawaban, new JawabanTransformer);
    }
}

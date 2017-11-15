<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Transformers\KegiatanTransformer;
use App\Penyelenggara;

class PenyelenggaraTransformer extends TransformerAbstract
{
    protected $availableIncludes = ['kegiatan'];
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Penyelenggara $penyelenggara)
    {
        return [
        'id' => $penyelenggara->id,
        'nama' => $penyelenggara->nama,
        'gender' => $penyelenggara->gender,
        'instansi' => $penyelenggara->instansi,
        'no_telp' => $penyelenggara->no_telp,
        'alamat' => $penyelenggara->alamat,
        'email' => $penyelenggara->email,
        'registered' => $penyelenggara->created_at->diffForHumans(),
        ];
    }
    public function includeKegiatan(Penyelenggara $penyelenggara){
        $kegiatan = $penyelenggara->kegiatan;
        return $this->collection($kegiatan, new KegiatanTransformer);
    }
}

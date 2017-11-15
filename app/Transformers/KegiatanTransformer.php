<?php

namespace App\Transformers;
use App\Kegiatan;
use League\Fractal\TransformerAbstract;
use App\Transformers\PenyelenggaraTransformer;

class KegiatanTransformer extends TransformerAbstract
{
    protected $availableIncludes = ['penyelenggara'];
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Kegiatan $kegiatan)
    {
        return [
        'id' => $kegiatan->id,
        'judul' => $kegiatan->judul,
        'konten' => $kegiatan->deskripsi,
        'foto' => $kegiatan->foto,
        'thumbnail' => $kegiatan->thumbnail,
        'waktu' => $kegiatan->waktu,
        'lokasi' => $kegiatan->lokasi,
        'created_at' => $kegiatan->created_at->diffForHumans(),
        ];
    }
    public function includePenyelenggara(Kegiatan $kegiatan){
        $penyelenggara = $kegiatan->penyelenggara;
        return $this->item($penyelenggara, new PenyelenggaraTransformer);
    }
}

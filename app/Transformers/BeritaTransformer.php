<?php

namespace App\Transformers;
use App\Berita;
use League\Fractal\TransformerAbstract;

class BeritaTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Berita $berita)
    {
        return [
            'id' => $berita->id,
            'judul' => $berita->judul,
            'foto' => $berita->foto,
            'konten' => $berita->deskripsi,
            'sumber' => $berita->sumber,
            'created_at' => $berita->created_at->diffForHumans(),
        ];
    }
}

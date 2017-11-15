<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Kampanye;

class KampanyeTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Kampanye $kampanye)
    {
        return [
            'id' => $kampanye->id,
            'penggalang' => $kampanye->penggalang,
            'no_telp' => $kampanye->no_telp,
            'alamat' => $kampanye->alamat,
            'judul' => $kampanye->judul,
            'konten' => $kampanye->konten,
            'foto' => $kampanye->foto,
            // 'valid' => $kampanye->valid,
            'created_at' => $kampanye->created_at->diffForHumans(),
        ];
    }
}

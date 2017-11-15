<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Pelajaran;
use App\Transformers\PengajarTransformer;

class PelajaranTransformer extends TransformerAbstract
{
    protected $availableIncludes = ['pengajar'];
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Pelajaran $pelajaran)
    {
        return [
            'id' => $pelajaran->id,
            'nama' => $pelajaran->nama,
        ];
    }
    public function includePengajar(Pelajaran $pelajaran){
        $pengajar = $pelajaran->pengajar;
        return $this->collection($pengajar, new PengajarTransformer);
    }
}

<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Kursus;
use App\Transformers\PengajarTransformer;
use App\Transformers\UserTransformer;

class KursusTransformer extends TransformerAbstract
{
    protected $availableIncludes = ['pengajar','pelajar'];
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Kursus $kursus)
    {
        return [
        'id' => $kursus->id,
        'keterangan' => $kursus->keterangan,
        'sesi' => $kursus->sesi,
        'total_pembayaran' => $kursus->total_pembayaran,
        'created_at' => $kursus->created_at->diffForHumans(),
        ];
    }
    public function includePengajar(Kursus $kursus){
        $pengajar = $kursus->pengajar;
        return $this->item($pengajar, new PengajarTransformer);
    }
    public function includePelajar(Kursus $kursus){
        $pelajar = $kursus->user;
        return $this->item($pelajar, new UserTransformer);
    }
}

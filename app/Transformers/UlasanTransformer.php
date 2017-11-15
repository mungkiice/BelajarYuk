<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Ulasan;
use App\Transformers\PengajarTransformer;
use App\Transformers\UserTransformer;

class UlasanTransformer extends TransformerAbstract
{
    protected $availableIncludes = ['pengajar','user'];
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Ulasan $ulasan)
    {
        return [
        'id' => $ulasan->id,
        'ulasan' => $ulasan->ulasan,
        'rating' => $ulasan->rating,
        'nama' => $ulasan->user->nama,
        'created_at' => $ulasan->created_at->diffForHumans(),
        ];
    }
    public function includePengajar(Ulasan $ulasan){
        $pengajar = $ulasan->pengajar;
        return $this->item($pengajar,new PengajarTransformer);
    }
    public function includeUser(Ulasan $ulasan){
        $user = $ulasan->user;
        return $this->item($user, new UserTransformer);
    }
}

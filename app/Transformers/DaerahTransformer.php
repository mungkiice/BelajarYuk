<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use Illuminate\Database\Eloquent\Collection;

class DaerahTransformer extends TransformerAbstract
{
    protected $availableIncludes = ['provinsi', 'kabupaten', 'kecamatan', 'kelurahan'];
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform($model)
    {
        return [
            'id' => $model->id,
            'nama' => $model->nama,
        ];
    }
    public function includeProvinsi($model){
        $provinsi = $model->provinsi;
        return $this->item($provinsi, $this);
    }
    public function includeKabupaten($model){
        $kabupaten = $model->kota;
        if ($kabupaten instanceof Collection) {
            return $this->collection($kabupaten, $this);
        }else{
            return $this->item($kabupaten, $this);
        }
    }
    public function includeKecamatan($model){
        $kecamatan = $model->kecamatan;
        if ($kecamatan instanceof Collection) {
            return $this->collection($kecamatan, $this);
        }else{
            return $this->item($kecamatan, $this);
        }
    }
    public function includeKelurahan($model){
        $kelurahan = $model->kelurahan;
        if ($kelurahan instanceof Collection) {
            return $this->collection($kelurahan, $this);
        }else{
            return $this->item($kelurahan, $this);
        }
    }
}

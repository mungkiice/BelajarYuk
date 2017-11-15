<?php
namespace App\Transformers;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;
use App\Pertanyaan;
use League\Fractal\TransformerAbstract;

class PertanyaanTransformer extends TransformerAbstract
{
    protected $availableIncludes = ['user', 'jawaban'];
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Pertanyaan $pertanyaan)
    {
        return [
            'id' => $pertanyaan->id,
            'pelajaran' => $pertanyaan->pelajaran->nama,
            'judul' => $pertanyaan->judul,
            'konten' => $pertanyaan->konten,
            'foto' => $pertanyaan->foto,
            'terjawab' => $pertanyaan->terjawab,
            'created_at' => $pertanyaan->created_at->diffForHumans(),
        ];
    }
    public function includeJawaban(Pertanyaan $pertanyaan){
        $jawaban = $pertanyaan->jawaban;
        return $this->collection($jawaban, new JawabanTransformer);
    }
    public function includeUser(Pertanyaan $pertanyaan){
        $user = $pertanyaan->user;
        return $this->item($user, new UserTransformer);
    }
}

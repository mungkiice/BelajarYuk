<?php

namespace App\Transformers;
use App\Jawaban;
use League\Fractal\TransformerAbstract;

class JawabanTransformer extends TransformerAbstract
{
    use TransformerBuatan;
    protected $availableIncludes = ['subject', 'pertanyaan'];
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Jawaban $jawaban)
    {
        return [
            'id' => $jawaban->id,
            'konten' => $jawaban->konten,
            'foto' => $jawaban->foto,
            'created_at' => $jawaban->created_at->diffForHumans(),
        ];
    }
    public function includeSubject(Jawaban $jawaban){
        $subject = $jawaban->subject;
        $transformer = $this->getTransformerName($subject, $this);
        if(class_exists($transformer)){
            return $this->item($subject, new $transformer);
        }
    }
    public function includePertanyaan(Jawaban $jawaban){
        $pertanyaan = $jawaban->pertanyaan;
        return $this->item($pertanyaan, new PertanyaanTransformer);
    }
}

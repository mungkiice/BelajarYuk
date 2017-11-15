<?php

namespace App\Transformers;
use App\Activity;
use League\Fractal\TransformerAbstract;

class AktivitasTransformer extends TransformerAbstract
{
    use TransformerBuatan;
    protected $defaultIncludes = ['subject'];
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Activity $aktivitas)
    {
        return [
            'id' => $aktivitas->id,
            'type' => $aktivitas->type,
            'created_at' => $aktivitas->created_at,
        ];
    }
    public function includeSubject(Activity $aktivitas){
        $subject = $aktivitas->subject;
        $transformer = $this->getTransformerName($subject, $this);
        if(class_exists($transformer)){
            return $this->item($subject, new $transformer);
        }
    }
}

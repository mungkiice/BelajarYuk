<?php 
namespace App\Transformers;
use App\User;
use App\Transformers\PertanyaanTransformer;
use App\Transformers\JawabanTransformer;
use App\Transformers\UlasanTransformer;
use League\Fractal\TransformerAbstract;
class UserTransformer extends TransformerAbstract
{
	protected $availableIncludes = ['pertanyaan','jawaban','ulasan', 'aktivitas'];
	public function transform(User $user)
	{
		return [
		'id' => $user->id,
		'nama' => $user->nama,
		'email' => $user->email,
		'no_telp' => $user->no_telp,
		'alamat' => $user->alamat,
		'foto' => $user->foto,
		'bio' => $user->bio,
        'gender' => $user->gender,
		'kecamatan' => $user->kecamatan->nama,
		'kota' => $user->kota->nama,
		'registered' => $user->created_at->diffForHumans(),
		];
	}
	public function includePertanyaan(User $user){
		$pertanyaan = $user->pertanyaan;
		return $this->collection($pertanyaan, new PertanyaanTransformer);
	}
	public function includeJawaban(User $user){
		$jawaban = $user->jawaban;
		return $this->collection($jawaban, new JawabanTransformer);
	}
	public function includeUlasan(User $user){
		$ulasan = $user->ulasan;
		return $this->collection($ulasan, new UlasanTransformer);
	}
	public function includeAktivitas(User $user){
		$aktivitas = $user->aktivitas;
		return $this->collection($aktivitas, new AktivitasTransformer);
	}
}
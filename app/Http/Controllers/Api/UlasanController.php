<?php

namespace App\Http\Controllers\Api;

use League\Fractal\Pagination\IlluminatePaginatorAdapter;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Ulasan;
use App\Pengajar;
use App\Transformers\UlasanTransformer;

class UlasanController extends Controller
{
	public function __construct(){
		$this->middleware('auth:user')->except(['index', 'show']);
	}
	public function index(Pengajar $pengajar, $paginate = 5){
		$ulasan = $pengajar->ulasan()->latest()->paginate($paginate);
		$response = fractal()
		->collection($ulasan, UlasanTransformer::class)
		->paginateWith(new IlluminatePaginatorAdapter($ulasan))
		->includeUser()
		->toArray();
		return response()->json($response, 200);
	}
	public function show(Ulasan $ulasan){
		$response = fractal()
		->item($ulasan, UlasanTransformer::class)
		->includePengajar()
		->includeUser()
		->toArray();
		return response()->json($response, 200);
	}
	public function store(Pengajar $pengajar){
		$this->validate(request(), [
			'ulasan' => 'required',
			'rating' => 'required',
		]);
		$ulasan = $pengajar->addUlasan([
			'user_id' => auth()->id(),
			'ulasan' => request('ulasan'),
			'rating' => request('rating')
		]);
		$response = fractal()
		->item($ulasan, UlasanTransformer::class)
		->includePengajar()
		->toArray();
		return response()->json($response, 200);
	}
	public function update(Ulasan $ulasan){
		$ulasan->update([
			'ulasan' => request('ulasan'),
			'rating' => request('rating')
		]);
		return response()->json(['message' => 'Ulasan has been updated.'], 200);
	}
	public function destroy(Ulasan $ulasan){
		$ulasan->delete();
		return response()->json(["message" => "Ulasan has been deleted."], 204);
	}
}

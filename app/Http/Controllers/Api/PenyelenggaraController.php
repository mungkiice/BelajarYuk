<?php

namespace App\Http\Controllers\Api;

use League\Fractal\Pagination\IlluminatePaginatorAdapter;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Penyelenggara;
use App\Transformers\PenyelenggaraTransformer;

class PenyelenggaraController extends Controller
{
	public function __construct(){
		// $this->middleware('auth:user')->except(['index', 'show']);
	}
	public function index(){
		$penyelenggara = Penyelenggara::paginate(5);
		return fractal()
		->collection($penyelenggara, PenyelenggaraTransformer::class)
		->paginateWith(new IlluminatePaginatorAdapter($penyelenggara))
		->includeKegiatan()
		->toArray();
	}
	public function show(Penyelenggara $penyelenggara){
		return fractal()
		->item($penyelenggara, PenyelenggaraTransformer::class)
		->includeKegiatan()
		->toArray();
	}
	public function store(Request $request){
		$this->validate(request(), [
			'nama' => 'required',
			'gender' => 'required',
			'instansi' => 'required',
			'no_telp' => 'required',
			'alamat' => 'required',
			'no_ktp' => 'required|min:10|unique:penyelenggaras',
			'email' => 'required|email|unique:penyelenggaras'
		]);
		$penyelenggara = Penyelenggara::create([
			'nama' => $request->nama,
			'gender' => $request->gender,
			'instansi' => $request->instansi,
			'no_telp' => $request->no_telp,
			'alamat' => $request->alamat,
			'no_ktp' => $request->no_ktp,
			'email' => $request->email
		]);
		$response = fractal()
		->item($penyelenggara, PenyelenggaraTransformer::class)
		->includeKegiatan()
		->toArray();
		return response()->json($response, 200);
	}
	public function update(Penyelenggara $penyelenggara, Request $request){
		$this->validate($request,[
			'no_ktp' => 'min:10|unique:penyelenggaras',
			'email' => 'email|unique:penyelenggaras'
		]);
		$penyelenggara->update([
			'nama' => $request->nama,
			'gender' => $request->gender,
			'instansi' => $request->instansi,
			'no_telp' => $request->no_telp,
			'alamat' => $request->alamat,
			'no_ktp' => $request->no_ktp,
			'email' => $request->email
		]);
		return response()->json(['message' => 'Penyelenggara has been updated.'], 200);
	}
	public function destroy(Penyelenggara $penyelenggara){
		$penyelenggara->delete();
		return response()->json(["message" => "Penyelenggara has been deleted."], 204);
	}
}

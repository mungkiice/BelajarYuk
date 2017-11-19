<?php

namespace App\Http\Controllers\Api;

use League\Fractal\Pagination\IlluminatePaginatorAdapter;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pelajaran;
use App\Transformers\PelajaranTransformer;

class PelajaranController extends Controller
{
    public function __construct(){
         // $this->middleware('auth:user')->except(['index', 'show']);
    }
	public function index(){
        $pelajaran = Pelajaran::all();
        return fractal()
        ->collection($pelajaran, PelajaranTransformer::class)
        // ->paginateWith(new IlluminatePaginatorAdapter($pelajaran))
        ->toArray();
    }
    public function show(Pelajaran $pelajaran){
        return fractal()
        ->item($pelajaran, PelajaranTransformer::class)
        ->includePengajar()
        ->toArray();
    }
    public function store(){
        $this->validate(request(),[
            'nama' => 'required'
        ]);
        Pelajaran::create([
            'nama' => request('nama'),
        ]);
        return response()->json($response,200);
    }
    public function destroy(Pelajaran $pelajaran){
        $pelajaran->delete();
        return response()->json(["message" => "Pelajaran telah dihapus"],200);
    }
}

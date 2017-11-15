<?php

namespace App\Http\Controllers\Api;

use League\Fractal\Pagination\IlluminatePaginatorAdapter;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Kursus;
use App\Transformers\KursusTransformer;

class KursusController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(){
        $kursus = Kursus::paginate(5);
        return fractal()
        ->collection($kursus, KursusTransformer::class)
        ->paginateWith(new IlluminatePaginatorAdapter($kursus))
        ->toArray();
    }
    public function show(Kursus $kursus){
        return fractal()
        ->item($kursus, KursusTransformer::class)
        ->includePengajar()
        ->includePelajar()
        ->toArray();
    }
    public function store(Request $request){
        $this->validate($request, [
            'pengajar_id' => 'required',
            'user_id' => 'required',
            'keterangan' => 'required',
            'sesi' => 'required',
            'total_pembayaran' => 'required'
        ]);
        $kursus = Kursus::create([
            'pengajar_id' => $request->pengajar_id,
            'user_id' => $request->user_id,
            'keterangan' => $request->keterangan,
            'sesi' => $request->sesi,
            'total_pembayaran' => $request->total_pembayaran
        ]);

        // $response = fractal()
        // ->item($kursus, KursusTransformer::class)
        // ->includePengajar()
        // ->includePelajar()
        // ->toArray();
        return response()->json($response, 200);
    }
    public function delete(Kursus $kursus){
        $kursus->delete();
        return response()->json(["message" => "Kegiatan has been deleted."],204);
    }
}

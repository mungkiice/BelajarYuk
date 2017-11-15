<?php

namespace App\Http\Controllers\Api;

use League\Fractal\Pagination\IlluminatePaginatorAdapter;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Kegiatan;
use App\Penyelenggara;
use App\Transformers\KegiatanTransformer;

class KegiatanController extends Controller
{
    public function __construct(){
        $this->middleware('auth:user')->except(['index', 'show']);
    }
    public function index(Penyelenggara $penyelenggara = null, $paginate = 6){
        $kegiatan = Kegiatan::paginate($paginate);
        if($penyelenggara != null){
            $kegiatan = $penyelenggara->kegiatan()->paginate($paginate);
        }
        return fractal()
        ->collection($kegiatan, KegiatanTransformer::class)
        ->paginateWith(new IlluminatePaginatorAdapter($kegiatan))
        ->includePenyelenggara()
        ->toArray();
    }
    public function show(Kegiatan $kegiatan){
        return fractal()
        ->item($kegiatan, KegiatanTransformer::class)
        ->includePenyelenggara()
        ->toArray();
    }
    public function store(Penyelenggara $penyelenggara, Request $request){
        $this->validate(request(),[
            'judul' => 'required',
            'deskripsi' => 'required',
            'waktu' => 'required',
            'lokasi' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5000',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:3000',
        ]);
        $pathFoto = $pathThumbnail = 'image placeholder';
        if($request->hasFile('foto') || $request->hasFile('thumbnail')){
            $pathFoto = $request->foto->store('images/kegiatan');
        }
        if ($request->hasFile('thumbnail')) {
            $pathThumbnail = $request->thumbnail->store('images/kegiatan/thumbnails');
        }
        $kegiatan = $penyelenggara->setKegiatan([
            'judul' => $request->judul,
            'deksripsi' => $request->deskripsi,
            'waktu' => $request->waktu,
            'lokasi' => $request->lokasi,
            'foto' => $pathFoto,
            'thumbnail' => $pathThumbnail,
        ]);
        $response = fractal()
        ->item($kegiatan, KegiatanTransformer::class)
        ->includePenyelenggara()
        ->toArray();
        return response()->json($response, 200);
    }
    public function update(Kegiatan $kegiatan, Request $request){
        if($request->hasFile('foto')){
            $this->validate($request, [
            'foto' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5000',
            ]);
            $path = $request->foto->store('images/kegiatan');
            $kegiatan->update('foto', $path);
        }
        if ($request->hasFile('thumbnail')) {
            $this->validate($request, [
            'thumbnail' => 'image|mimes:jpeg,png,jpg,gif,svg|max:3000',
            ]);
            $path = $request->thumbnail->store('images/kegiatan/thumbnails');
            $kegiatan->update('thumbnail', $path);
        }
        $kegiatan->update([
            'judul' => $request->judul,
            'deksripsi' => $request->deskripsi,
            'waktu' => $request->waktu,
            'lokasi' => $request->lokasi,
        ]);
        return response()->json(["message" => "Kegiatan has been updated."], 200);
    }
    public function destroy(Kegiatan $kegiatan){
        $kegiatan->delete();
        return response()->json(["message" => "Kegiatan has been deleted."],204);
    }
}

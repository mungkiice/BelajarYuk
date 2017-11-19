<?php

namespace App\Http\Controllers\Api;

use League\Fractal\Pagination\IlluminatePaginatorAdapter;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Kampanye;
use App\Transformers\KampanyeTransformer;

class KampanyeController extends Controller
{
    public function __construct(){
        // $this->middleware('auth:user')->except(['index', 'show']);
    }
    public function index($paginate = 6){
        $kampanye = Kampanye::where('valid',1)->paginate($paginate);
        return fractal()
        ->collection($kampanye, KampanyeTransformer::class)
        ->paginateWith(new IlluminatePaginatorAdapter($kampanye))
        ->toArray();
    }
    public function show(Kampanye $kampanye){
        return fractal()
        ->item($kampanye, KampanyeTransformer::class)
        ->toArray();
    }
    public function store(Request $request){
        $this->validate(request(), [
            'penggalang' => 'required',
            'judul' => 'required',
            'no_telp' => 'required',
            'alamat' => 'required',
            'konten' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5000',
        ]);
        if($request->hasFile('foto')){
            $path = $request->foto->store('images/kampanye');
        }
        $kampanye = Kampanye::create([
            'penggalang' => request('penggalang'),
            'judul' => request('judul'),
            'no_telp' => request('no_telp'),
            'alamat' => request('alamat'),
            'konten' => request('konten'),
            'foto' => $path,
        ]);
        $response = fractal()
        ->item($kampanye, KampanyeTransformer::class)
        ->toArray();

        return response()->json($response, 200);
    }
    public function update(Kampanye $kampanye, Request $request){
        $kampanye->update([
            'penggalang' => request('penggalang'),
            'no_telp' => request('no_telp'),
            'judul' => request('judul'),
            'alamat' => request('alamat'),
            'konten' => request('konten'),
        ]);
        if($request->hasFile('foto')){
            $this->validate(request(), [
                'foto' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5000',
            ]);
            $path = $request->foto->store('images/kampanye');
            $kampanye->update('foto', $path);
        }

        return response()->json(["message" => "Kampanye has been updated."], 200);
    }
    public function destroy(Kampanye $kampanye){
        $kampanye->delete();
        return response()->json(["message" => "Kampanye has been deleted."], 204);
    }
}

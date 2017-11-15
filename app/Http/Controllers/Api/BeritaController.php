<?php

namespace App\Http\Controllers\Api;

use League\Fractal\Pagination\IlluminatePaginatorAdapter;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Berita;
use App\Transformers\BeritaTransformer;

class BeritaController extends Controller
{
    public function __construct(){
        // $this->middleware('auth')->except(['index', 'show']);
        // $this->middleware('auth:pengajar');
        $this->middleware('auth:admin')->except(['index', 'show']);
    }
    public function index(){   
        $berita = Berita::paginate(6);
        return fractal()
        ->collection($berita, BeritaTransformer::class)
        ->paginateWith(new IlluminatePaginatorAdapter($berita))
        ->toArray();
    }
    public function show(Berita $beritum){
        return fractal()
        ->item($beritum, BeritaTransformer::class)
        ->toArray();
    }
    public function store(Request $request)
    {
        $this->validate(request(),[
            'judul' => 'required',
            'deskripsi' => 'required',
            'sumber' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5000',
        ]);
        $path = null;
        if($request->hasFile('foto')){
            $path = $request->foto->store('images/berita');
        }

        $berita = Berita::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'sumber' => $request->sumber,
            'foto' => $path
        ]);   

        $response =  fractal()
        ->item($berita, BeritaTransformer::class)
        ->toArray();

        return response()->json($response, 200);
    }
    public function edit($id)
    {
        //
    }
    public function update(Berita $beritum, Request $request)
    {
        $beritum->update([
            'judul' => request('judul'),
            'deskripsi' => request('deskripsi'),
            'sumber' => request('sumber')
        ]);
        if($request->hasFile('foto')){
            $this->validate($request,[
                'foto' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5000',
            ]);
            $path = $request->foto->store('images/berita');
            $berita->update('foto', $path);
        }

        return response()->json(["message" => "Jawaban has been updated."], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Berita $beritum)
    {
        $beritum->delete();
        return response()->json(["message" => "Berita has been deleted."], 204);
    }
}

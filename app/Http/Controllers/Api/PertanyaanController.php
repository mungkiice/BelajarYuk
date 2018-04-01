<?php

namespace App\Http\Controllers\Api;

use League\Fractal\Pagination\IlluminatePaginatorAdapter;
use App\Transformers\PertanyaanTransformer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pertanyaan;
use App\Pelajaran;
use App\Transformers\TransformerBuatan;
use Illuminate\Support\Facades\Auth;

class PertanyaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        $this->middleware('pengguna')->except(['index', 'show']);
    }
    public function index(Pelajaran $pelajaran = null, $paginate = 6)
    {
        $pertanyaan = Pertanyaan::latest()->paginate($paginate);

        if($pelajaran != null){
            $pertanyaan = $this->getPertanyaan($pelajaran);
        }

        return fractal()
        ->collection($pertanyaan, PertanyaanTransformer::class)
        ->paginateWith(new IlluminatePaginatorAdapter($pertanyaan))
        ->includeUser()
        ->includeJawaban()
        ->toArray();
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'judul' => 'required',
            'konten' => 'required',
            'pelajaran_id' => 'required|exists:pelajarans,id'
        ]);
        $path = 'image placeholder';
        if($request->hasFile('foto')){
            $this->validate($request,[
                'foto' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5000',
            ]);
            $path = $request->foto->store('images/pertanyaan');
        }
        $pertanyaan = Pertanyaan::create([
            'konten' => $request->konten,
            'foto' => $path,
            'user_id' => Auth::guard('user')->id(),
            'pelajaran_id' => $request->pelajaran_id,
            'judul' => $request->judul
        ]);
        return response()->json($pertanyaan, 200);
    }

    public function show($pelajaranID, Pertanyaan $pertanyaan){
        return fractal()
        ->item($pertanyaan, PertanyaanTransformer::class)
        ->includeUser()
        ->includeJawaban()
        ->toArray();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Pertanyaan $pertanyaan)
    {
        if($request->hasFile('foto')){
            $this->validate($request,[
                'foto' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5000',
            ]);
            $path = $request->foto->store('images/pertanyaan');
            $pertanyaan->update('foto', $path);
        }
        $pertanyaan->update([
            'konten' => request('konten'),
            'judul' => request('judul')
        ]);
        return response()->json(['message' => 'Pertanyaan has been updated.'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pertanyaan $pertanyaan)
    {
        $pertanyaan->delete();
        return response()->json(["message" => "Pertanyaan has been deleted."], 204);
    }

    private function getPertanyaan(Pelajaran $pelajaran, $paginate = 5){
        return $pelajaran->pertanyaan()
        ->latest()
        ->paginate($paginate);
    }
}

<?php

namespace App\Http\Controllers\Api;

use League\Fractal\Pagination\IlluminatePaginatorAdapter;
use App\Jawaban;
use App\Pertanyaan;
use App\Transformers\JawabanTransformer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class JawabanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        $this->middleware('pengguna')->except(['index', 'show']);
    }
    public function index(Pertanyaan $pertanyaan)
    {
        $jawaban = $pertanyaan->jawaban()->latest()->paginate(5);

        return fractal()
        ->collection($jawaban, JawabanTransformer::class)
        ->paginateWith(new IlluminatePaginatorAdapter($jawaban))
        ->includeSubject()
        ->toArray();
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show(Jawaban $jawaban){
        return fractal()
        ->item($jawaban, JawabanTransformer::class)
        ->includeSubject()
        ->toArray();
    }
    public function store(Pertanyaan $pertanyaan, Request $request){
        $this->validate($request,[
            'konten' => 'required'
        ]);
        $path = 'image placeholder';
        if($request->hasFile('foto')){
            $this->validate($request,[
                'foto' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5000',
            ]);
            $path = $request->foto->store('images/jawaban');
        }
        $jawaban = Jawaban::create([
            'pertanyaan_id' => $pertanyaan->id,
            'konten' => request('konten'),
            'foto' => $path,
            'subject_id' => auth()->guard('web_user')->id(),
            'subject_type' => get_class(auth()->guard('web_user')->user()),
        ]);

        $response =  fractal()
        ->item($jawaban, JawabanTransformer::class)
        ->includeSubject()
        ->toArray();

        return response()->json($response, 200);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Jawaban $jawaban, Request $request)
    {
        if($request->hasFile('foto')){
            $this->validate($request,[
                'foto' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5000',
            ]);
            $path = $request->foto->store('images/jawaban');
            $jawaban->update('foto', $path);
        }
        $jawaban->update('konten', request('konten'));
        return response()->json(["message" => "Jawaban has been updated."], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jawaban $jawaban)
    {
        $jawaban->delete();
        return response()->json(["message" => "Jawaban has been deleted."], 204);
    }
}

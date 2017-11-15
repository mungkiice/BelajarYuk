<?php

namespace App\Http\Controllers\Api;

use League\Fractal\Pagination\IlluminatePaginatorAdapter;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pengajar;
use App\Pelajaran;
use App\Transformers\PengajarTransformer;
use App\Filters\PengajarFilter;

class PengajarController extends Controller
{
    public function __construct(){
        $this->middleware('auth:pengajar')->except(['index', 'show']);
    }
    public function index(Pelajaran $pelajaran = null, PengajarFilter $filter, $paginate = 12){
        $pengajar = Pengajar::paginate($paginate);
        if($pelajaran != null){            
            $pengajar = $this->getPengajar($pelajaran, $filter, $paginate);
        }
        return fractal()
        ->collection($pengajar, PengajarTransformer::class)
        ->paginateWith(new IlluminatePaginatorAdapter($pengajar))
        ->includeUlasan()
        ->includePelajaran()
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
        $this->validate(request(),[
            'nama' => 'required',
            'email' => 'required|email|unique:pengajars',
            'no_telp' => 'required|max:15',
            'no_ktp' => 'required|min:10|unique:pengajars',
            'alamat' => 'required',
            'password' => 'required|min:6|confirmed',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5000',
            'gender' => 'required',
            'pendidikan_terakhir' => 'required',
            'tarif' => 'required',
            'kecamatan_id' => 'required',
            'kabupaten_id' => 'required',
        ]);
        $bio = 'placeholder biography';
        $path = 'placeholder image';
        if($request->hasFile('foto')){
            $path = $request->foto->store('images/pengajar');
        }
        $pengajar = Pengajar::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'foto' => $path,
            'no_telp' => $request->no_telp,
            'no_ktp' => $request->no_ktp,
            'alamat' => $request->alamat,
            'bio' => $request->bio ?: $bio,
            'password' => bcrypt($request->password),
            'gender' => $request->gender,
            'pendidikan_terakhir' => $request->pendidikan_terakhir,
            'tarif' => $request->tarif,
            'kecamatan_id' => $request->kecamatan_id,
            'kabupaten_id' => $request->kabupaten_id,
        ]);

        $response =  fractal()
        ->item($pengajar, PengajarTransformer::class)
        ->toArray();

        return response()->json($response,200);
    }

    public function show($pelajaranID, Pengajar $pengajar){        
        return fractal()
        ->item($pengajar, PengajarTransformer::class)
        ->includeUlasan()
        ->includePelajaran()
        ->includeJawaban()
        ->toArray();
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
    public function update(Pengajar $pengajar, Request $request)
    { 
        $this->validate(request(),[
            'email' => 'email',
            'no_telp' => 'max:15',
        ]);
        if($request->hasFile('foto')){
            $this->validate($request, [
                'foto' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5000',
            ]);
            $path = $request->foto->store('images/pengajar');
            $pengajar->update(['foto' => $path]);
        }
        $pengajar->update([
            'nama' => $request->nama,
            'email' => $request->email,
            'no_telp' => $request->no_telp,
            'alamat' => $request->alamat,
            'bio' => $request->bio,
            'pekerjaan' => $request->pekerjaan,
            'gender' => $request->gender,
            'pendidikan_terakhir' => $request->pendidikan_terakhir,
            'tarif' => $request->tarif,
            'kecamatan_id' => $request->kecamatan_id,
            'kabupaten_id' => $request->kabupaten_id,
        ]);
        return $response()->json(['message' => 'Pengajar has been updated.'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pengajar $pengajar)
    {
        $pengajar->delete();
        return response()->json(["message" => "Pengajar has been deleted."], 204);
    }
    public function getPengajar(Pelajaran $pelajaran, $filter, $paginate){
        if($filter != null){
            return $pelajaran->pengajar()->filter($filter)->paginate($paginate);
        }else{
            return $pelajaran->pengajar()->paginate($paginate);
        }
    }
    public function setPlayerID(Request $request){
        $pengajar = auth()->guard('pengajar')->user();
        $pengajar->update([
            'onesignal_player_id' => $request->player_id,
        ]);
        return response()->json($pengajar, 200);
    }
    public function pesanGuru(Pengajar $pengajar, Request $request){
        return $pengajar->order(array(
            'user_id' => auth()->guard('user')->id(),
            'keterangan' => $request->keterangan,
            'sesi' => $request->sesi,
        ));
        // return response()->json(['status' => 'waiting for confirmation'],200);
    }
}

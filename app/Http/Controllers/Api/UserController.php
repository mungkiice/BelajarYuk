<?php

namespace App\Http\Controllers\Api;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Pengajar;
use App\Transformers\UserTransformer;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        // $this->middleware('auth:user')->except(['index', 'show']);
    }
    public function index()
    {
        $user = auth()->guard('user')->user();

        return fractal()
        ->item($user)
        ->transformWith(new UserTransformer)
        ->includeAktivitas()
        ->includePertanyaan()
        ->includeJawaban()
        ->toArray();
        // $users = User::paginate(5);
        // $response = fractal()
        // ->collection($users, UserTransformer::class)
        // ->paginateWith(new IlluminatePaginatorAdapter($users))
        // ->includeAktivitas()
        // ->toArray();
        // return response()->json($response, 200);
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
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5000',
            'gender' => 'required',
            'no_telp' => 'required|max:15',
            'alamat' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
            'kabupaten_id' => 'required',
            'kecamatan_id' => 'required',
        ]);
        $bio = 'biography placeholder';
        $path = 'image placeholder';
        if($request->hasFile('foto')){
            $path = $request->foto->store('images/pelajar', 'public');
        }
        $user = User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'gender' => $request->gender,
            'foto' => $path,
            'no_telp' => $request->no_telp,
            'alamat' => $request->alamat,
            'bio' => $request->bio ?: $bio,
            'password' => bcrypt($request->password),
            'kabupaten_id' => $request->kabupaten_id,
            'kecamatan_id' => $request->kecamatan_id
        ]);

        $response =  fractal()
        ->item($user, UserTransformer::class)
        ->toArray();

        return response()->json($response,200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return fractal()
        ->item($user)
        ->transformWith(new UserTransformer)
        ->includeAktivitas()
        ->includePertanyaan()
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
    public function update(User $user, Request $request)
    {
        if($request->hasFile('foto')){
            $this->validate($request,[
                'foto' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5000',
            ]);
            $path = $request->foto->store('images/pelajar', 'public');
            $user->update('foto', $path);
        }
        $user->update([
            'nama' => $request->nama,
            'email' => $request->email,
            'gender' => $request->gender,
            'no_telp' => $request->no_telp,
            'alamat' => $request->alamat,
            'bio' => $request->bio,
            'kabupaten_id' => $request->kabupaten_id,
            'kecamatan_id' => $request->kecamatan_id
        ]);
        return response()->json(['message' => 'User has been updated.'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return response()->json(["message" => "User has been deleted."],204);
    }

    public function setPlayerID(Request $request){
        $user = auth()->guard('user')->user();
        $user->update([
            'onesignal_player_id' => $request->player_id,
        ]);
        return fractal()
        ->item($user)
        ->transformWith(new UserTransformer)
        ->toArray();
    }
    public function responOrder(User $user, Request $request){
        if ($request->accepted) {
            return $user->acceptOrder([
                'pengajar_id' => auth()->guard('pengajar')->id(),
                'keterangan' => $request->keterangan,
                'sesi' => $request->sesi,
            ]);
        }else{
            return $user->cancelOrder([
                'keterangan' => $request->keterangan,
            ]);
        }
    }
}
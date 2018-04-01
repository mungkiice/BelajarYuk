<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Pengajar extends Authenticatable
{
    use Notifiable, HasApiTokens, OneSignalNotifications;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    // protected $fillable = [
    //     'nama', 'email', 'password', 'foto', 'no_telp', 'alamat', 'onesignal_player_id', 'bio', 'gender', 'pendidikan_terakhir', 'tarif', 'aktif', 'kecamatan_id', 'kabupaten_id' 
    // ];
    protected $guarded = [];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    protected $appends = ['JawabanCount'];
    public function pelajaran(){
    	return $this->belongsToMany(Pelajaran::class, 'mengajars');
    }
    public function jawaban(){
    	return $this->morphMany(Jawaban::class, 'subject');
    }
    public function kursus(){
    	return $this->hasMany(Kursus::class);
    }
    public function ulasan(){
    	return $this->hasMany(Ulasan::class);
    }
    public function addUlasan($ulasan){
        $this->ulasan()->create($ulasan);
    }
    public function kecamatan(){
        return $this->belongsTo(Kecamatan::class);
    }
    public function kota(){
        return $this->belongsTo(Kabupaten::class, 'kabupaten_id');
    }
    public function scopeFilter($query, $filter){
        return $filter->apply($query);
    }
    public function getJawabanCountAttribute(){
        return $this->jawaban()->count();
    }
    public function toggleAktif(){
        $status = !$this->aktif;
        $this->update([
            'aktif' => $status,
        ]);
        return $status;
    }
    public function order($data){
        $player_id = $this->onesignal_player_id;
        $data = (object) $data;
        $user = User::find($data->user_id);
        $total_pembayaran = $data->sesi * $this->tarif;
        return $this->sendMessageToUser(
            [
                'ac1bb48c-4d9b-405e-9185-3b1f183b82c9'
            ],
            [
                //Title Notification
                'en' => $user->nama,
                // 'en' => 'yoogs'
            ],[
                //SubTitle Notification
                'en' => $data->keterangan
                // 'en' => 'kehed'
            ],[
            // 'receiver_id' => $player_id,
                'user_id' => $user->id,
                'pelajaran' => $data->pelajaran,
                'keterangan' => $data->keterangan,
                'sesi' => $data->sesi,
                'total_pembayaran' => $total_pembayaran,
                'status' => 'orderPengajar'
            ],
            [
                [
                    'id' => 'ActionOrderAccept',
                    'text' => 'accept',
                    'icon' => 'ic_menu_share'
                ],
                [
                    'id' => 'ActionOrderDecline',
                    'text' => 'decline',
                    'icon' => 'ic_menu_send'
                ],
            ]
        );
    }
}

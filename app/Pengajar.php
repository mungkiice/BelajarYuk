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
    protected $fillable = [
        'nama', 'email', 'password', 'foto', 'no_telp', 'alamat', 'onesignal_player_id' 
    ];

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
    	return $this->belongsToMany(Pelajaran::Class, 'mengajars');
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
    public function order($data){
        $player_id = $this->onesignal_player_id;
        $data = (object) $data;
        $total_pembayaran = $data->sesi * $this->tarif;
        return $this->sendMessageToAll([
            // 'receiver_id' => $player_id,
            'user_id' => $data->user_id,
            'keterangan' => $data->keterangan,
            'sesi' => $data->sesi,
            'total_pembayaran' => $total_pembayaran
        ]);
    }
}

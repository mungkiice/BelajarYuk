<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Pengajar;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable, OneSignalNotifications;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    // protected $fillable = [
    //     'nama', 'email', 'password', 'foto', 'no_telp', 'alamat', 'onesignal_player_id'
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
    protected $appends = ['PertanyaanCount', 'JawabanCount'];

    public function aktivitas(){
        return $this->hasMany(Activity::class);
    }
    public function jawaban(){
        return $this->morphMany(Jawaban::class, 'subject');
    }
    public function pertanyaan(){
        return $this->hasMany(Pertanyaan::class);
    }
    public function kursus(){
        return $this->hasMany(Kursus::class);
    }
    public function ulasan(){
        return $this->hasMany(Ulasan::class);
    }
    public function getPertanyaanCountAttribute(){
        return $this->pertanyaan()->count();
    }
    public function getJawabanCountAttribute(){
        return $this->jawaban()->count();
    }
    public function kecamatan(){
        return $this->belongsTo(Kecamatan::class);
    }
    public function kota(){
        return $this->belongsTo(Kabupaten::class, 'kabupaten_id');
    }
    public function acceptOrder($data){
        $player_id = $this->onesignal_player_id;
        $data = (object) $data;
        $pengajar = Pengajar::findOrFail($data->pengajar_id);
        $total_pembayaran = $data->sesi * $pengajar->tarif;
        $this->kursus()->create([
            'pengajar_id' => $data->pengajar_id,
            'keterangan' => $data->keterangan,
            'sesi' => $data->sesi,
            'total_pembayaran' => $total_pembayaran
        ]);
        return $this->sendMessageToUser(
            [
                '80f10f05-9571-4ad2-b084-112048b6c65b'
            ],
            [
                'en' => $pengajar->nama . ' Accept Your Request',
            ],[
                'en' => $data->keterangan
            ],[
            // 'receiver_id' => $this->onesignal_player_id,
                'pengajar_id' => $data->pengajar_id,
                'keterangan' => $data->keterangan,
                'sesi' => $data->sesi,
                'total_pembayaran' => $total_pembayaran,
                'status' => 'acceptOrderPengajar'
            ]
        );
    }
    public function cancelOrder($data){
        $player_id = $this->onesignal_player_id;
        $data = (object) $data;
        return $this->sendMessageToUser(
            [
                '80f10f05-9571-4ad2-b084-112048b6c65b'
            ],
            [
                'en' => 'Order Has Been Declined',
            ],[
                'en' => 'Maaf dek, saya harus menang ifest'
            ],[
            // 'receiver_id' => $this->onesignal_player_id,
                'keterangan' => $data->keterangan,  
                'status' => 'cancelOrderPengajar'      
            ]
        );
    }
}

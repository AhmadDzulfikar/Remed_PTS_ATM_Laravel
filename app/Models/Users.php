<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    use HasFactory;

    protected $fillable = [
        'user',
        'pin'
    ];

    public function transfers() {
        return $this->hasMany(Transfer::class);
    }

    public function rekenings() {
        return $this->hasOne(Rekening::class);
    }

    public function tarik_tunais() {
        return $this->hasOne(tarikTunai::class);
    }    

    public function pembayarans() {
        return $this->hasMany(Pembayaran::class);
    }
    
}

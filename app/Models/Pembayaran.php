<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;

    protected $fillable = [
        'jenis',
        'nominal',
        'invoice_code'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}

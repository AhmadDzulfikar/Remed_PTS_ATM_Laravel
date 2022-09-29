<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transfer extends Model
{
    use HasFactory;

    protected $fillable = [
        'pengirim_id',
        'penerima_id',
        'nominal',
        'invoice_code'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
    
}

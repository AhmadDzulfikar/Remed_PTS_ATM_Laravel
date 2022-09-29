<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Pembayaran;

class PembayaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pembayaran::create([
            "jenis" => "listrik",
            "nominal" => 500000,
            "invoice_code" => "INV_33301"
        ]);

        Pembayaran::create([
            "jenis" => "pulsa",
            "nominal" => 250000,
            "invoice_code" => "INV_33301"
        ]);

        Pembayaran::create([
            "jenis" => "pulsa",
            "nominal" => 30000,
            "invoice_code" => "INV_33301"
        ]);
    }
}

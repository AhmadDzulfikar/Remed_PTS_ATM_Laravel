<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Transfer;

class TransferSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Transfer::create([
            "pengirim_id" => 1,
            "penerima_id" => 2,
            "nominal" => 100000,
            "invoice_code" => "INV_33301"
        ]);

        Transfer::create([
            "pengirim_id" => 2,
            "penerima_id" => 1,
            "nominal" => 350000,
            "invoice_code" => "INV_33301"
        ]);

        Transfer::create([
            "pengirim_id" => 3,
            "penerima_id" => 3,
            "nominal" => 50000,
            "invoice_code" => "INV_33301"
        ]);
    }
}

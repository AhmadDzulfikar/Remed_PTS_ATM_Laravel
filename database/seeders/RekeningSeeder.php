<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Rekening;

class RekeningSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Rekening::create([
            "user_id" => 1,
            "nominal" => 123,
        ]);

        Rekening::create([
            "user_id" => 2,
            "nominal" => 234,
        ]);

        Rekening::create([
            "user_id" => 3,
            "nominal" => 456,
        ]);
    }
}

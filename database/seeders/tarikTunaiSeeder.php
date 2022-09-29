<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\tarikTunai;

class tarikTunaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        tarikTunai::create([
            "user_id" => 1,
            "nominal" => 100000,
        ]);

        tarikTunai::create([
            "user_id" => 2,
            "nominal" => 350000,
        ]);

        tarikTunai::create([
            "user_id" => 3,
            "nominal" => 50000,
        ]);
    }
}

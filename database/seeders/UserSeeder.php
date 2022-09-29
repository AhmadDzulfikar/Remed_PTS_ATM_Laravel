<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            "user" => "sani",
            "pin" => '123'
        ]);

        User::create([
            "user" => "zula",
            "pin" => '456'
        ]);

        User::create([
            "user" => "swes",
            "pin" => '789'
        ]);
    }
}



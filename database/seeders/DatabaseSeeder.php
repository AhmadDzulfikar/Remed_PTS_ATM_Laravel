<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Pembayaran;
use App\Models\tarikTunai;
use App\Models\Transfer;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            UserSeeder::class
        ]);

        $this->call([
            TransferSeeder::class
        ]);

        $this->call([
            tarikTunaiSeeder::class
        ]);

        $this->call([
            RekeningSeeder::class
        ]);

        $this->call([
            PembayaranSeeder::class
        ]);

    }
}

<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Bus;
use App\Models\Driver;
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
        \App\Models\User::factory(10)->create();
        Bus::factory(10)->create();
        Driver::factory(10)->create();

        \App\Models\User::factory()->create([
            'username' => 'admin',
            'password' => bcrypt("passadmin")
        ]);
    }
}

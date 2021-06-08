<?php

namespace Database\Seeders;

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

        \App\Models\User::create([
            'name' => 'Sujan Molla',
            'phone' => '01994387497',
            'email' => 'smitexpert@gmail.com',
            'password' => bcrypt('123321bd'),
            'status' => 1
        ]);

        // DB::table('area_types')->insert([
        //     'name' => 'IN SIDE DHAKA',
        //     'created_at' => now(),
        //     'updated_at' => now()
        // ]);

        // ParcelStatusSeeder::class;
    }

}

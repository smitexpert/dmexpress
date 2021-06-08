<?php

namespace Database\Seeders;

use App\Models\AreaType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AreaTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AreaType::create([
            'name' => 'IN SIDE DHAKA',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        AreaType::create([
            'name' => 'SUBURBS',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    
        AreaType::create([
            'name' => 'DISTRICT',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}

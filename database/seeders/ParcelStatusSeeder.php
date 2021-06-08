<?php

namespace Database\Seeders;

use App\Models\ParcelStatus;
use Illuminate\Database\Seeder;

class ParcelStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ParcelStatus::create([
            'name' => 'PENDING'
        ]);

        ParcelStatus::create([
            'name' => 'APPROVED'
        ]);

        ParcelStatus::create([
            'name' => 'PICKUP'
        ]);

        ParcelStatus::create([
            'name' => 'SHIPPED'
        ]);

        ParcelStatus::create([
            'name' => 'SCHEDULED'
        ]);

        ParcelStatus::create([
            'name' => 'RETURNED'
        ]);

        ParcelStatus::create([
            'name' => 'CANCELLED'
        ]);

        ParcelStatus::create([
            'name' => 'DELIVERED'
        ]);
    }
}

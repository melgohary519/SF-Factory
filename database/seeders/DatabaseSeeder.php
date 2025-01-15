<?php

namespace Database\Seeders;

use App\Models\Supplier;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $this->call([
            ItemSeeder::class,
        ]);

        Supplier::create([
            'name' => "محمد",
            'phone' => "01017731403",
            'address' => "العمار",
        ]);
        Supplier::create([
            'name' => "احمد",
            'phone' => "0155555",
            'address' => "الجيزة",
        ]);

    }
}

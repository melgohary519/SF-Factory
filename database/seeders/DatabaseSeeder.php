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
        User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => \Hash::make('admin'),
        ]);
        
        // Supplier::create([
        //     'name' => "محمد",
        //     'phone' => "01017731403",
        //     'address' => "العمار",
        // ]);
        // Supplier::create([
        //     'name' => "احمد",
        //     'phone' => "0155555",
        //     'address' => "الجيزة",
        // ]);
        // $this->call([
        //     ItemSeeder::class,
        //     PurchaseInvoiceSeeder::class
        // ]);
        
    }
}

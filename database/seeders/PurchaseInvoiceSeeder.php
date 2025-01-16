<?php

namespace Database\Seeders;

use App\Models\PurchaseInvoice;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PurchaseInvoiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PurchaseInvoice::create([
            'weight' => 100,
            'goods_type' => 'Type1',
            'purchase_date' => '2023-01-01',
            'partner_name' => 'Partner1',
            'supplier_id' => 1,
            'supplier_name' => 'Supplier1',
            'supplier_address' => 'Address1',
            'supplier_phone' => '123456789',
            'payment_type' => 'cash',
            'purchase_price' => 1000.00,
            'dollar_rate' => 1.00,
            'dollar_value' => 1000.00,
            'shipping_fee' => 50.00,
            'shipping_dollar_rate' => 1.00,
            'shipping_dollar_value' => 50.00,
            'car_owner_name' => 'Owner1',
            'car_type' => 'Type1',
        ]);

        PurchaseInvoice::create([
            'weight' => 200,
            'goods_type' => 'Type2',
            'purchase_date' => '2023-02-01',
            'partner_name' => 'Partner2',
            'supplier_id' => 2,
            'supplier_name' => 'Supplier2',
            'supplier_address' => 'Address2',
            'supplier_phone' => '987654321',
            'payment_type' => 'credit',
            'purchase_price' => 2000.00,
            'dollar_rate' => 1.00,
            'dollar_value' => 2000.00,
            'shipping_fee' => 100.00,
            'shipping_dollar_rate' => 1.00,
            'shipping_dollar_value' => 100.00,
            'car_owner_name' => 'Owner2',
            'car_type' => 'Type2',
        ]);
    }
}

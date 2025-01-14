<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AppModelsItem>
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $purchasePrice = $this->faker->randomFloat(2, 100, 10000);
        $dollarValue = $this->faker->randomFloat(2, 5, 5000);
        $dollarRate = $purchasePrice / $dollarValue;

        return [
            'weight' => $this->faker->randomFloat(2, 1, 100),
            'goods_type' => $this->faker->word(),            
            'purchase_date' => $this->faker->date(),         
            'partner_name' => $this->faker->name(),          
            'supplier_name' => $this->faker->company(),      
            'payment_type' => $this->faker->randomElement(['cash', 'credit', 'debit']),
            'purchase_price' => $purchasePrice,             
            'dollar_rate' => round($dollarRate, 2),         
            'dollar_value' => $dollarValue,  
        ];
    }
}

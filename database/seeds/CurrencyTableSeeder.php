<?php

use Illuminate\Database\Seeder;
use App\Models\Currency;

class CurrencyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $currency = Currency::create([
            'code' => 'NGN',
            'name' => 'Nigerian Naira',
        ]);
    }
}

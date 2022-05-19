<?php

namespace Database\Seeders;

use App\Models\Cart;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('carts')->truncate();

        $carts = [
        
        ];

        foreach ($carts as $cart) {
           Cart::create([
                'customer_id'=> $cart[0],
                'quantity' => $cart[1],
                'total' => $cart[2],
            ]);
        }

        Schema::enableForeignKeyConstraints();
    }
}

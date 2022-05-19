<?php

namespace Database\Seeders;

use App\Models\CartDetail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CartDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('carts_detail')->truncate();

        $carts_detail = [
        	
           
        ];

        foreach ($carts_detail as $cart_detail) {
           CartDetail::create([
                'product_id'=> $cart_detail[0],
                'cart_id' => $cart_detail[1],
                'quantity' => $cart_detail[2],
                'total' => $cart_detail[3],
            ]);
        }

        Schema::enableForeignKeyConstraints();
    }
}

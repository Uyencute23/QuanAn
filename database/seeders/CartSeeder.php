<?php

namespace Database\Seeders;

use App\Models\Cart;
use App\Models\Customer;
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

        foreach (Customer::all() as $customer) {
           Cart::create([
                'customer_id'=> $customer->id,
                'quantity' => 0,
                'total' => 0,
            ]);
        }

        Schema::enableForeignKeyConstraints();
    }
}

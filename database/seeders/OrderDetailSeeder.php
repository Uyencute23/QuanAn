<?php

namespace Database\Seeders;

use App\Models\OrderDetail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class OrderDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('order_details')->truncate();

        $order_details = [
        	['1', '1', '5','20000'],
           
            
        ];

        foreach ($order_details as $order_detail) {
           OrderDetail::create([
                'order_id' => $order_detail[0],
                'product_id' => $order_detail[1],
                'quanlity' => $order_detail[2],
                'total' => $order_detail[3]
                
            ]);
        }

        Schema::enableForeignKeyConstraints();
    }
    
}

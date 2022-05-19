<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Schema::disableForeignKeyConstraints();
        // DB::table('orders')->truncate();

        // $orders = [
        //     ['1', '1','10000','100000','Đã huỷ'],
           

        // ];

        // foreach ($orders as $order) {
        //   Order ::create([
        //     'customer_id'=> $order[0],
        //     'promo_id' => $order[1],
        //     'shippingfee' => $order[2],
        //     'total' =>$order[3],
         //     'delivery_time' =>$order[4],
        //     'status'=>$order[5],
        //     ]);
        // }
        // Schema::enableForeignKeyConstraints();
  
    }
}

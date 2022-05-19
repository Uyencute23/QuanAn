<?php

namespace Database\Seeders;

use App\Models\Promotion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class PromotionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('promotions')->truncate();

        $promos = [
        ['BURGER MỚI - ƯU ĐÃI LÊN LẾN 30%',date('Y-m-d H:i:s'),date('Y-m-d H:i:s', strtotime(date('Y-m-d H:i:s'). ' +2 day')),30,20000,'','Ưu đãi giảm giá 30% giành cho mọi người khi ăn tại Chicken Cool'],
        ['CHICKEN COOL GIẢM GIÁ CỰC SỐC NÈ',date('Y-m-d H:i:s'),date('Y-m-d H:i:s', strtotime(date('Y-m-d H:i:s'). ' +2 day')),50,50000,'','Ưu đãi giảm giá 50% giành cho mọi người khi ăn tại Chicken Cool'],
        ['THÁNG 4 - GIẢM GIÁ CHO MỌI NGƯỜI',date('Y-m-d H:i:s'),date('Y-m-d H:i:s', strtotime(date('Y-m-d H:i:s'). ' +3 day')),10,15000,'','Ưu đãi giảm giá 10% giành cho mọi người khi ăn tại Chicken Cool'],
        ];

        foreach ($promos as $promo) {
            Promotion::create([
                'name' => $promo[0],
                'start_time' => $promo[1],
                'end_time'=> $promo[2],
                'precent'=> $promo[3],
                'max_price' => $promo[4],
                'link' => $promo[5],
                'description'=> $promo[6],
            ]);
        }

        Schema::enableForeignKeyConstraints();
    }
}

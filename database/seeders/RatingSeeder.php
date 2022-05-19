<?php

namespace Database\Seeders;

use App\Models\Rating;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class RatingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('ratings')->truncate();

        $ratings = [
        	['1', '1', '1','Gà sao dở quá dị chòi oi','https://danviet.mediacdn.vn/upload/4-2017/images/2017-11-01/Bat-mi-cong-thuc-lam-ga-ran-KFC-chuan-khong-can-chinh-2-1509506220-width960height720.jpg'],
            ['2', '1', '4','Ngon quá chời. Hihi','https://mokchangkorea.net/wp-content/uploads/Untitled-design-2-1.png'],
            
        ];

        foreach ($ratings as $rating) {
            Rating ::create([
                'customer_id' => $rating[0],
                'product_id' => $rating[1],
                'rating'=> $rating[2],
                'content'=> $rating[3],
                'img'=> $rating[4],
            ]);
        }
    
        Schema::enableForeignKeyConstraints();
  
    }
}

<?php

namespace Database\Seeders;

use App\Models\Staff;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class StaffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('staff')->truncate();

        $staffs = [
        	['1', '0359592486', 'https://haycafe.vn/wp-content/uploads/2022/01/Hinh-anh-cute.jpg'],
            ['2', '0987654322', 'https://freenice.net/wp-content/uploads/2021/10/Hinh-ve-don-gian-cute-dang-yeu-va-de-thuc-hien.jpg'],
            
        ];

        foreach ($staffs as $staff) {
            Staff::create([
                'user_id'=> $staff[0],
                'phone' => $staff[1],
                'img' => $staff[2],
                
            ]);
        }
    
        Schema::enableForeignKeyConstraints();
    
    }
}

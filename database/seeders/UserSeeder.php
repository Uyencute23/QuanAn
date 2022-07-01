<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('users')->truncate();

        $users = [
            ['Admin', '12345678', 'admin@gmail.com','9'],
            ['Nhân viên', '12345678', 'staff@gmail.com','1'],
        	['Khách bán lẻ', '12345678', 'client@gmail.com','2'], 
            ['Hà Tùng Lâm','12345678','Tunglam9x@gmail.com','2'], 
            ['Hà thu Hiền', '12345678', 'Hienha@gmail.com','2'], 
            ['Trần Thị Thanh', '12345678', 'Thanh9x@gmail.com','2'], 
            ['Trần Thị Hoa', '12345678', 'Hoahong@gmail.com','2'], 
            ['Hồ Thị Lê' , '12345678', 'Leho9x@gmail.com','2'], 
            ['Hồ Thị Thảo' , '12345678', 'Thaoho@gmail.com','2'], 
            ['Nguyễn Văn Tiến' , '12345678', 'Tiennguyen9x@gmail.com','2'], 
            ['Nguyễn Thu Hà', '12345678', 'Thuha@gmail.com','2'], 
            ['Nguyễn Bảo Anh' , '12345678', 'Baoanh9x@gmail.com','2'], 
            ['Nguyễn Trúc Quỳnh', '12345678', 'Quynhnguyen@gmail.com','2'], 
            ['Lê Thị Hậu' , '12345678', 'Haule9x@gmail.com','2'], 
            ['Lê Trung Tính', '12345678', 'Trungtinh@gmail.com','2'], 
            ['Lê Văn Đạt' , '12345678', 'Datle9x@gmail.com','2'], 
            ['Lê Trúc Nhân', '12345678', 'Trucnhan@gmail.com','2'], 
            ['Huỳnh Ánh Nhựt' , '12345678', 'Nhuthuynh9x@gmail.com','2'], 
            ['Huỳnh Thị Nghi' , '12345678', 'Nghihuynh@gmail.com','2'], 
            ['Ngô Thanh Ngọc' , '12345678', 'Thanhngoc9x@gmail.com','2'], 
            ['Ngô Thị Điệp', '12345678', 'Diepngo@gmail.com','2'], 
            ['Trần Văn Phong' , '12345678', 'Phongtran9x@gmail.com','2'], 
            ['Trần Mỹ Như ', '12345678', 'Mynhu@gmail.com','2'],
        ];

        foreach ($users as $user) {
            User::create([
                'name' => $user[0],
                'password' => Hash::make($user[1]),
                'email' => $user[2],
                'role_id' => $user[3]
            ]);
        }

        Schema::enableForeignKeyConstraints();
    }
}

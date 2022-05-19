<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('posts')->truncate();

        $posts = [
            ['1', 'KHAI TRƯƠNG CỬA HÀNG ĐẦU TIÊN TẠI NHA TRANG','haha'],
            ['2', 'GẶP GỠ “HỘI CHỊ EM” NHÂN NGÀY 8/3','hihi']

        ];

        foreach ($posts as $post) {
            Post::create([
                'staff_id' => $post[0],
                'name' => $post[1],
                'content' => $post[2],
            ]);
        }
        Schema::enableForeignKeyConstraints();
    }
}

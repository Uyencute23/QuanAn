<?php

namespace Database\Seeders;

use App\Models\ProductType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class ProductTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('product_types')->truncate();

        $product_types = [
        	['GÀ RÁN', 'https://jollibee.com.vn/uploads/dish/a1635188096ae4-combo149khatinh.png', 'Được chế biến từ những miếng Gà giòn thơm, gia vị đặc trưng, và đặc biệt không cay, Gà Giòn Không Cay của KFC đã khiến các tín đồ Gà rán, đặc biệt trẻ nhỏ, mê mẩn mãi không dứt. Chỉ với 35k/ miếng, ngoài ra bạn có thể lựa chọn các Combo Gà Giòn Không Cay hấp dẫn khác nữa đấy.'],
            ['MỲ Ý', 'https://jollibee.com.vn/uploads/dish/eb4ecd4d19ec89-2840009_01myynho01khoaivua01pepsi.png', 'Mì Ý sốt bò băm hay còn gọi là Spaghetti, là món ăn ngon và phổ biến, dùng kèm với hỗn hợp sốt cà chua và thịt bò bằm có nguồn gốc từ Italia.'],
            ['BÁNH BURGERS','https://mcdonalds.vn/uploads/2018/food/burgers/mcroyal-deluxe.png','amburger[a] (tiếng Việt đọc là hăm-bơ-gơ hay hem-bơ-gơ, phát âm tiếng Anh là /ˈhæmbɜrɡər/) là một loại thức ăn bao gồm bánh mì kẹp thịt xay (thường là thịt bò) ở giữa. Miếng thịt có thể được nướng, chiên, hun khói hay nướng trên lửa. Hamburger thường ăn kèm với pho mát, rau diếp, cà chua, hành tây, dưa chuột muối chua, thịt xông khói, hoặc ớt; ngoài ra, các loại gia vị như sốt cà chua, mù tạt, sốt mayonnaise, đồ gia vị, hoặc "nước xốt đặc biệt", (thường là một biến tấu của sốt Thousand Island) cũng có thể thể rưới lên món bánh. Loại bánh hamburger có topping là pho mát được mọi người gọi là hamburger pho mát'],
            ['KEM','https://jollibee.com.vn/uploads/dish/d01402ed11976b-kemsundeadau.png','Kem vani là loại kem lạnh sử dụng vani làm hương vị, đặc biệt là ở Bắc Mỹ và châu Âu.[1] Kem vani, giống như các hương vị kem khác, ban đầu được tạo ra bằng cách làm lạnh hỗn hợp làm từ kem, đường và vani bên trên một hộp đựng đá và muối.'],
            ['NƯỚC','https://jollibee.com.vn/uploads/dish/82650b1b8ab424-1890056_cacao.png','Nước ngọt là một loại nước không mặn'],
        ];

        foreach ($product_types as $product_type) {
            ProductType::create([
                'name'=> $product_type[0],
                'img' => $product_type[1],
                'description' => $product_type[2],
            ]);
        }

        Schema::enableForeignKeyConstraints();
    
    }
}

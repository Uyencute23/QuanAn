<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Schema::disableForeignKeyConstraints();
        DB::table('products')->truncate();

        $products = [
        	['1','GÀ RÁN KHÔNG CAY','35000','https://jollibee.com.vn/uploads/dish/d1834d87116836-2mingggin.png','Được chế biến từ những miếng Gà giòn thơm, gia vị đặc trưng, và đặc biệt không cay, Gà Giòn Không Cay của KFC đã khiến các tín đồ Gà rán, đặc biệt trẻ nhỏ, mê mẩn mãi không dứt.'],
            ['1', '4 MIẾNG GÀ RÁN KHÔNG CAY', '105000','https://jollibee.com.vn/uploads/dish/427e7a3136f84a-4mingggin.png','Được chế biến từ những miếng Gà giòn thơm, gia vị đặc trưng, và đặc biệt không cay, Gà Giòn Không Cay của KFC đã khiến các tín đồ Gà rán, đặc biệt trẻ nhỏ, mê mẩn mãi không dứt. '],
            ['1','GÀ GIÒN SỐT CAY','35000','https://jollibee.com.vn/uploads/dish/cc6e01cdf7b86b-1810036_01miengcc.png','Được chế biến từ những miếng Gà giòn thơm, gia vị đặc trưng, và đặc biệt không cay, Gà Giòn Không Cay của KFC đã khiến các tín đồ Gà rán, đặc biệt trẻ nhỏ, mê mẩn mãi không dứt.'],
            ['1','GÀ SỐT CAY + CƠM','55000','https://jollibee.com.vn/uploads/dish/38b2b63ad78a31-1gstcaycm.jpg','Được chế biến từ những miếng Gà giòn thơm, gia vị đặc trưng, và đặc biệt không cay, Gà Giòn Không Cay của KFC đã khiến các tín đồ Gà rán, đặc biệt trẻ nhỏ, mê mẩn mãi không dứt.'],
            ['1','COMBO NGỌT CAY BẤT NGỜ','135000','https://d1sag4ddilekf6.azureedge.net/compressed_webp/items/VNITE20220228154501041247/detail/b19b025e117f4c6db4e0053e1f04cdd2_1646063101888114390.webp','Được chế biến từ những miếng Gà giòn thơm, gia vị đặc trưng, và đặc biệt không cay, Gà Giòn Không Cay của KFC đã khiến các tín đồ Gà rán, đặc biệt trẻ nhỏ, mê mẩn mãi không dứt.'],
            ['2','MỲ Ý SỐT BÒ BẰM','35000','https://jollibee.com.vn/uploads/dish/7b8e79a673f041-1840007_01myylon.png','Mì Ý sốt bò băm hay còn gọi là Spaghetti, là  là sự kết hợp hài hòa giữa sợi mì Ý không cứng và vón cục vào nhau, còn xốt bò bằm thơm phức, sánh mịn, vừa vị. có nguồn gốc từ Italia.'],
            ['2','MÌ Ý + 2 GÀ GIÒN + NƯỚC ','135000','https://jollibee.com.vn/uploads/dish/7b8e79a673f041-1840007_01myylon.png','Mì Ý sốt bò băm hay còn gọi là Spaghetti, là  là sự kết hợp hài hòa giữa sợi mì Ý không cứng và vón cục vào nhau, còn xốt bò bằm thơm phức, sánh mịn, vừa vị. có nguồn gốc từ Italia.'],
            ['2','MÌ Ý SỐT BÒ BẰM LỚN + NƯỚC NGỌT','75000','https://jollibee.com.vn/uploads/dish/7befdf5dbb9328-2840019_01myylon01pepsi.png','Mì Ý sốt bò băm hay còn gọi là Spaghetti, là  là sự kết hợp hài hòa giữa sợi mì Ý không cứng và vón cục vào nhau, còn xốt bò bằm thơm phức, sánh mịn, vừa vị. có nguồn gốc từ Italia.'],
            ['2','GÀ GIÒN + MỲ Ý + 01 NƯỚC','100000','https://jollibee.mangoads.com.vn/uploads/dish/c1e40685ccdae1-myync.png','Mì Ý sốt bò băm hay còn gọi là Spaghetti, là  là sự kết hợp hài hòa giữa sợi mì Ý không cứng và vón cục vào nhau, còn xốt bò bằm thơm phức, sánh mịn, vừa vị. có nguồn gốc từ Italia.'],
            ['3','SANDWICH THỊT NƯỚNG BBQ','30000','https://jollibee.com.vn/uploads/dish/20522844a2900d-1830004_sandwichesbbq.png','Hamburger hay  là một loại thức ăn bao gồm bánh mì kẹp thịt xay (thường là thịt bò) ở giữa. Miếng thịt có thể được nướng, chiên, hun khói hay nướng trên lửa.'],
            ['3','SANDWICH GÀ GIÒN','30000','https://jollibee.com.vn/uploads/dish/92d27d47dadbfc-hambugerlon.jpg','Hamburger hay  là một loại thức ăn bao gồm bánh mì kẹp thịt xay (thường là thịt bò) ở giữa. Miếng thịt có thể được nướng, chiên, hun khói hay nướng trên lửa.'],
            ['3','SANDWICH GÀ GIÒN + NƯỚC NGỌT','35000','https://jollibee.com.vn/uploads/dish/f0509916cba46a-2860002_sandwichga01pepsi.png','Hamburger hay  là một loại thức ăn bao gồm bánh mì kẹp thịt xay (thường là thịt bò) ở giữa. Miếng thịt có thể được nướng, chiên, hun khói hay nướng trên lửa.'],
            ['3','SANDWICH BBQ + KHOAI TÂY + NƯỚC NGỌT','55000','https://jollibee.com.vn/uploads/dish/ca79195ff54344-2860007_sandwichbbq01khoaivua01pepsi.png','Hamburger hay  là một loại thức ăn bao gồm bánh mì kẹp thịt xay (thường là thịt bò) ở giữa. Miếng thịt có thể được nướng, chiên, hun khói hay nướng trên lửa.'],
            ['4','KEM SỮA TƯƠI','5000','https://jollibee.com.vn/uploads/dish/ba9d396f70568c-kemvani201.png','Kem vani là loại kem lạnh sử dụng vani làm hương vị, đặc biệt là ở Bắc Mỹ và châu Âu.[1] Kem vani, giống như các hương vị kem khác, ban đầu được tạo ra bằng cách làm lạnh hỗn hợp làm từ kem, đường và vani bên trên một hộp đựng đá và muối'],
            ['4','KEM SÔCLA','8000','https://jollibee.com.vn/uploads/dish/c400652c2a03e0-chocolateicecream01.png','Kem vani là loại kem lạnh sử dụng vani làm hương vị, đặc biệt là ở Bắc Mỹ và châu Âu.[1] Kem vani, giống như các hương vị kem khác, ban đầu được tạo ra bằng cách làm lạnh hỗn hợp làm từ kem, đường và vani bên trên một hộp đựng đá và muối'],
            ['4','KEM SUNDAES SÔCÔLA','15000','https://jollibee.com.vn/uploads/dish/192dcb48e7393a-kemsocola16.png','Kem vani là loại kem lạnh sử dụng vani làm hương vị, đặc biệt là ở Bắc Mỹ và châu Âu.[1] Kem vani, giống như các hương vị kem khác, ban đầu được tạo ra bằng cách làm lạnh hỗn hợp làm từ kem, đường và vani bên trên một hộp đựng đá và muối'],
            ['4','KEM SUNDAES DÂU','15000','https://jollibee.com.vn/uploads/dish/d01402ed11976b-kemsundeadau.png','Kem vani là loại kem lạnh sử dụng vani làm hương vị, đặc biệt là ở Bắc Mỹ và châu Âu.[1] Kem vani, giống như các hương vị kem khác, ban đầu được tạo ra bằng cách làm lạnh hỗn hợp làm từ kem, đường và vani bên trên một hộp đựng đá và muối'],
            ['5','TRÀ ĐÀO','20000','https://jollibee.com.vn/uploads/dish/564edf0846c268-tradao.png','Trà đào là loại thức uống rất được ưa chuộng hiện nay đặc biệt là trong đối tượng trẻ yêu thích vị chua ngọt, thanh mát mà trà đào mang lại. Trà đào được kết hợp hương vị trà đặc trưng cùng hương vị trái cây .'],
            ['5','CA CAO SỮA ĐÁ','20000','https://jollibee.com.vn/uploads/dish/c5ded2aa5f7b3c-2mienggaran19.png','Ca cao sữa đá với vị đắng ngọt, thơm béo, mát lạnh tuyệt vời chính là một trong những thức uống giúp bạn đập tan đi cơn khát trong những ngày hè oi bức này.'],
            ['5','MIRINDA SODA','18000','https://jollibee.com.vn/uploads/dish/5ab035ed73bcf8-sodaln1.png','Sản phẩm Mirinda Hương Soda Kem từ Mirinda là sự kết hợp độc đáo giữa Soda và Kem. Mirinda Soda Kem giữ nguyên sự sảng khoái của nước uống có ga và vị kem thơm ngon bùi béo.'],
            ['5','PEPSI','18000','https://jollibee.com.vn/uploads/dish/ba19009c770377-750x750.png','Pepsi là một đồ uống giải khát có gas, lần đầu tiên được sản xuất bởi Bradham. Ông pha chế ra một loại nước uống dễ tiêu làm từ nước cacbonat, đường, vani '],
        ];

        foreach ($products as $product) {
            Product::create([
                'product_type_id'=> $product[0],
                'name'=> $product[1],
                'price' => $product[2],
                'img' => $product[3],
                'description' => $product[4],
                     ]);
        }
        Schema::enableForeignKeyConstraints();
    
    }
}

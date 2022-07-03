<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        // $this->call(CustomerSeeder::class);
        $this->call(CartSeeder::class);
        // $this->call(OrderDetailSeeder::class);
        $this->call(OrderSeeder::class);
        $this->call(PostSeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(ProductTypeSeeder::class);
        $this->call(PromotionSeeder::class);
        // $this->call(RatingSeeder::class);
       
        // $this->call(StaffSeeder::class);
        
    }
}

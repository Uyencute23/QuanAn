<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class RoleSeeder extends Seeder
{
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('roles')->truncate();

        $roles = [
        	
            'Nhân viên',
            'Khách Hàng' 
        ];

        foreach ($roles as $role) {
            Role::create([
                'name' => $role,
            ]);
        }
        Role::create([
            'name' =>'Admin',
            'id'=>9
        ]);

        Schema::enableForeignKeyConstraints();
    }
    
}

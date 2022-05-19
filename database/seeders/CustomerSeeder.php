<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('customers')->truncate();

        $customers = [
            ['1', '0123456789', 'Nha Trang', 'https://i.pinimg.com/736x/35/ff/f8/35fff80dc9c4831c0e376d169d6b503b.jpg'],
            ['2', '0785785755', 'Nha Trang', 'https://i.pinimg.com/736x/35/ff/f8/35fff80dc9c4831c0e376d169d6b503b.jpg'],
            ['1', '0123456789', 'Nha Trang', 'https://i.pinimg.com/736x/35/ff/f8/35fff80dc9c4831c0e376d169d6b503b.jpg'],
            ['2', '0785785755', 'Vinh Hai', 'https://i.pinimg.com/736x/35/ff/f8/35fff80dc9c4831c0e376d169d6b503b.jpg'],
            ['3', '0123858800', 'Ninh Hoa', 'https://i.pinimg.com/736x/35/ff/f8/35fff80dc9c4831c0e376d169d6b503b.jpg'],
            ['4', '0162386789', 'Van Ninh', 'https://i.pinimg.com/736x/35/ff/f8/35fff80dc9c4831c0e376d169d6b503b.jpg'],
            ['5', '0798125755', 'Cam Ranh', 'https://i.pinimg.com/736x/35/ff/f8/35fff80dc9c4831c0e376d169d6b503b.jpg'],
            ['6', '0185756789', 'Khanh Vinh', 'https://i.pinimg.com/736x/35/ff/f8/35fff80dc9c4831c0e376d169d6b503b.jpg'],
            ['7', '0785142655', 'Dien Khanh', 'https://i.pinimg.com/736x/35/ff/f8/35fff80dc9c4831c0e376d169d6b503b.jpg'],
            ['8', '0123420589', 'Ha Noi', 'https://i.pinimg.com/736x/35/ff/f8/35fff80dc9c4831c0e376d169d6b503b.jpg'],
            ['9', '0785946755', 'Long An', 'https://i.pinimg.com/736x/35/ff/f8/35fff80dc9c4831c0e376d169d6b503b.jpg'],
            ['10', '0123033789', 'Dien Toan', 'https://i.pinimg.com/736x/35/ff/f8/35fff80dc9c4831c0e376d169d6b503b.jpg'],
            ['11', '0780862755', 'Binh Thuan', 'https://i.pinimg.com/736x/35/ff/f8/35fff80dc9c4831c0e376d169d6b503b.jpg'],
            ['12', '0127776789', 'Dien Phuoc', 'https://i.pinimg.com/736x/35/ff/f8/35fff80dc9c4831c0e376d169d6b503b.jpg'],
            ['13', '0789892755', 'Quang Ninh', 'https://i.pinimg.com/736x/35/ff/f8/35fff80dc9c4831c0e376d169d6b503b.jpg'],
            ['14', '0100446789', 'Khanh Dong', 'https://i.pinimg.com/736x/35/ff/f8/35fff80dc9c4831c0e376d169d6b503b.jpg'],
            ['15', '0785884655', 'Nha Trang', 'https://i.pinimg.com/736x/35/ff/f8/35fff80dc9c4831c0e376d169d6b503b.jpg'],
            ['16', '0123415589', 'Son La', 'https://i.pinimg.com/736x/35/ff/f8/35fff80dc9c4831c0e376d169d6b503b.jpg'],
            ['17', '0785449955', 'Phu Yen', 'https://i.pinimg.com/736x/35/ff/f8/35fff80dc9c4831c0e376d169d6b503b.jpg'],
            ['18', '0123109789', 'Ninh Binh', 'https://i.pinimg.com/736x/35/ff/f8/35fff80dc9c4831c0e376d169d6b503b.jpg'],
            ['19', '0785100055', 'An Giang', 'https://i.pinimg.com/736x/35/ff/f8/35fff80dc9c4831c0e376d169d6b503b.jpg'],
            ['20', '0785146755', 'Nha Trang', 'https://i.pinimg.com/736x/35/ff/f8/35fff80dc9c4831c0e376d169d6b503b.jpg'],

        ];

        foreach ($customers as $customer) {
            Customer::create([
                'user_id' => $customer[0],
                'phone' => $customer[1],
                'address' => $customer[2],
                'img' => $customer[3],
            ]);
        }

        Schema::enableForeignKeyConstraints();
    }
}

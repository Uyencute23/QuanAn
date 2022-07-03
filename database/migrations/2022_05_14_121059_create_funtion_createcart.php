<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateFuntionCreatecart extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //check env is production or not
        if (env('APP_ENV') == 'production') {
            DB::unprepared(
                'CREATE OR REPLACE FUNCTION create_cart()
                RETURNS trigger AS $$
                BEGIN
                    INSERT INTO carts (customer_id, quantity, total) VALUES(NEW.id, 0, 0);
                    RETURN NULL;
                END
                $$ LANGUAGE plpgsql;'
            );
        }

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP FUNCTION  create_cart;');
    }
}

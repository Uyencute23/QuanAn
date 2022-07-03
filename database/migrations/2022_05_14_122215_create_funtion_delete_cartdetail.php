<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateFuntionDeleteCartdetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared(
            'CREATE OR REPLACE FUNCTION delete_detail()
            RETURNS trigger AS $$
            DECLARE 
            totala float := (SELECT SUM(total*quantity) FROM cart_details WHERE cart_id = OLD.cart_id);
            quan integer := (SELECT SUM(quantity) FROM cart_details WHERE cart_id = OLD.cart_id);
            BEGIN
                   UPDATE carts 
                   SET
                    total = totala,
                    quantity = quan
                   WHERE id = OLD.cart_id;
                   RETURN NULL;
                END
            $$ LANGUAGE plpgsql;'
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP FUNCTION  delete_detail;');
    }
}

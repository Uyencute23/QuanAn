<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateFuntionUpdateCartdetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (env('APP_ENV') == 'production') {
            DB::unprepared(
                'CREATE OR REPLACE FUNCTION update_detail()
            RETURNS trigger AS $$
            DECLARE 
            totala float := (SELECT SUM(total*quantity) FROM cart_details WHERE cart_id = NEW.cart_id);
            quan integer := (SELECT SUM(quantity) FROM cart_details WHERE cart_id = NEW.cart_id);
            BEGIN
                   UPDATE carts 
                   SET
                   total = totala,
                     quantity = quan
                   WHERE id = NEW.cart_id;
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
        DB::unprepared('DROP FUNCTION  update_detail;');
    }
}

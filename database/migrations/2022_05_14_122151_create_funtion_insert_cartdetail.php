<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateFuntionInsertCartdetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared(
            'CREATE OR REPLACE FUNCTION insert_detail()
            RETURNS trigger AS $$
            BEGIN
                   WITH myconstants (total, quan) as (
                    values ((SELECT SUM(total*quantity) FROM cart_details WHERE cart_id = NEW.cart_id),(SELECT SUM(quantity) FROM cart_details WHERE cart_id = NEW.cart_id))
                    )
                   UPDATE carts 
                   SET
                        total = total,
                        quantity = quan
                   WHERE id = NEW.cart_id;
                   RETURN NEW;
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
        DB::unprepared('DROP FUNCTION  insert_detail');
    }
}

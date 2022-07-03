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
            BEGIN
                    WITH myconstants (totala, quana) as (
                    values ((SELECT SUM(total*quantity) FROM cart_details WHERE cart_id = OLD.cart_id),(SELECT SUM(quantity) FROM cart_details WHERE cart_id = OLD.cart_id))
                    );
                   IF (totala IS NULL) THEN
                   SET totala = 0;
                   END IF;
                   IF (quana IS NULL) THEN
                   SET quana = 0;
                   END IF;
                   UPDATE carts 
                   SET
                    total = totala,
                    quantity = quana
                   WHERE id = OLD.cart_id;
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
        DB::unprepared('DROP FUNCTION  delete_detail');
    }
}

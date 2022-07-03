<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // DB::unprepared(
        //     'CREATE TRIGGER after_delete_cartdetails
        //         AFTER DELETE ON cart_details
        //         FOR EACH ROW 
        //         BEGIN
        //            SET @total = (SELECT SUM(total*quantity) FROM cart_details WHERE cart_id = OLD.cart_id);
        //            SET @quan = (SELECT SUM(quantity) FROM cart_details WHERE cart_id = OLD.cart_id);
        //            IF ( @total IS NULL) THEN
        //            SET @total = 0;
        //            END IF;
        //            IF (@quan IS NULL) THEN
        //            SET @quan = 0;
        //            END IF;
        //            UPDATE carts 
        //            SET
        //             total = @total,
        //             quantity = @quan
        //            WHERE id = OLD.cart_id;
        //         END'
        // );
        DB::unprepared(
            'CREATE TRIGGER after_delete_cartdetails
                AFTER DELETE ON cart_details
                FOR EACH ROW 
                EXECUTE PROCEDURE delete_detail();
                '
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        DB::unprepared('DROP TRIGGER after_delete_cartdetails');
    }
};

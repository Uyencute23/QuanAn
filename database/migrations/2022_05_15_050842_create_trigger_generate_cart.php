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
        if (env('APP_ENV') == 'production') {
            DB::unprepared(
                'CREATE TRIGGER generate_cart 
            AFTER INSERT ON customers
            FOR EACH ROW 
            EXECUTE PROCEDURE create_cart();'
            );
        } else {
            DB::unprepared(
                'CREATE TRIGGER generate_cart 
            AFTER INSERT ON customers
            FOR EACH ROW 
            BEGIN
                INSERT INTO carts (customer_id, quantity, total) VALUES(NEW.id, "0", "0");
            END'
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
        DB::unprepared('DROP TRIGGER generate_cart on customers;');
    }
};

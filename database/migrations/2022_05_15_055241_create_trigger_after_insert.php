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
                'CREATE TRIGGER after_insert_user
            AFTER INSERT ON users
            FOR EACH ROW 
            EXECUTE PROCEDURE insert_user();'
            );
        } else {
            DB::unprepared(
                'CREATE TRIGGER after_insert_user
            AFTER INSERT ON users
            FOR EACH ROW 
            BEGIN
                IF(NEW.role_id = 1)
                THEN
                INSERT INTO staff (user_id, created_at,updated_at) VALUES (NEW.id, NEW.created_at, NEW.updated_at);
                END IF;
                IF(NEW.role_id = 2)
                THEN
                INSERT INTO customers (user_id,created_at,updated_at) VALUES (NEW.id, NEW.created_at, NEW.updated_at);
                END IF;
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
        DB::unprepared('DROP TRIGGER after_insert_user on users;');
    }
};

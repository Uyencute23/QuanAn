<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateFuntionInsertuser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared(
            'CREATE OR REPLACE FUNCTION insert_user()
            RETURNS trigger AS $$
            BEGIN
                IF(NEW.role_id = 1)
                THEN
                INSERT INTO staff (user_id, created_at,updated_at) VALUES (NEW.id, NEW.created_at, NEW.updated_at);
                END IF;
                IF(NEW.role_id = 2)
                THEN
                INSERT INTO customers (user_id,created_at,updated_at) VALUES (NEW.id, NEW.created_at, NEW.updated_at);
                END IF;
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
        DB::unprepared('DROP FUNCTION  insert_user');
    }
}

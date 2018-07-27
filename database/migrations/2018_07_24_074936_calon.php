<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Calon extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calon', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('ic', 12);
            $table->string('email', 50);
            $table->softDeletes();
            $table->timestamps();
            // Tambah
            $table->integer('user_id');
            $table->integer('sesi_id');
            $table->string('asas');
            $table->string('ulasan')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}

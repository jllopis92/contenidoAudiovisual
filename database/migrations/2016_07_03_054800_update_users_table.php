<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('rut')->unique()->after('id');
            $table->string('country')->after('password');
            $table->string('city')->after('country');
            $table->string('sector')->after('city');
            $table->enum('tipo', array('profesor', 'alumno', 'administrador', 'externo'))->after('sector');
            $table->softDeletes();
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

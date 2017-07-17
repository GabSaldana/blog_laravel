<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {//Schema es la clase que permite modificar las tablas, Blueprint añade atributos y funciones a la tabla
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->enum('type',['paciente','doctor'])->default('doctor');//enum permite poner opciones   a un campo de la tabla, se le asigna como valor por defecto member
            $table->rememberToken();
            $table->timestamps();//crea dos columnas created_at() y updated_at() laravel por defecto pide estos campos en las migraciones
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}

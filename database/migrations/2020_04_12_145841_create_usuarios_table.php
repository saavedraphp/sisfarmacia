<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->Increments('usua_id');
            $table->string('usua_nombre');
            $table->string('usua_email');
            $table->dateTime('usua_f_nacimiento', null)->nullable();  
            $table->integer('pais_id')->nullable();  
            $table->integer('estado_id')->nullable();  
            $table->integer('ciudad_id')->nullable();  
            $table->string('usua_direccion')->nullable();
            $table->string('usua_code_zip')->nullable();
            $table->timestamps();
            $table->softDeletes();  
            //$table->foreign('pais_id')->references('id')->on('pais');
            
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->bigIncrements('prod_id');
            $table->bigInteger('empr_id');
            $table->bigInteger('pres_id');
            $table->string('prod_nombre',200);
            $table->char('prod_codigo',20);

            $table->string('prod_sku',45);
            $table->string('prod_ean',45);
            $table->smallInteger('prod_cantidad');
            $table->float('prod_precio', 8, 2);
            
            $table->string('prod_serie',45);
            $table->string('prod_lote',45);
            $table->longText('prod_comentario');
            $table->smallInteger('prod_stock');
            
            
            $table->char('prod_estado',10);
            $table->timestamp('prod_fecha_vencimiento', 0);
            $table->timestamps();
            $table->softDeletes('deleted_at', 0);	
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos');
    }
}

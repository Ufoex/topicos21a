<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ventas', function (Blueprint $table) {
            $table->id();
            $table->string('metodoPago');
            $table->integer('cantidad');
            $table->integer('total');
            $table->unsignedBigInteger('productos_id')->nullable()->unique();
            $table->foreign('productos_id')
                ->references('id')
                ->on('productos')
                ->onDelete('set null')
                ->onUpdate('cascade')
                ->nullOnDelete();
            $table->unsignedBigInteger('clientes_id')->nullable()->unique();
            $table->foreign('clientes_id')
                ->references('id')
                ->on('clientes')
                ->onUpdate('cascade')
                ->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ventas');
    }
}

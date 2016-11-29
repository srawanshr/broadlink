<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('plan_id')->unsigned();
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('description_raw');
            $table->text('description_html');
            $table->float('price');
            $table->integer('order');
            $table->boolean('is_active')->default(false);
            $table->foreign('plan_id')
                ->references('id')
                ->on('plans')
                ->onDelete('restrict');
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
        Schema::drop('products');
    }
}

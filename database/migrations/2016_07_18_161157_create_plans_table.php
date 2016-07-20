<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlansTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plans', function (Blueprint $table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('service_id')->unsigned();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('meta_description');
            $table->text('description_raw');
            $table->text('description_html');
            $table->integer('order');
            $table->boolean('is_active')->default(0);
            $table->foreign('service_id')
                ->references('id')
                ->on('services')
                ->onDelete('cascade');
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
        Schema::drop('plans');
    }
}

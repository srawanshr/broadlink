<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create( 'orders', function( Blueprint $table ) {
            $table->increments( 'id' );
            $table->integer( 'product_id' )->unsigned();
            $table->integer( 'invoice_id' )->unsigned();
            $table->integer( 'user_id' )->unsigned();
            $table->string( 'pin' );
            $table->foreign( 'user_id' )
                ->references( 'id' )
                ->on( 'users' )
                ->onDelete( 'restrict' );
            $table->foreign( 'invoice_id' )
                ->references( 'id' )
                ->on( 'invoices' )
                ->onDelete( 'restrict' );
            $table->foreign( 'product_id' )
                ->references( 'id' )
                ->on( 'products' )
                ->onDelete( 'restrict' );
            $table->timestamps();
        } );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop( 'orders' );
    }
}

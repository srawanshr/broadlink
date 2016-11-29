<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create( 'posts', function( Blueprint $table ) {
            $table->engine = 'InnoDB';
            $table->increments( 'id' );
            $table->integer( 'admin_id' )->unsigned();
            $table->string( 'slug' )->unique();
            $table->string( 'title' );
            $table->text( 'content_raw' );
            $table->text( 'content_html' );
            $table->string( 'featured_image' )->nullable();
            $table->string( 'meta_description' );
            $table->boolean( 'is_draft' )->default( FALSE );
            $table->timestamp( 'published_at' )->index();
            $table->timestamps();
            $table->foreign( 'admin_id' )
                ->references( 'id' )
                ->on( 'admins' )
                ->onDelete( 'cascade' );
        } );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop( 'posts' );
    }
}

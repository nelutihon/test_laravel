<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
        Schema::create( 'products', function(Blueprint $table) {
            $table->increments( 'id' );

            $table->string( 'product_name' )->unique();

            $table->decimal( 'product_price', 5, 2 );

            $table->integer('category_id')->foreign( 'category_id' )
                    ->references( 'id' )->on( 'categories' )
                    ->onDelete( 'cascade' );
            

            $table->timestamps();
        } );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop( 'products' );
    } 

}

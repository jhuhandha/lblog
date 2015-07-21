<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBooksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('books', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('isbn', 100)->nullable();
			$table->string('titulo', 50)->nullable();
			$table->string('autor', 50)->nullable();
			$table->string('publicacion', 200)->nullable();
			$table->string('imagen', 200)->nullable();
			$table->integer('idCategoria')->index('idCategoria');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('books');
	}

}

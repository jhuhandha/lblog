<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('username', 30)->unique();
			$table->string('email')->unique();
			$table->string('password', 60);
			$table->integer('role_id')->unsigned()->index('users_role_id_foreign');
			$table->boolean('seen')->default(0);
			$table->boolean('valid')->default(0);
			$table->boolean('confirmed')->default(0);
			$table->string('confirmation_code')->nullable();
			$table->timestamps();
			$table->string('remember_token', 100)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}

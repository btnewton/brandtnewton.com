<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::dropIfExists('users');
		
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('pseudonym')->unique();
			$table->string('email', 255)->unique();
			$table->string('password', 60);
			$table->enum('rank', array('consumer', 'provider', 'admin'))->default('consumer');
			$table->enum('status', array('unconfirmed', 'cleared', 'blocked'))->default('unconfirmed');
			$table->rememberToken();
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
		Schema::dropIfExists('posts');
		Schema::drop('users');
	}

}

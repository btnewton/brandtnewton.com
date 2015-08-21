<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * NOTE: had to change the timestamp in subject table name so that it would be created first!!
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::dropIfExists('posts');

		Schema::create('posts', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('version');
			$table->string('author');
			$table->string('subject');
			$table->string('title', 64);
			$table->text('draft_content')->nullable();
			$table->text('published_content')->nullable();
			$table->string('excerpt', 255)->nullable();
			$table->enum('status', array('published', 'hidden'))->default('hidden');
			$table->timestamps();

			// Soft deleting marks a time in the soft delete field and 
			// prevents post from showing up in search results (can be overridden).
			$table->softDeletes();
		});

		Schema::table('posts', function($table) {
			$table->foreign('author')->references('pseudonym')->on('users')->onDelete('cascade')->onUpdate('cascade');
			$table->foreign('subject')->references('subject')->on('subjects')->onDelete('cascade')->onUpdate('cascade');

			// Unique composite
			$table->unique(['version', 'title']);
   		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('users');
		Schema::drop('posts');
	}

}

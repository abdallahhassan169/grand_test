<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAdvirtesmentsTable extends Migration {

	public function up()
	{
		Schema::create('advirtesments', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->enum('type', array('free','paid'));
			$table->integer('category_id')->unsigned();
			$table->string('title');
			$table->text('description');
			$table->integer('adverister_id');
			$table->date('start_date');
		});
	}

	public function down()
	{
		Schema::drop('advirtesments');
	}
}
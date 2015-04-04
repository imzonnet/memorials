<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class GranitMemorials extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('granit_memorials', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('avatar');
            $table->date('birthday');
            $table->date('death');
            $table->text('biography');
            $table->text('obituary');
            $table->string('buried');
            $table->string('lat');
            $table->string('lng');
            $table->tinyInteger('timeline')->default(0);
            $table->integer('created_by')->unsigned();
            $table->foreign('created_by')->references('id')->on('users');
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
        Schema::drop('granit_memorials');
	}

}

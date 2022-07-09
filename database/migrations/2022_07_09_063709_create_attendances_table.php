<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttendancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendances', function (Blueprint $table) {
            $table->id();
	    $table->bigInteger('lesson_id')
	   	  ->unsigned();
	    $table->foreign('lesson_id')
	   	  ->references('id')
	  	  ->on('lessons')
	  	  ->onDelete('cascade');
	    $table->bigInteger('user_id')
	   	  ->unsigned();
	    $table->foreign('user_id')
		  ->references('id')
		  ->on('users')
		  ->onDelete('cascade');
	    $table->boolean('status')
		  ->default(false);
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
        Schema::dropIfExists('attendances');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //
        Schema::create('comments', function(Blueprint $table)
		{
			$table->increments('id');
			$table->unsignedBigInteger('on_post')->default(0);
            $table->foreign('on_post')->references('id')->on('posts')->onDelete('cascade');
            $table->unsignedBigInteger('from_user')->default(0);
            $table->foreign('from_user')->references('id')->on('users')->onDelete('cascade');
			$table->text('body');
			$table->timestamps();
		});
    }   

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::drop('comments');

    }
};

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
        Schema::create('posts', function(Blueprint $table)
		{
			$table->id();
			$table->unsignedBigInteger('author_id')->default(0);
            $table->foreign('author_id')->references('id')->on('users')->onDelete('cascade');
			$table->string('title')->unique();
			$table->text('body');
			$table->string('slug')->unique();
			$table->boolean('active');
			$table->timestamps();
		});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::drop('posts');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();

            $table->string('title')->index();
            $table->string('slug')->unique();
            $table->text('description');
            $table->longText('content');
            $table->string('image')->nullable();
            $table->string('status', 20)->default('draft')->index();
            $table->dateTime('published_at')->nullable();
            $table->foreignId('created_by')->constrained('users')->onDelete('cascade');

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
    }
}

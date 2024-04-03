<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
{
    Schema::create('comments', function (Blueprint $table) {
        $table->id();
        $table->integer('article_id')->unsigned();
        $table->text('content_comment');
        $table->date('date');
        $table->timestamps();


        $table->foreign('article_id')->references('id')->on('articles')->onDelete('cascade');
    });
}

    
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};

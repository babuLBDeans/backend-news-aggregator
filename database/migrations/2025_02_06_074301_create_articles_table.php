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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('source', 30);
            $table->string('category', 50);
            $table->string('author', 30);
            $table->string('heading', 255);
            $table->text('description');
            $table->date('news_date');
            $table->dateTime('created_at');
 
            // Add indexes to the columns
            $table->index('source');
            $table->index('category');
            $table->index('author');

            // Engine and Charset options
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_general_ci';
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};

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
    Schema::create('icons', function (Blueprint $table) {
        $table->id();
        
        //↓↓↓↓↓を追加
        $table->string('image_path')->nullable()->comment('画像の保存URL');
        $table->string('title')->comment('画像のタイトル');
        $table->text('description')->nullable()->comment('画像に関する説明');
        // ↑↑↑↑↑を追加
        
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('icons');
    }
};

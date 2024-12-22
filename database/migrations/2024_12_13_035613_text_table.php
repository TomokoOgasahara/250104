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
    Schema::create('text', function (Blueprint $table) {
        $table->id();
        
        //↓↓↓↓↓を追加
        $table->text('text')->nullable()->comment('テキスト');
        // ↑↑↑↑↑を追加
        
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};

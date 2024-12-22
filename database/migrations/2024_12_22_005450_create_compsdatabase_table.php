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
        Schema::create('compsdatabase', function (Blueprint $table) {
            $table->id();

            $table->text('comp_name')->nullable()->comment('企業名');
            $table->string('comp_no')->nullable()->comment('法人番号');
            $table->string('av_salary')->nullable()->comment('平均年収');
            $table->string('av_age')->nullable()->comment('平均年齢');
            $table->string('sales')->nullable()->comment('売上高');
            $table->string('profit')->nullable()->comment('営業利益率');
            $table->string('net_profit')->nullable()->comment('当期純利益率');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('compsdatabase');
    }
};

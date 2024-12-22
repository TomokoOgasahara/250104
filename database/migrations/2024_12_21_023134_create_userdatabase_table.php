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
        Schema::create('userdatabase', function (Blueprint $table) {
            $table->id();

            $table->string('name')->nullable()->comment('氏名');
            $table->string('name_kana')->nullable()->comment('カナ');
            $table->string('email')->nullable()->comment('email');
            $table->string('pref')->nullable()->comment('都道府県');
            $table->string('job')->nullable()->comment('職業');
            $table->string('comp_univ')->nullable()->comment('所属先');
            $table->string('dep')->nullable()->comment('学部または部署');
            $table->date('birth')->nullable()->comment('生年月日');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('userdatabase');
    }
};

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
        Schema::create('recruits', function (Blueprint $table) {
            $table->id();

            $table->string('comp_name')->nullable()->comment('企業名');   
            $table->string('job_title')->nullable()->comment('募集タイトル');
            $table->string('speciality')->nullable()->comment('専門');
            $table->string('location')->nullable()->comment('勤務地');
            $table->string('keyword')->nullable()->comment('キーワード');
            $table->text('features')->nullable()->comment('特色');
            $table->string('employment_type')->nullable()->comment('雇用形態');
            $table->text('job_description')->nullable()->comment('業務内容');
            $table->text('qualifications')->nullable()->comment('応募資格');
            $table->text('compensation')->nullable()->comment('待遇');
            $table->string('workplace_image')->nullable()->comment('職場イメージ');
            $table->text('job_satisfaction')->nullable()->comment('やりがい');
            $table->string('remote_work')->nullable()->comment('在宅勤務');
            $table->text('hiring_background')->nullable()->comment('採用の背景');
            $table->string('url')->nullable()->comment('募集リンク');           

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recruits');
    }
};

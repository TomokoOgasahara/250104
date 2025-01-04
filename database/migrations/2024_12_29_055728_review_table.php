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
        Schema::create('review', function (Blueprint $table) {
            $table->id();

            $table->text('comp_name')->nullable()->comment('企業名');
            $table->string('name')->nullable()->comment('氏名');
            $table->string('email')->nullable()->comment('メールアドレス');           
            $table->string('gender')->nullable()->comment('性別');
            $table->string('speciality')->nullable()->comment('専門');
            $table->string('employment_status')->nullable()->comment('現職・退職済');
            $table->string('years_of_service')->nullable()->comment('勤務年数');
            $table->string('age_group')->nullable()->comment('年代');
            $table->string('employment_type')->nullable()->comment('雇用形態');
            $table->string('growth_potential')->nullable()->comment('成長性');
            $table->string('job_satisfaction')->nullable()->comment('やりがい');
            $table->string('organizational_climate')->nullable()->comment('組織風土');
            $table->string('social_contribution')->nullable()->comment('社会貢献');
            $table->string('salary')->nullable()->comment('給与');
            $table->string('benefits')->nullable()->comment('福利厚生');
            $table->string('female_advancement')->nullable()->comment('女性活躍');
            $table->string('reviews')->nullable()->comment('口コミ');

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

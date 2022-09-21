<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLectureTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lecture', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title')->nullable()->default(NULL);
            $table->string('name')->nullable()->default(NULL);
            $table->text('description')->nullable()->default(NULL);
            $table->integer('section_id')->nullable()->default(NULL);
            $table->integer('ordering')->nullable()->default(NULL);
            $table->integer('created_user_id')->nullable()->default(NULL);
            $table->timestamp('updated_at')->default(\DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            $table->timestamp('created_at')->nullable();
            $table->timestamp('deleted_at')->nullable()->default(NULL);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    }
}

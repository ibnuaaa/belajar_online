<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserExcerciseAnswerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_excercise_answer', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->nullable()->default(NULL);
            $table->integer('user_excercise_id')->nullable()->default(NULL);
            $table->integer('excercise_option_id')->nullable()->default(NULL);
            $table->text('description')->nullable()->default(NULL);
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
        Schema::dropIfExists('user_excercise_answer');
    }
}

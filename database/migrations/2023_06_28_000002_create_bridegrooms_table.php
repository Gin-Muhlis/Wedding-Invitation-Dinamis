<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bridegrooms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('male_fullname');
            $table->string('male_nickname');
            $table->string('male_mother_name');
            $table->string('male_father_name');
            $table->string('female_fullname');
            $table->string('female_nickname');
            $table->string('female_mother_name');
            $table->string('female_father_name');
            $table->unsignedBigInteger('order_id');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bridegrooms');
    }
};

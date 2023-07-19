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
        Schema::create('wedding_data', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('male_image');
            $table->string('female_image');
            $table->string('cover_image');
            $table->string('wedding_coordinate');
            $table->string('giff_address');
            $table->string('music');
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
        Schema::dropIfExists('wedding_data');
    }
};

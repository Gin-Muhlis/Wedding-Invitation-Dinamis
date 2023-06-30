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
        Schema::create('wedding_receptions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('reception_date');
            $table->time('reception_time');
            $table->string('reception_place');
            $table->string('reception_address');
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
        Schema::dropIfExists('wedding_receptions');
    }
};

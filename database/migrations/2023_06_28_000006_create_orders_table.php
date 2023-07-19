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
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('no_order');
            $table->date('order_date');
            $table->string('domain');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('theme_id');
            $table->bigInteger('total_order');
            $table->enum('status', [
                'aktif',
                'kadaluwarsa',
                'menunggu pembayaran',
            ]);

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
        Schema::dropIfExists('orders');
    }
};

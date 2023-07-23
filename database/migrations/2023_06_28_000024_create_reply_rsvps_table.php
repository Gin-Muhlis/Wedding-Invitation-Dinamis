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
        Schema::create('reply_rsvps', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->text('reply');
            $table->enum('kehadiran', ['hadir', 'tidak hadir']);
            $table->string('bg_profile');
            $table->unsignedBigInteger('rsvp_id');

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
        Schema::dropIfExists('reply_rsvps');
    }
};

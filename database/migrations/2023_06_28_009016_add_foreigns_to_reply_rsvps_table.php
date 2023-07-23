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
        Schema::table('reply_rsvps', function (Blueprint $table) {
            $table
                ->foreign('rsvp_id')
                ->references('id')
                ->on('rsvps')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('reply_rsvps', function (Blueprint $table) {
            $table->dropForeign(['rsvp_id']);
        });
    }
};

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
        Schema::table('catgory_fitur_category', function (Blueprint $table) {
            $table
                ->foreign('fitur_category_id')
                ->references('id')
                ->on('fitur_categories')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table
                ->foreign('catgory_id')
                ->references('id')
                ->on('categories')
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
        Schema::table('catgory_fitur_category', function (Blueprint $table) {
            $table->dropForeign(['fitur_category_id']);
            $table->dropForeign(['catgory_id']);
        });
    }
};

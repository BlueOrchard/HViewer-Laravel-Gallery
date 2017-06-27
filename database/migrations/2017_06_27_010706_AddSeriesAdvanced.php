<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSeriesAdvanced extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('gallery_series', function (Blueprint $table) {
            $table->text('description');
            $table->text('tags');
            $table->text('artists');
            $table->text('languages');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('gallery_series', function (Blueprint $table) {
            $table->dropColumn('description');
            $table->dropColumn('tags');
            $table->dropColumn('artists');
            $table->dropColumn('languages');
        });
    }
}

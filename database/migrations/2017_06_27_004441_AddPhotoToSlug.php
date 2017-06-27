<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPhotoToSlug extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('gallery_series', function (Blueprint $table) {
            $table->text('cover_photo');
            $table->text('cover_photo_thumb');
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
            $table->dropColumn('cover_photo');
            $table->dropColumn('cover_photo_thumb');
        });
    }
}

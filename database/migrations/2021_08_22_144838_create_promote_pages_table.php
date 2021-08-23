<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePromotePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promote_pages', function (Blueprint $table) {
            $table->id();
            $table->string('heading');
            $table->string('text1');
            $table->string('subheading');
            $table->string('file');
            $table->string('heading2');
            $table->string('promotedcoin');
            $table->string('roratingbanner');
            $table->string('wideheaderbanner');
            $table->string('popupallpages');
            $table->string('footer');
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
        Schema::dropIfExists('promote_pages');
    }
}

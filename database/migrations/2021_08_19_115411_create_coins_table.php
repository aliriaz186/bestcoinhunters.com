<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coins', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('symbol');
            $table->string('description');
            $table->string('market_cap')->nullable();
            $table->string('price')->nullable();
            $table->string('launch_date');
            $table->string('chain');
            $table->string('address');
            $table->string('website')->nullable();
            $table->string('telegram');
            $table->string('twitter')->nullable();
            $table->string('discord')->nullable();
            $table->string('reddit')->nullable();
            $table->string('logo');
            $table->string('information')->nullable();
            $table->string('contact_email');
            $table->string('contact_telegram')->nullable();
            $table->string('status')->default(0);
            $table->string('upvotes')->default(0);
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
        Schema::dropIfExists('coins');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnnouncementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('announcements', function (Blueprint $table) {
            $table->id();
            $table->string('note');
            $table->unsignedBigInteger('company_id');
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            $table->boolean('status')->default(1);
            $table->timestamps();
        });

        Schema::create('images', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('description')->nullable();
            $table->string('path');
            $table->unsignedBigInteger('announcement_id');
            $table->foreign('announcement_id')->references('id')->on('announcements')->onDelete('cascade');
            $table->boolean('status')->default(1);
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
        Schema::dropIfExists('images');
        Schema::dropIfExists('announcements');
    }
}

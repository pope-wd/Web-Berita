<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaterisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materi', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('judul_materi');
            $table->text('slug');
            $table->text('excerpt');
            $table->text('body');
            $table->integer('kategori_id');
            $table->unsignedBigInteger('user_id');
            $table->string('gambar_materi');
            $table->boolean('slide');
            $table->integer('views');
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
        Schema::dropIfExists('materi');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->text('titulo');
            $table->text('subtitulo');
            $table->text('imagen_principal');
            $table->text('imagen_movil');
            $table->text('texto_principal');
            $table->text('texto_secundario');
            $table->text('texto_tres');
            $table->unsignedBigInteger('menu_id');
            $table->text('enlace');
            $table->string('locale',11)->default('es');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pages');
    }
}
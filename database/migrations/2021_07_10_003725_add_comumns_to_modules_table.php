<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddComumnsToModulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('modules', function (Blueprint $table) {
            //
            $table->unsignedBigInteger('category_menu_id');
            $table->renameColumn('descripcion', 'subtitulo');
            $table->renameColumn('imagen', 'imagen_principal');
            $table->renameColumn('enlace', 'texto_principal');
            $table->text('texto_secundario');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('modules', function (Blueprint $table) {
            //
        });
    }
}

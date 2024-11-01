<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaginasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paginas', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_autor');
            $table->string('titulo', 255);
            $table->text('contenido'); // Para HTML u otros contenidos largos
            $table->text('extracto')->nullable();
            $table->enum('tipo', ['pagina', 'post'])->default('post');
            $table->string('slug', 255)->unique();
            $table->enum('estatus', ['publicado', 'revision', 'baja'])->default('revision');
            $table->timestamp('fecha_publicacion')->nullable();
            $table->timestamps(); // Para fecha de creación y modificación

            // Foreign key for the author (related to users table)
            $table->foreign('id_autor')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('paginas');
    }
}

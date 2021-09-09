<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlayersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('torneos', function (Blueprint $table) {
            $table->id('idTorneo');
            $table->string('nombre_torneo');
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            // $table->unsignedBigInteger('id_player')->nullable();
            // $table->foreign('id_player')->references('id')->on('players'); 
            $table->timestamps();
        });

        Schema::create('players', function (Blueprint $table) {
            $table->id();
            $table->integer('ranking')->default(0);
            $table->string('name');
            $table->string('email')->unique();
            $table->integer('puntaje')->default(0);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->enum('estado', [1, 2])->default(1);
            $table->foreignId('torneo_id')
                ->nullable() // <-- IMPORTANTE: LA COLUMNA DEBE ACEPTAR NULL COMO VALOR VALIDO
                ->onDelete('SET NULL')  // UNSIGNED BIG INT
                ->references('idTorneo')
                ->on('torneos');   
            $table->rememberToken();
            $table->timestamps();
        });


        Schema::create('ladders', function (Blueprint $table) {
            $table->id('idLadder');
            $table->foreignId('player_id')
                ->nullable() // <-- IMPORTANTE: LA COLUMNA DEBE ACEPTAR NULL COMO VALOR VALIDO
                ->onDelete('SET NULL')  // UNSIGNED BIG INT
                ->references('id')
                ->on('players');
            $table->foreignId('torneo_id')
                ->nullable() // <-- IMPORTANTE: LA COLUMNA DEBE ACEPTAR NULL COMO VALOR VALIDO
                ->onDelete('SET NULL')  // UNSIGNED BIG INT
                ->references('idTorneo')
                ->on('torneos');            
            $table->timestamps();
        });

        Schema::create('desafios', function (Blueprint $table) {
            $table->id('idDesafio');
            $table->string('Lugar')->nullable();
            $table->dateTime('fecha_hora')->nullable();
            $table->foreignId('player_id')
                ->nullable() 
                ->onDelete('SET NULL') 
                ->references('id')
                ->on('players');
            $table->timestamps();
        });

        Schema::create('respuestas', function (Blueprint $table) {
           $table->id('idRespuesta');
           $table->string('respuesta')->nullable();
           $table->string('motivo_rechazo')->nullable();
           $table->foreignId('player_id')
               ->nullable() 
               ->onDelete('SET NULL') 
               ->references('id')
               ->on('players');
           $table->foreignId('desafio_id')
               ->nullable() 
               ->onDelete('SET NULL') 
               ->references('idDesafio')
               ->on('desafios');
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
        Schema::dropIfExists('torneos');
        Schema::dropIfExists('players');
        Schema::dropIfExists('ladders');
        Schema::dropIfExists('desafios');
        Schema::dropIfExists('respuestas');
    }
}

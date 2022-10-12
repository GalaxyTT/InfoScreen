<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InitalMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('klassen', function (Blueprint $table) {
            $table->id();
            $table->string('klasse');
            $table->timestamps();
        });

        Schema::create('raeume', function (Blueprint $table) {
            $table->id();
            $table->string('raum');
            $table->timestamps();
        });

        Schema::create('lehrer', function (Blueprint $table) {
            $table->id();
            $table->string('lehrer');
            $table->timestamps();
        });

        Schema::create('gruppen', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('lehrer_id')->unsigned()->index()->nullable();
            $table->foreignId('raum_id')->unsigned()->index()->nullable();
            $table->foreign('lehrer_id')->references('id')->on('lehrer')->onDelete('cascade');
            $table->foreign('raum_id')->references('id')->on('raeume')->onDelete('cascade');
            $table->timestamps();
        });
        
        Schema::create('schueler', function (Blueprint $table) {
            $table->id();
            $table->string('nachname');
            $table->string('vorname');
            $table->foreignId('klassen_id')->nullable()->constrained('klassen')->onUpdate('cascade');
            $table->foreignId('gruppen_id')->nullable()->constrained('gruppen')->onUpdate('cascade');
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
        Schema::dropIfExists("schueler");
        Schema::dropIfExists("gruppen");
        Schema::dropIfExists("lehrer");
        Schema::dropIfExists("raeume");
        Schema::dropIfExists("klassen");
    }
}

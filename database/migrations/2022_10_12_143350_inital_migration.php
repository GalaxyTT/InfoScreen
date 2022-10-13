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
            $table->foreignId('lehrer_id')->nullable()->constrained('lehrer')->onDelete('cascade');
            $table->foreignId('raum_id')->nullable()->constrained('raeume')->onDelete('cascade');
            $table->timestamps();
        });
        
        Schema::create('schueler', function (Blueprint $table) {
            $table->id();
            $table->string('nachname');
            $table->string('vorname');
            $table->foreignId('klassen_id')->nullable()->constrained('klassen')->onDelete('cascade');
            $table->foreignId('gruppen_id')->nullable()->constrained('gruppen')->onDelete('cascade');
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

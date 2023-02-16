<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class GruppenRemoveLehrerRaum extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('gruppen', function (Blueprint $table) {
            $table->dropForeign('gruppen_lehrer_id_foreign');
            $table->dropColumn('lehrer_id');
            $table->dropForeign('gruppen_raum_id_foreign');
            $table->dropColumn('raum_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('gruppen', function (Blueprint $table) {
            $table->foreignId('lehrer_id')->nullable()->constrained('lehrer')->onDelete('cascade');
            $table->foreignId('raum_id')->nullable()->constrained('raeume')->onDelete('cascade');
        });
    }
}

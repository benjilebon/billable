<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ScheduleRelances extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('facture', function(Blueprint $table) {
            $table->integer('status'); //0: Crée, 1: 1ère relance, 2: 2e relance, 3: 3e relance, 4: Contentieux //5: Payé
        });

        Schema::table('dossier', function(Blueprint $table) {
            $table->string('facture_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('facture', function(Blueprint $table) {
            $table->dropColumn('status');
        });
        
        Schema::table('dossier', function(Blueprint $table) {
            $table->dropColumn('facture_id');
        });
    }
}

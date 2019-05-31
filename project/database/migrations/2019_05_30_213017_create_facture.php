<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacture extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facture', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('client_address');
            $table->timestamps();
        });

        Schema::table('devis', function (Blueprint $table) {
            $table->string('contact');
            $table->string('phone');
            $table->string('rcs');
            $table->string('intra_community_tva');
            $table->string('city');
        });

        Schema::table('dossier', function (Blueprint $table) {
            $table->integer('devis_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('facture');

        Schema::table('devis', function (Blueprint $table) {
            $table->dropColumn('contact');
            $table->dropColumn('phone');
            $table->dropColumn('rcs');
            $table->dropColumn('tva');
            $table->dropColumn('city');
        });

        Schema::table('dossier', function (Blueprint $table) {
            $table->dropColumn('devis_id');
        });
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDevis extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('devis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('corporate');
            $table->string('name');
            $table->string('address');
            $table->string('postal_code');

            $table->string('product_name');
            $table->integer('quantity');
            $table->string('pu');
            $table->float('tva');
            $table->boolean('is_good_for_agreement');
            $table->integer('payment_conditions');
            $table->boolean('is_validated')->default(0);
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
        Schema::dropIfExists('devis');
    }
}

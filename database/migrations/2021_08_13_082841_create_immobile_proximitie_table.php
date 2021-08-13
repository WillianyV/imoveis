<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImmobileProximitieTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('immobile_proximitie', function (Blueprint $table) {
            //chaves estrangeiras
            $table->foreignId('immobile_id')->constrained()->onDelete('cascade');
            $table->foreignId('proximity_id')->constrained('proximities')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('immobile_proximitie');
    }
}

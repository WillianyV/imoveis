<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImmobilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('immobiles', function (Blueprint $table) {
            $table->id();
            $table->string('title',100);
            $table->integer('ground');
            $table->integer('living_room');
            $table->integer('bathroom');
            $table->integer('room');
            $table->integer('garage');
            $table->text('descrytion')->nullable();
            $table->decimal('price',12,2);
            //chaves estrangeiras
            $table->foreignId('city_id')->constrained('cities')->onDelete('cascade');
            $table->foreignId('type_id')->constrained()->onDelete('cascade');
            $table->foreignId('goal')->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('immobiles');
    }
}

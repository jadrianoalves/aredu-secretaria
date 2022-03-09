<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchoolTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::create('schools', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('address_place');
            $table->string('address_number');
            $table->string('address_zipcode');
            $table->string('address_city');
            $table->integer('number_of_rooms');
            $table->bigInteger('primary_entity_id')->unsigned();
            $table->foreign('primary_entity_id')->references('id')->on('primary_entities');
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
        Schema::dropIfExists('schools');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeriesTable extends Migration
{
    
    public function up()
    {
        Schema::create('series', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->bigInteger('primary_entity_id')->unsigned();
            $table->foreign('primary_entity_id')->references('id')->on('primary_entities');
            $table->timestamps();
            
        });
    }

   
    public function down()
    {
        Schema::dropIfExists('series');
    }
}

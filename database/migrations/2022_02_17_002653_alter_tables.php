<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTables extends Migration
{
    
    public function up()
    {
        Schema::table('questions', function(Blueprint $table) {
            $table->foreign('id_categoria')->references('id')->on('categorias');
        });

        Schema::table('options', function(Blueprint $table) {
            $table->foreign('id_question')->references('id')->on('questions');
        });
    }


    public function down()
    {
        //
    }
}

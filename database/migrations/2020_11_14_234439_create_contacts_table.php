<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('address')->nullable();
            $table->string('mobile')->nullable();
            $table->String('email')->nullable();   
            $table->string('facebook')->nullable();
            $table->string('twiter')->nullable();
            $table->String('youtube')->nullable();
            $table->String('google_plus')->nullable();
            $table->Integer('create_by')->nullable();
            $table->Integer('update_by')->nullable();
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
        Schema::dropIfExists('contacts');
    }
}

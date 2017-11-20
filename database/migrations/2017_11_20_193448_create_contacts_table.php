<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('salutation');
            $table->string('full_name');
            $table->string('email')->unique();
            $table->string('mobile');
            $table->string('phone')->nullable();
            $table->string('fax')->nullable();
            $table->string('property_number')->nullable();
            $table->string('property_type')->nullable();
            $table->string('client_type')->nullable();
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

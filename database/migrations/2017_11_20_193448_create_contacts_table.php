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
            // Personal information
            $table->string('salutation')->nullable();
            $table->string('full_name');
            $table->string('passport_number')->nullable();
            $table->string('nationality')->nullable();
            // $table->string('passport_expiry')->nullable();
            // $table->date('birthdate')->nullable();
            // Contact information
            $table->string('email')->unique();
            $table->string('mobile')->nullable();
            $table->string('phone')->nullable();
            $table->string('fax')->nullable();
            // Company information
            $table->string('company')->nullable();
            $table->string('position')->nullable();

            // Property information
            $table->string('property_number')->nullable();
            $table->string('property_type')->nullable();
            $table->string('developer')->nullable();
            $table->string('community')->nullable();
            $table->string('subcommunity')->nullable();
            $table->string('area')->nullable();
            $table->string('city')->nullable();
            $table->string('country')->nullable();
            // Contact statuses
            $table->string('contact_status')->nullable();
            $table->string('source')->nullable();
            $table->string('client_type')->nullable();
            $table->text('notes')->nullable();
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

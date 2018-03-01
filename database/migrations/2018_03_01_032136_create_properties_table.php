<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations for the properties table.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('account_id');
            $table->string('name');
            $table->string('address1', 80);
            $table->string('address2', 80)->nullable();
            $table->string('city', 30);
            $table->string('state', 2);
            $table->string('zip', 20);
            $table->string('county', 80)->nullable();
            $table->decimal('latitude', 10, 8);
            $table->decimal('longitude', 11, 8);
            $table->string('rooms', 5);
            $table->string('baths', 5);
            $table->string('beds', 5);
            $table->string('sleeps', 5);
            $table->tinyInteger('is_pet_friendly')->default(0);
            $table->decimal('pet_fee', 13, 4);
            $table->tinyInteger('is_pet_fee_included_with_rate')->default(0);
            $table->decimal('daily_rate', 13, 4);
            $table->decimal('weekend_rate', 13, 4);
            $table->decimal('weekly_rate', 13, 4);
            $table->decimal('monthly_rate', 13, 4);
            $table->integer('minimum_stay');
            $table->integer('maximum_stay');
            $table->text('description');
            $table->dateTime('created_at');
            $table->integer('created_by');
            $table->timestamp('updated_at');
            $table->integer('updated_by');
            $table->dateTime('deleted_at')->nullable();
            $table->integer('deleted_by')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('properties');
    }
}

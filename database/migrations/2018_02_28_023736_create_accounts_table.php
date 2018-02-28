<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('address1', 80);
            $table->string('address2', 80)->nullable();
            $table->string('city', 30);
            $table->string('state', 2);
            $table->string('zip', 20);
            $table->string('email');
            $table->string('phone', 14);
            $table->string('toll_free', 14)->nullable();
            $table->string('fax', 14)->nullable();
            $table->tinyInteger('is_partner')->default(0);
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
        Schema::dropIfExists('accounts');
    }
}

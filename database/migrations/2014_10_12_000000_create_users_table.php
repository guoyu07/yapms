<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('role_id');
            $table->integer('permission_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('address1', 80);
            $table->string('address2', 80);
            $table->string('city', 30);
            $table->string('state', 2);
            $table->string('zip', 20);
            $table->string('cell', 14);
            $table->string('phone', 14)->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}

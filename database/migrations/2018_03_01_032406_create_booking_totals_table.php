<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingTotalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking_totals', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('booking_id');
            $table->decimal('rate', 13, 4);
            $table->decimal('fee', 13, 4);
            $table->decimal('insurance', 13, 4);
            $table->decimal('promo', 13, 4);
            $table->decimal('sub_total', 13, 4);
            $table->decimal('tax', 13, 4);
            $table->decimal('total_amount', 13, 4);
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
        Schema::dropIfExists('booking_transactions');
    }
}

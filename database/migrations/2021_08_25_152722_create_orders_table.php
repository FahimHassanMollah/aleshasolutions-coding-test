<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id');
            $table->tinyInteger('transaction_type')->unsigned()->default(0)->comment('0:cash, 1: card');
            $table->boolean('pay_status')->default(0)->comment('0:Unpaid, 1:Paid');
            $table->longText('details')->nullable();
            $table->float('total')->default(0);
            $table->boolean('status')->default(0)->comment('0:Pending, 1: Accept, 2: Shipped, 3:  Delivered, 4:Canceled');
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
        Schema::dropIfExists('orders');
    }
}

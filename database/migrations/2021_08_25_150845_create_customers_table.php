<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('name',30);
            $table->string('email',50)->unique();
            $table->string('phone',15)->nullable();
            $table->string('address', 191)->nullable();
            $table->string('password',191);
            $table->rememberToken();
            $table->tinyInteger('status')->default(1)->comment('0: Inactive, 1: Active, 2: Suspend');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
}

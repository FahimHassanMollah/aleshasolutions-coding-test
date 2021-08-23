<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->foreignId('user_group_id')->nullable();
            $table->string('title',5)->nullable();
            $table->string('first_name',30);
            $table->string('last_name',30)->nullable();
            $table->string('email',50)->unique();
            $table->string('avatar', 100)->nullable();
            $table->string('password',191);
            $table->rememberToken();
            $table->tinyInteger('status')->default(1)->comment('0: Inactive, 1: Active');
            $table->boolean('super_admin')->default(0)->comment('0: Others, 1: SuperAdmin');
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
        Schema::dropIfExists('users');
    }
}

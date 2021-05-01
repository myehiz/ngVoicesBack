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
            $table->string('name', 100);
            $table->string('nickname', 30)->unique();
            $table->string('avatar')->default('avatar.png');
            $table->string('email', 50)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->boolean('is_admin', 1)->default('0');
            $table->string('role', 1)->default('4');
            $table->string('status', 10)->default('1');
            $table->timestamp('banned_until')->nullable();
            $table->dateTime('last_login_at')->nullable();
            $table->string('last_login_timezone', 50)->nullable();
            $table->string('last_login_ip')->nullable();
            $table->string('last_login_location')->nullable();
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

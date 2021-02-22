<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('image')->default('public/user/default.png');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            // $table->integer('phone');
            // $table->integer('gender')->comment('1=>male,2=>female,3=>rather not to say');
            $table->string('password');
            // $table->integer('otp');
            $table->integer('status')->default(1)->comment('1=>verified');
            $table->integer('is_deleted')->default(0)->comment('1=>deleted');
            $table->rememberToken();
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
        Schema::dropIfExists('admins');
    }
}

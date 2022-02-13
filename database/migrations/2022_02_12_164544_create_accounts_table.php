<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id('account_id');
            $table->integer('gender_id');
            $table->integer('role_id');
            $table->string('first_name',25);
            $table->string('middle_name',25)->nullable();
            $table->string('last_name',25);
            $table->string('email',50);
            $table->string('password',100);
            $table->string('display_picture');
            $table->integer('deleted_flag')->nullable();
            $table->date('modified_at')->nullable();
            $table->string('modified_by')->nullable();
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
        Schema::dropIfExists('accounts');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserInformationStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_information_statuses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('users_id');
            $table->integer('retailers_id')->nullable();
            $table->string('agreement')->default(0);
            $table->string('poa')->default(0);
            $table->string('verified')->default(0);
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
        Schema::dropIfExists('user_information_statuses');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStaffsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staffs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('role_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->string('nric');
            $table->string('phone');
            $table->string('marital_status');
            $table->integer('occupation');
            $table->date('birthdate');
            $table->string('gender');
            $table->string('religion');
            $table->string('country');
            $table->string('race');
            $table->string('address_1');
            $table->string('address_2');
            $table->string('state');
            $table->string('postcode');
            $table->string('city');
            $table->timestamps();
            $table->softDeletes($column = 'deleted_at', $precision = 0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('staffs');
    }
}

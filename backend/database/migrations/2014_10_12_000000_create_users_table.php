<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->string('full_name');   
            $table->string('email')->unique();
            $table->unsignedBigInteger('contact');
            $table->string('password');
            $table->enum('role', ['admin', 'agent'])->default('agent');
            $table->boolean('is_approved')->default(0);
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();   // For softDelete data from table
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
};

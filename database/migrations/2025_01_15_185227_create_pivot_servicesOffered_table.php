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
        Schema::create('pivot_servicesOffered', function (Blueprint $table) {
            $table->id();
            $table->foreignId('servicesOfferedId')->references('id')->on('servicesOffered')->onDelete('cascade');
            $table->foreignId('serviceId')->references('id')->on('services')->onDelete('cascade');
            $table->integer('quantity');
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
        Schema::dropIfExists('pivot_servicesOffered');
    }
};


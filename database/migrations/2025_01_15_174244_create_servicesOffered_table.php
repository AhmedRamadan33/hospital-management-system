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
        Schema::create('servicesOffered', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->decimal('before_discount',8,2);
            $table->decimal('discount_value',8,2);
            $table->decimal('after_discount',8,2);
            $table->integer('tax_rate');
            $table->decimal('total',8,2);
            $table->string('notes')->nullable()->default('no notes');
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
        Schema::dropIfExists('servicesOffered');
    }
};


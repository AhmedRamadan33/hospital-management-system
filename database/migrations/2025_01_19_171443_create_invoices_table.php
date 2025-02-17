<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->integer('invoice_class');
            $table->date('date');
            $table->foreignId('patient_id')->references('id')->on('patients')->onDelete('cascade');
            $table->foreignId('doctor_id')->references('id')->on('doctors')->onDelete('cascade');
            $table->foreignId('section_id')->references('id')->on('sections')->onDelete('cascade');
            $table->foreignId('group_id')->nullable()->references('id')->on('servicesoffered')->onDelete('cascade');
            $table->foreignId('service_id')->nullable()->references('id')->on('services')->onDelete('cascade');
            $table->double('price', 8, 2);
            $table->integer('type');
            $table->integer('status')->default(1);
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
        Schema::dropIfExists('invoices');
    }
}

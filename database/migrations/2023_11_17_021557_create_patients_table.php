<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();//od pasien
            $table->string('name');//nama pasien
            $table->string('phone');//no hp pasien
            $table->text('address');//alamat pasien
            $table->string('status');//status pasien
            $table->date('in_date_at');//tanggal masuk
            $table->date('out_date_at');//tanggal keluar
            $table->timestamps();//timestamp

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};

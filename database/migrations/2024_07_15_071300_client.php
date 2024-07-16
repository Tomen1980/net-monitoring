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
        schema::create('client', function (Blueprint $table) {
            $table->id();
            $table->string('ipAddress');
            $table->string('namaClient');
            $table->string('status');
            $table->foreignId('blok_id')->references('id')->on('blok')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};

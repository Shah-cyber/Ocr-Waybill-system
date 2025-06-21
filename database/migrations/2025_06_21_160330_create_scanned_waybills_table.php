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
        Schema::create('scanned_waybills', function (Blueprint $table) {
            $table->id();
            $table->string('waybill_number');
            $table->string('receiver_name');
            $table->string('image_path');
            $table->json('raw_ocr_data')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('scanned_waybills');
    }
};

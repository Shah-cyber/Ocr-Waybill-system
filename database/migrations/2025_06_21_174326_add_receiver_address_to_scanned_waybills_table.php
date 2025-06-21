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
        Schema::table('scanned_waybills', function (Blueprint $table) {
            $table->text('receiver_address')->nullable()->after('receiver_name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('scanned_waybills', function (Blueprint $table) {
            $table->dropColumn('receiver_address');
        });
    }
};

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
    Schema::create('downloads', function (Blueprint $table) {
        $table->id(); // PK
        $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // FK
        $table->foreignId('asset_id')->constrained('assets')->onDelete('cascade'); // FK
        $table->timestamp('downloaded_at');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('downloads');
    }
};

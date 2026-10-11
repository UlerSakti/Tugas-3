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
    Schema::create('assets', function (Blueprint $table) {
        $table->id(); // PK
        $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // FK
        $table->foreignId('category_id')->constrained('categories')->onDelete('cascade'); // FK
        $table->string('title');
        $table->text('description');
        $table->decimal('price', 12, 2);
        $table->string('blender_version');
        $table->string('file_path');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assets');
    }
};

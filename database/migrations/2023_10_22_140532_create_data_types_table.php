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
        Schema::create('data_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
        });
    
        // Insert allowed data types
        DB::table('data_types')->insert([
            ['name' => 'books'],
            ['name' => 'articles'],
            ['name' => 'documentaries'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_types');
    }
};

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
        Schema::create('resource_links', function (Blueprint $table) {
            $table->id();
            $table->string('url');
            $table->unsignedBigInteger('event_info_id');
            $table->unsignedBigInteger('data_type_id'); // Add data_type_id
            $table->timestamps();
    
         
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resource_links');
    }
};

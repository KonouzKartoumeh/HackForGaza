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
        Schema::create('event_info', function (Blueprint $table) {
            $table->id();
            $table->text('title');
            $table->date('date');
            $table->integer('event_year')->unsigned()->nullable();
            $table->string('image')->nullable();
            $table->text('description')->nullable();
            $table->json('metadata')->nullable();
            $table->integer('priority_level')->unsigned()->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('event_info');
    }
};

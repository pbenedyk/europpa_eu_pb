<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cats', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('breed');
            $table->date('birth_date');
            $table->date('death_date')->nullable();
            $table->boolean('is_vaccinated');
            $table->boolean('is_adoption_available');
            $table->unsignedBigInteger('shelter_id');
            $table->foreign('shelter_id')
                ->references('id')
                ->on('shelters')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cats');
    }
};

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
        Schema::create('job_history', function (Blueprint $table) {
            $table->id();
            $table->uuid('_id');

            $table->date("start_date");
            $table->date("end_date");

            $table ->foreignId('staff_id')
                ->references('id')
                ->on('staffs')
                ->onDelete('cascade');

            $table ->foreignId('position_id') ->references('id') ->on('positions');

            $table->timestamps();
            $table ->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_history');
    }
};

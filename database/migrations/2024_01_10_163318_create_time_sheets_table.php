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
        Schema::create('time_sheets', function (Blueprint $table) {
            $table->id();
            $table->string('project')->nullable();
            $table->string('task')->nullable();
            $table->date('date_in')->nullable();
            $table->string('time_in')->nullable();
            $table->date('date_out')->nullable();
            $table->string('time_out')->nullable();
            $table->float('hours_worked', 8, 2);
            $table->float('rate', 8, 2)->nullable();
            $table->timestamps();
            $table->text('description')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('timesheet');
    }
};

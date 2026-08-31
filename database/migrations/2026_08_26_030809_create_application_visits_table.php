<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('application_visits', function (Blueprint $table) {
            $table->id();

            $table->foreignId('application_id')
                ->constrained('applications')
                ->cascadeOnDelete();

            $table->string('session_id')->nullable();

            $table->timestamp('visited_at')->useCurrent();

            $table->timestamps();

            $table->index('application_id');
            $table->index('visited_at');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('application_visits');
    }
};

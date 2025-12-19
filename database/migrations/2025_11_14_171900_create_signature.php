<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('signatures', function (Blueprint $table) {
            $table->id();

            $table->foreignId('contract_id')
                ->constrained('contracts')
                ->onDelete('cascade');

            $table->string('signature_id')->unique();
            $table->timestamp('signature_link_generated_at')->nullable();
            $table->timestamp('signature_link_expiry')->nullable();
            $table->timestamp('signature_link_acessed_at')->nullable();
            $table->string('status')->default('pending');
            $table->timestamps();


        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('signatures');
    }
};

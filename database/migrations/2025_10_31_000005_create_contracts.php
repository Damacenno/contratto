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
        Schema::create('contracts', function (Blueprint $table) {
            $table->id();
            $table->string('contract_number');
            $table->foreignId('contract_company_owner_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('contract_type_id')->constrained('contract_types');
            $table->foreignId('contract_status_id')->constrained('contract_statuses');
            $table->string('client_name');
            $table->integer('contract_duration_months');
            $table->integer('payment_total');
            $table->integer('regret_period');
            $table->integer('payment_initial');
            $table->date('initial_payment_date')->nullable();
            $table->integer('payment_final');
            $table->date('final_payment_date')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->string('contract_file_url')->nullable();
            $table->boolean('is_signed')->default(false);
            $table->string('access_level')->default('owner');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contracts');
    }
};

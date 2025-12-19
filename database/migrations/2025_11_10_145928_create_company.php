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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_user_owner_id')->constrained('users');
            $table->string('company_document')->unique();
            $table->string('company_name')->unique();
            $table->string('company_agency')->unique();
            $table->string('company_account')->unique();
            $table->string('company_bank');
            $table->string('company_pix')->unique();
            $table->string('company_city');
            $table->integer('licenses_avaliable');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('company');
    }
};

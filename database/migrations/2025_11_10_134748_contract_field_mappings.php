<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('contract_field_mappings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('contract_type_id'); // FK do tipo de contrato
            $table->string('field_name', 100); // nome lógico do campo
            $table->string('display_name', 100); // nome de exibicao
            $table->string('prefix', 100); // PREFIXO
            $table->string('format', 100);
            $table->string('field_key',100); // CHAVE DO CAMPO
            $table->integer('font_size')->default(11); // tamanho da fonte
            $table->string('color', 20)->nullable(); // cor do texto (ex: "0,0,0" ou "255,165,0")
            $table->timestamps();

            // Relação com contract_types
            $table->foreign('contract_type_id')
                ->references('id')
                ->on('contract_types')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contract_field_mappings');
    }
};

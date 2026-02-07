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
        Schema::create('pagamentos', function (Blueprint $table) {
            $table->id();

            $table->foreignId('pedido_id')
                ->constrained('pedidos')
                ->cascadeOnDelete();

            $table->string('status')->default('pendente'); // pendente, aprovado, recusado
            $table->string('metodo'); // pix, cartao

            $table->decimal('valor', 10, 2);

            $table->string('gateway_id')->nullable(); // id no Mercado Pago
            $table->timestamp('pago_em')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pagamentos');
    }
};

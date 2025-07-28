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
		Schema::create('cuotas_mensuales', function (Blueprint $table) {
			$table->id('cuota_id');
			$table->string('ci_usuario', 20);
			$table->decimal('monto_cuota', 10, 2);
			$table->date('fecha_pago')->nullable();
			$table->date('fecha_vencimiento');
			$table->enum('estado_pago', ['Pendiente', 'Pagado', 'Vencido'])->default('Pendiente');
			$table->foreign('ci_usuario')->references('ci_usuario')->on('usuarios');
			$table->timestamps();
			$table->softDeletes();
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
		Schema::dropIfExists('cuotas_mensuales');
	}
};

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
		Schema::create('aporte_inicial', function (Blueprint $table) {
			$table->id('aporte_id');
			$table->string('ci_usuario', 20);
			$table->decimal('monto', 10, 2);
			$table->date('fecha_pago');
			$table->string('comprobante')->nullable();
			$table->string('estado_aporte');
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
		Schema::dropIfExists('aporte_inicial');
	}
};

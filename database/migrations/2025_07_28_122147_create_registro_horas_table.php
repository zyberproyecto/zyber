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
		Schema::create('registro_horas', function (Blueprint $table) {
			$table->id('registro_id');
			$table->unsignedBigInteger('unidad_id');
			$table->string('ci_usuario', 20);
			$table->integer('horas_faltantes');
			$table->integer('horas_trabajadas');
			$table->text('motivo')->nullable();
			$table->foreign('unidad_id')->references('unidad_id')->on('unidades');
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
		Schema::dropIfExists('registro_horas');
	}
};

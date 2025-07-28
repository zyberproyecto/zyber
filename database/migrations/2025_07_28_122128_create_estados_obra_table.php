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
		Schema::create('estados_obra', function (Blueprint $table) {
			$table->id('etapa_id');
			$table->unsignedBigInteger('unidad_id');
			$table->date('fecha_inicio');
			$table->enum('construccion', ['Terminada', 'EnObra']);
			$table->date('fecha_finalizacion')->nullable();
			$table->foreign('unidad_id')->references('unidad_id')->on('unidades');
			$table->timestamps();
			$table->softDeletes();
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
		Schema::dropIfExists('estados_obra');
	}
};

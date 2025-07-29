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
		Schema::create('gestiona', function (Blueprint $table) {
			$table->unsignedBigInteger('admin_id');
			$table->unsignedBigInteger('etapa_id');
			$table->unsignedBigInteger('registro_id');
			$table->foreign('admin_id')->references('admin_id')->on('administrativos');
			$table->foreign('etapa_id')->references('etapa_id')->on('estados_obra');
			$table->foreign('registro_id')->references('registro_id')->on('registro_horas');
			$table->primary(['admin_id', 'etapa_id', 'registro_id']);
			$table->timestamps();
			$table->softDeletes();
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
		Schema::dropIfExists('gestiona');
	}
};

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
		Schema::create('asignados', function (Blueprint $table) {
			$table->string('ci_usuario', 20);
			$table->unsignedBigInteger('unidad_id');
			$table->foreign('ci_usuario')->references('ci_usuario')->on('usuarios')->onDelete('cascade');
			$table->foreign('unidad_id')->references('unidad_id')->on('unidades')->onDelete('cascade');
			$table->primary(['ci_usuario', 'unidad_id']);
			$table->timestamps();
			$table->softDeletes();
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
		Schema::dropIfExists('asignados');
	}
};

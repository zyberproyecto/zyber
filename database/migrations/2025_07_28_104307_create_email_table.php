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
		Schema::create('email', function (Blueprint $table) {
			$table->string('ci_usuario', 20);
			$table->string('email', 100);
			$table->foreign('ci_usuario')->references('ci_usuario')->on('usuarios')->onDelete('cascade');
			$table->primary(['ci_usuario', 'email']);
			$table->timestamps();
			$table->softDeletes();
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
		Schema::dropIfExists('email');
	}
};

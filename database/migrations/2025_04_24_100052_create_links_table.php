<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
	/**
	 * Run the migrations.
	 */
	public function up(): void
	{
		Schema::create('links', function (Blueprint $table) {
			$table->id();
			$table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade');
			$table->string('short_code');
			$table->text('original_url');
			$table->unsignedInteger('clicks')->default(0);
			$table->timestamp('last_clicked_at')->nullable();
			$table->boolean('is_active')->default(true);
			$table->softDeletes();
			$table->timestamps();
		});
	}
	
	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
		Schema::dropIfExists('links');
	}
};

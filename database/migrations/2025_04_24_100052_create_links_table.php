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
		Schema::create('links', function (Blueprint $table)
		{
			$table->id();
			$table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade');
			$table->string('short_code');
			$table->text('original_url');
			$table->unsignedInteger('clicks')->default(0);
			$table->timestamp('last_clicked_at')->nullable();
			$table->boolean('is_active')->default(true);
			$table->boolean('is_not_deleted')->virtualAs('IF(deleted_at IS NULL, TRUE, NULL)');
			$table->softDeletes();
			$table->timestamps();
			
			$table->unique(['short_code', 'is_not_deleted']);
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

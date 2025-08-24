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
        Schema::table('products', function (Blueprint $table) {
            if (!Schema::hasColumn('products', 'category_id')) {
                $table->foreignId('category_id')->after('user_id')->nullable()
                    ->constrained()->nullOnDelete();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            if (Schema::hasColumn('products', 'category_id')) {
                $table->dropConstrainedForeignId('category_id');
            }
        });
    }
};

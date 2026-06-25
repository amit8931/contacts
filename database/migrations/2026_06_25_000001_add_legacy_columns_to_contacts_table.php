<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('contacts', function (Blueprint $table) {
            if (! Schema::hasColumn('contacts', 'number')) {
                $table->string('number', 50)->nullable()->after('phone');
            }
            if (! Schema::hasColumn('contacts', 'dp_path')) {
                $table->string('dp_path', 500)->nullable();
            }
            if (! Schema::hasColumn('contacts', 'description_html')) {
                $table->longText('description_html')->nullable();
            }
            if (! Schema::hasColumn('contacts', 'custom_fields')) {
                $table->json('custom_fields')->nullable();
            }
            if (! Schema::hasColumn('contacts', 'social_links')) {
                $table->json('social_links')->nullable();
            }
        });
    }

    public function down(): void
    {
        Schema::table('contacts', function (Blueprint $table) {
            $table->dropColumnIfExists(['number', 'dp_path', 'description_html', 'custom_fields', 'social_links']);
        });
    }
};

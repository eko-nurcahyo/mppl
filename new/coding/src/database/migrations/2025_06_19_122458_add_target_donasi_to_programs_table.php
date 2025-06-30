<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::table('programs', function (Blueprint $table) {
            if (!Schema::hasColumn('programs', 'pulau')) {
                $table->string('pulau')->nullable()->after('kategori');
            }
            if (!Schema::hasColumn('programs', 'kota')) {
                $table->string('kota')->nullable()->after('pulau');
            }
        });
    }

    public function down(): void {
        Schema::table('programs', function (Blueprint $table) {
            if (Schema::hasColumn('programs', 'pulau')) {
                $table->dropColumn('pulau');
            }
            if (Schema::hasColumn('programs', 'kota')) {
                $table->dropColumn('kota');
            }
        });
    }
};

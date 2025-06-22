<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('programs', function (Blueprint $table) {
            if (!Schema::hasColumn('programs', 'kisah')) {
                $table->longText('kisah')->nullable()->after('deskripsi');
            }

            if (!Schema::hasColumn('programs', 'foto_kisah')) {
                $table->string('foto_kisah')->nullable()->after('kisah');
            }
        });
    }

    public function down()
    {
        Schema::table('programs', function (Blueprint $table) {
            if (Schema::hasColumn('programs', 'kisah')) {
                $table->dropColumn('kisah');
            }

            if (Schema::hasColumn('programs', 'foto_kisah')) {
                $table->dropColumn('foto_kisah');
            }
        });
    }
};

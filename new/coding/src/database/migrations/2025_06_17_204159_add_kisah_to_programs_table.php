<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
 // database/migrations/xxxx_xx_xx_xxxxxx_add_kisah_to_programs_table.php

public function up()
{
    Schema::table('programs', function (Blueprint $table) {
        $table->longText('kisah')->nullable()->after('deskripsi');
        $table->string('foto_kisah')->nullable()->after('kisah');
    });
}

public function down()
{
    Schema::table('programs', function (Blueprint $table) {
        $table->dropColumn(['kisah', 'foto_kisah']);
    });
}



};

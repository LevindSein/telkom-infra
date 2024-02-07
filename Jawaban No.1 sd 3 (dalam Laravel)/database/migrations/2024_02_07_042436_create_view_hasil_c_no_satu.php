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
        DB::statement("
            CREATE OR REPLACE VIEW view_hasil_c_no_satu AS
            SELECT s.area, COUNT(*) AS all_task
            FROM tasks
            JOIN sites AS s ON tasks.site_id = s.site_id
            GROUP BY s.area
            ORDER BY s.area;
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::dropIfExists('view_hasil_c_no_satu');
    }
};

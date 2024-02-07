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
            CREATE OR REPLACE VIEW view_hasil_a_no_satu AS
            SELECT s.area, tasks.vendor, COUNT(*) AS jumlah_task
            FROM tasks
            JOIN sites AS s ON tasks.site_id = s.site_id
            GROUP BY s.area, tasks.vendor
            ORDER BY s.area, tasks.vendor;
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::dropIfExists('view_hasil_a_no_satu');
    }
};

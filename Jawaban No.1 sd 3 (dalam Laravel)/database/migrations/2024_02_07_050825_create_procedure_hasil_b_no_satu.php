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
        DB::unprepared("
            CREATE OR REPLACE PROCEDURE generate_view_hasil_b_no_satu()
            BEGIN
                DECLARE cols TEXT;
                DECLARE sql_query TEXT;

                SET SESSION group_concat_max_len = 1000000;

                SELECT GROUP_CONCAT(DISTINCT
                    CONCAT('COUNT(CASE WHEN vendor = ''', vendor, ''' THEN 1 END) AS ', QUOTE(vendor))
                ) INTO cols
                FROM tasks;

                SET sql_query = CONCAT('
                    CREATE OR REPLACE VIEW view_hasil_b_no_satu AS
                    SELECT
                        s.area AS Area, ', cols, '
                    FROM
                        tasks t
                    JOIN
                        sites s ON t.site_id = s.site_id
                    GROUP BY
                        s.area
                    ORDER BY
                        s.area
                ');

                PREPARE stmt FROM sql_query;
                EXECUTE stmt;
                DEALLOCATE PREPARE stmt;
            END
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::dropIfExists('procedure_hasil_b_no_satu');
    }
};

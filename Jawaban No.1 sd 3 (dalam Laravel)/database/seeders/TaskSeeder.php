<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use JeroenZwart\CsvSeeder\CsvSeeder;

class TaskSeeder extends CsvSeeder
{
    public function __construct()
    {
        $this->file = '/database/seeds/csvs/tasks.csv';
        $this->tablename = 'tasks';
        $this->delimiter = ',';
        $this->timestamps = false;
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Recommended when importing larger CSVs
        DB::disableQueryLog();
        parent::run();
    }
}

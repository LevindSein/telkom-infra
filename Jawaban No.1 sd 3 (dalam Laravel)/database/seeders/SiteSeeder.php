<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use JeroenZwart\CsvSeeder\CsvSeeder;

class SiteSeeder extends CsvSeeder
{
    public function __construct()
    {
        $this->file = '/database/seeds/csvs/sites.csv';
        $this->tablename = 'sites';
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

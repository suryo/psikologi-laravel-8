<?php

/*
 * This file is part of the IndoBank package.
 *
 * (c) suryo atmojo <github.com/suryo | suryoatm@gmail.com>
 *
 */

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Andes2912\IndoBank\RawDataGetter;
use Illuminate\Support\Facades\DB;

class IndoBankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @deprecated
     *
     * @return void
     */
    public function run()
    {
        // Get Data
        $banks = RawDataGetter::getBanks();

        // Insert Data to Database
        DB::table('banks')->insert($banks);
    }
}
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Flags;

class FlagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Flags::create([
            'flagName' => 'werbungFlag',
            'isFlagSet' => 0
        ]);
        
    }
}

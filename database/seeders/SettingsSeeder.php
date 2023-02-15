<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Settings;


class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Settings::create([
            'settingName' => 'duration',
            'value' => 10000,
            'description' => 'Dauer der Anzeige des Bildes:'
        ]);
        Settings::create([
            'settingName' => 'backToAdDelay',
            'value' => 10000,
            'description' => 'Dauer bis von Info zurück auf Werbung gewächstelt wird:'
        ]);
    }
}

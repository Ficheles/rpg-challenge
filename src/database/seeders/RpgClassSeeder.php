<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
// use App\Models\RpgClass;
use Illuminate\Support\Facades\DB;

class RpgClassSeeder extends Seeder
{
    public function run()
    {
        DB::table('rpg_classes')->insert([
            ['name' => 'Guerreiro'],
            ['name' => 'Mago'],
            ['name' => 'Arqueiro'],
            ['name' => 'Clérigo'],
        ]);
    }
}
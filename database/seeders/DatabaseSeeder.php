<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            CategorySeeder::class,
            DepartmentSeeder::class,
            PermissionsSeeder::class,
            StatusSeeder::class,
            TypeSeeder::class,
            ThemeSeeder::class,

            ProjectSeeder::class,
            KaizenSeeder::class
        ]);
    }
}

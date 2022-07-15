<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Project;
use App\Models\Status;
use App\Models\Theme;
use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /** @var Project $proj */
        $proj = Project::create([
            'headline' => 'headline',
            'details' => 'some details',
            'realization_description' => 'description here boy'
        ]);

        /** @var Theme $theme */
        $theme = Theme::find(1);
        $proj->theme()->associate($theme);

        /** @var Category $category */
        $category = Category::find(1);
        $proj->categories()->save($category);

        /** @var Type $type */
        $type = Type::find(1);
        $proj->type()->associate($type);

        /** @var Status $status */
        $status = Status::find(1);
        $proj->status()->associate($status);

        $proj->save();
    }
}

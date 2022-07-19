<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Kaizen;
use App\Models\Status;
use App\Models\Theme;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KaizenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i < 4; $i++) {
            /** @var Kaizen $kaizen */
            $kaizen = Kaizen::create([
                'name' => 'Название'.$i,
                'description' => 'Описание'.$i,
                'improvement' => 'Улучшение',
                'result' => 'Результат',
                'reference_number' => $i
            ]);

            /** @var Theme $theme */
            $theme = Theme::find($i);
            $kaizen->theme()->associate($theme);

            /** @var Category $category */
            $category = Category::find(1);
            $kaizen->category()->associate($category);

            /** @var Status $status */
            $status = Status::find(1);
            $kaizen->status()->associate($status);

            $user = User::find(1);
            $kaizen->users()->attach($user->id, ['type' => Kaizen::AUTHOR]);

            $kaizen->published = true;
            $kaizen->save();
        }

//        /** @var Kaizen $kaizen */
//        $kaizen = Kaizen::create([
//            'name' => 'name',
//            'description' => 'desc',
//            'improvement' => 'imp',
//            'result' => 'res',
//            'reference_number' => 123
//        ]);
//
//        /** @var Theme $theme */
//        $theme = Theme::find(1);
//        $kaizen->theme()->associate($theme);
//
//        /** @var Category $category */
//        $category = Category::find(1);
//        $kaizen->category()->associate($category);
//
//        /** @var Status $status */
//        $status = Status::find(1);
//        $kaizen->status()->associate($status);
//
//        $user = User::find(1);
//        $kaizen->users()->attach($user->id, ['type' => Kaizen::AUTHOR]);
//
//        $kaizen->published = true;
//        $kaizen->save();
    }
}

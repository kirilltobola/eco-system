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
        /** @var Kaizen $kaizen */
        $kaizen = Kaizen::create([
            'name' => 'Тест',
            'description' => 'При использовании кулачков данной конструкции происходит деформация заготовки. При растачивании внутренней части втулки происходит ее смещение в сторону токарного патрона по причине ограничительных упоров. Есть вероятность травмирования работника.',
            'improvement' => 'Изготовить специальные кулачки из листа металла толщиной 40 мм.',
            'result' => 'При применении кулачков данной конструкции полностью исключена деформация заготовки при зажатии в токарном патроне. Упоры исключают возможность смещения заготовки. Большая площадь контакта исключает возможность травмирования работника.',
            'reference_number' => 123
        ]);

        /** @var Theme $theme */
        $theme = Theme::find(2);
        $kaizen->theme()->associate($theme);

        /** @var Category $category */
        $category = Category::find(2);
        $kaizen->category()->associate($category);

        /** @var Status $status */
        $status = Status::find(2);
        $kaizen->status()->associate($status);

        $user = User::find(1);
        $kaizen->users()->attach($user->id, ['type' => Kaizen::AUTHOR]);

        $kaizen->manager()->associate(User::find(2));

        $kaizen->published = true;
        $kaizen->save();
    }
}

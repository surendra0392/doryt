<?php

namespace Database\Seeders;

use App\Enums\ContentStatus;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Dryers & Dehydrators',
                'description' => 'Industrial drying and dehydration solutions for food, pharmaceutical, and chemical processing applications.',
                'sort_order' => 1,
                'image' => 'ftd_24_tray_dryer.png',
            ],
            [
                'name' => 'Process Equipment',
                'description' => 'Specialized processing machinery for fruits, vegetables, grains, meat, seafood, and agricultural products.',
                'sort_order' => 2,
                'image' => 'complete_dehydration_process_line.png',
            ],
            [
                'name' => 'Cold Chain Solutions',
                'description' => 'End-to-end cold storage, refrigeration systems, and controlled environment chambers for diverse industries.',
                'sort_order' => 3,
                'image' => 'lab_refrigerator_deep_freezer_side.png',
            ],
            [
                'name' => 'Ancillary Equipment',
                'description' => 'Supporting industrial machinery including slicers, pulverisers, cutters, sifters, blenders, and packaging equipment.',
                'sort_order' => 4,
                'image' => 'automatic_pulverizer.png',
            ],
        ];

        foreach ($categories as $cat) {
            $image = $cat['image'];
            unset($cat['image']);

            $model = Category::updateOrCreate(
                ['name' => $cat['name']],
                array_merge($cat, [
                    'slug' => Str::slug($cat['name']),
                    'status' => ContentStatus::Published,
                ])
            );

            if ($image && File::exists(public_path('img/'.$image))) {
                $currentMedia = $model->getFirstMedia('images');
                if (! $currentMedia || $currentMedia->file_name !== $image) {
                    $model->clearMediaCollection('images');
                    $model->addMedia(public_path('img/'.$image))
                        ->preservingOriginal()
                        ->toMediaCollection('images');
                }
            }
        }
    }
}

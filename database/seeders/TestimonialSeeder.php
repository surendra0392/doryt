<?php

namespace Database\Seeders;

use App\Enums\ContentStatus;
use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    /**
     * @var list<array{client_name: string, designation: string, company: string, content: string, sort_order: int}>
     */
    public const TESTIMONIALS = [
        [
            'client_name' => 'Rajesh Reddy',
            'designation' => 'Managing Director',
            'company' => 'Sri Venkateswara Agro Foods, Hyderabad',
            'content' => 'We installed the DO-RYT vegetable dehydration line for our export orders and the difference was clear from the first batch. Colour, aroma and moisture levels stay consistent, and the build quality is exactly what our buyers expect.',
            'sort_order' => 1,
        ],
        [
            'client_name' => 'Priya Nair',
            'designation' => 'Head of Operations',
            'company' => 'Malabar Fresh Exports, Kochi',
            'content' => 'Their freeze dryer has been running on our seafood and fruit lines almost non-stop, with very little downtime. The service team in Hyderabad responds quickly and the spares have always reached us on time.',
            'sort_order' => 2,
        ],
        [
            'client_name' => 'Anil Kumar Sharma',
            'designation' => 'Plant Head',
            'company' => 'Himalayan Herbs & Nutraceuticals, Dehradun',
            'content' => 'From the ribbon blender to the pulverizer, every machine arrived fully tested and was commissioned without any fuss. For the price, we could not find better stainless steel finish or after-sales support in India.',
            'sort_order' => 3,
        ],
    ];

    public function run(): void
    {
        foreach (self::TESTIMONIALS as $testimonial) {
            Testimonial::updateOrCreate(
                ['client_name' => $testimonial['client_name']],
                $testimonial + ['rating' => 5, 'status' => ContentStatus::Published],
            );
        }
    }
}

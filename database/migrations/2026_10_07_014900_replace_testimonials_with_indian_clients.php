<?php

use App\Models\Testimonial;
use Database\Seeders\TestimonialSeeder;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Replace the old overseas testimonials with Indian clients and remove all avatar images.
     */
    public function up(): void
    {
        Testimonial::withTrashed()
            ->whereIn('client_name', ['Marcus Chen', 'Sarah Jenkins', 'Dr. Robert Muller'])
            ->get()
            ->each->forceDelete();

        Testimonial::withTrashed()->get()->each->clearMediaCollection('avatars');

        (new TestimonialSeeder)->run();
    }

    public function down(): void
    {
        //
    }
};

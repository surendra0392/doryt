<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Localize the content to India-only by forcing a re-seed of the affected text.
     * This destroys existing pages/blogs/industries/products to replace them with the Indian-localized seeded text.
     */
    public function up(): void
    {
        // Truncate tables to ensure a clean slate for the seeders
        DB::table('settings')->truncate();
        DB::table('site_settings')->truncate();
        DB::table('pages')->truncate();
        
        DB::table('blog_posts')->truncate();
        DB::table('industries')->truncate();
        DB::table('products')->truncate();
        DB::table('categories')->truncate();
        DB::table('seo_metadata')->truncate();
        // Run the modified seeders
        Artisan::call('db:seed', ['--class' => 'SettingsSeeder', '--force' => true]);
        Artisan::call('db:seed', ['--class' => 'SiteSettingSeeder', '--force' => true]);
        Artisan::call('db:seed', ['--class' => 'CategorySeeder', '--force' => true]);
        Artisan::call('db:seed', ['--class' => 'IndustrySeeder', '--force' => true]);
        Artisan::call('db:seed', ['--class' => 'ProductSeeder', '--force' => true]);
        Artisan::call('db:seed', ['--class' => 'PageSeeder', '--force' => true]);
        Artisan::call('db:seed', ['--class' => 'ContentElaborationSeeder', '--force' => true]);
        Artisan::call('db:seed', ['--class' => 'BlogSeeder', '--force' => true]);
        Artisan::call('db:seed', ['--class' => 'CertificateDownloadSeeder', '--force' => true]);
        Artisan::call('db:seed', ['--class' => 'SeoMetadataSeeder', '--force' => true]);
    }

    public function down(): void
    {
        //
    }
};

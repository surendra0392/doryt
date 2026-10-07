<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            // Appearance
            ['group' => 'general', 'key' => 'primary_color', 'value' => '#27a74a'],
            ['group' => 'general', 'key' => 'bg_main', 'value' => '#ffffff'],
            ['group' => 'general', 'key' => 'bg_alt', 'value' => '#f3f4f6'],
            ['group' => 'general', 'key' => 'text_main', 'value' => '#0f2043'],
            ['group' => 'general', 'key' => 'text_muted', 'value' => '#6b7280'],

            // General
            ['group' => 'general', 'key' => 'site_name', 'value' => 'DO-RYT Machine Corp'],
            ['group' => 'general', 'key' => 'site_description', 'value' => 'Leading manufacturer of industrial freeze dryers, food processing equipment, and cold storage solutions.'],
            ['group' => 'general', 'key' => 'site_logo', 'value' => 'settings/logo_white.png'],
            ['group' => 'general', 'key' => 'footer_logo', 'value' => 'settings/logo_white.png'],
            ['group' => 'general', 'key' => 'preloader', 'value' => 'settings/logo_white.png'],
            ['group' => 'general', 'key' => 'admin_logo_light', 'value' => 'settings/logo_color.png'],
            ['group' => 'general', 'key' => 'admin_logo_dark', 'value' => 'settings/logo_white.png'],
            ['group' => 'general', 'key' => 'favicon', 'value' => 'settings/favicon.png'],
            ['group' => 'general', 'key' => 'appicon', 'value' => 'settings/appicon.png'],

            // SEO
            ['group' => 'seo', 'key' => 'meta_title_suffix', 'value' => '| DO-RYT Machine Corp'],
            ['group' => 'seo', 'key' => 'meta_description', 'value' => 'DO-RYT Machine Corp manufactures industrial freeze dryers, food processing equipment, and cold chain solutions for pharma, food, and nutraceutical industries.'],
            ['group' => 'seo', 'key' => 'meta_keywords', 'value' => 'freeze dryer, food processing, cold storage, industrial equipment, DO-RYT'],

            // Contact
            ['group' => 'contact', 'key' => 'email', 'value' => 'sales@dorytmachinery.com'],
            ['group' => 'contact', 'key' => 'phone', 'value' => '+91 988 575 0066'],
            ['group' => 'contact', 'key' => 'whatsapp', 'value' => '+919885750066'],
            ['group' => 'contact', 'key' => 'address', 'value' => "Plot # 6/8, Second Floor, Main Road,\nGandhi Nagar, APHB Colony,\nQutbullapur, Hyderabad, Telangana - 500 055."],

            // Social
            ['group' => 'social', 'key' => 'facebook', 'value' => 'https://www.facebook.com/dorytmachinecorp'],
            ['group' => 'social', 'key' => 'instagram', 'value' => 'https://www.instagram.com/dorytmachinecorp'],
        ];

        foreach ($settings as $setting) {
            Setting::updateOrCreate(
                ['group' => $setting['group'], 'key' => $setting['key']],
                ['value' => $setting['value']]
            );
        }

        Setting::clearCache();
    }
}

<?php

use App\Models\Setting;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

if (! function_exists('setting')) {
    /**
     * Get a setting value by key.
     *
     * @param  string  $key  The setting key in format "group.key"
     * @param  mixed  $default  The default value if not found
     * @return mixed
     */
    function setting(string $key, $default = null)
    {
        // Cache all settings forever, we will clear this cache when settings are saved
        $settings = Cache::rememberForever('app_settings', function () {
            return Setting::all()->keyBy(function ($setting) {
                return $setting->group.'.'.$setting->key;
            });
        });

        if ($settings->has($key)) {
            $val = $settings->get($key)->value;

            return ($val !== null && $val !== '') ? $val : $default;
        }

        return $default;
    }
}

if (! function_exists('setting_image_url')) {
    /**
     * Resolve an image setting to a public URL, falling back to a bundled asset
     * when the setting is empty or the uploaded file is missing from storage.
     *
     * @param  string  $key  The setting key in format "group.key"
     * @param  string  $fallbackAsset  Path relative to /public used as a fallback
     */
    function setting_image_url(string $key, string $fallbackAsset): string
    {
        $path = setting($key);

        if ($path && Storage::disk('public')->exists($path)) {
            return Storage::disk('public')->url($path);
        }

        return asset($fallbackAsset);
    }
}

<?php

use App\Models\Setting;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Keep only Facebook and Instagram as social links (WhatsApp lives in the contact group).
     */
    public function up(): void
    {
        Setting::query()
            ->where('group', 'social')
            ->whereIn('key', ['linkedin', 'twitter', 'youtube'])
            ->get()
            ->each->delete();

        Setting::updateOrCreate(
            ['group' => 'social', 'key' => 'facebook'],
            ['value' => 'https://www.facebook.com/dorytmachinecorp'],
        );

        Setting::updateOrCreate(
            ['group' => 'social', 'key' => 'instagram'],
            ['value' => 'https://www.instagram.com/dorytmachinecorp'],
        );
    }

    public function down(): void
    {
        //
    }
};

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Setting;

class SettingSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            [
                'key' => 'owner_name',
                'value' => 'John Doe',
            ],
            [
                'key' => 'profile_picture',
                'value' => null,
            ],
            [
                'key' => 'headline',
                'value' => 'Full Stack Developer',
            ],
            [
                'key' => 'description',
                'value' => 'Experienced developer specializing in web applications.',
            ],
            [
                'key' => 'contact_phone',
                'value' => '+62 812-3456-7890',
            ],
            [
                'key' => 'contact_email',
                'value' => 'email@contoh.com',
            ],
            [
                'key' => 'social_links',
                'value' => json_encode([
                    [
                        'svg' => '<svg>...</svg>',
                        'platform' => 'LinkedIn',
                        'url' => 'https://linkedin.com/in/username',
                    ],
                    [
                        'svg' => '<svg>...</svg>',
                        'platform' => 'GitHub',
                        'url' => 'https://github.com/username',
                    ],
                ]),
            ],
            [
                'key' => 'footer',
                'value' => '© 2025 John Doe. All rights reserved.',
            ],
            [
                'key' => 'show_blog',
                'value' => true,
            ],
            [
                'key' => 'show_profile_picture',
                'value' => true,
            ],
        ];

        foreach ($settings as $setting) {
            Setting::updateOrCreate(
                ['key' => $setting['key']],
                ['value' => $setting['value']]
            );
        }
    }
}

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
                'value' => 'Dimar Tarmizi',
            ],
            [
                'key' => 'profile_picture',
                'value' => null,
            ],
            [
                'key' => 'headline',
                'value' => 'Software Engineer',
            ],
            [
                'key' => 'description',
                'value' => 'I am a full-stack web software engineer with extensive experience in designing, developing, and maintaining scalable web applications. I specialize in building robust back-end systems and dynamic front-end interfaces, while managing the full web development lifecycle, including deployment, server configuration, and ongoing maintenance. I also have hands-on expertise with VPS and IaaS environments to ensure high performance, reliability, and smooth delivery of web projects. My work focuses on scalable web architecture, maintainable code, and seamless end-to-end web solutions.',
            ],
            [
                'key' => 'contact_phone',
                'value' => '+62 822-8422-0085',
            ],
            [
                'key' => 'contact_email',
                'value' => 'dimartarmizi@gmail.com',
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
                'value' => 'Built with Laravel, Filament, Inertia, Vue, and Tailwind CSS.',
            ],
            [
                'key' => 'show_blog',
                'value' => false,
            ],
            [
                'key' => 'show_profile_picture',
                'value' => false,
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

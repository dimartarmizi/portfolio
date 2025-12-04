<?php

namespace Database\Seeders;

use App\Models\Experience;
use Illuminate\Database\Seeder;

class ExperienceSeeder extends Seeder
{
    public function run(): void
    {
        Experience::create([
            'position'        => 'Web Programmer',
            'company'         => 'Universitas Islam Indragiri',
            'company_link'    => 'https://unisi.ac.id',
            'location'        => 'Riau, Indonesia',
            'start_date'      => '2024-08-01',
            'end_date'        => null,
            'employment_type' => 'Full-time',
            'description'     => "Responsible for architecture, platform ownership and delivery of university web systems, SSO design, and operational reliability improvements.",
            // Filament Repeater expects an array of objects matching the field keys
            'highlights'      => [
                ['highlight' => 'Manage and develop university websites supporting digital transformation using Laravel (backend) and Vue.js (frontend).'],
                ['highlight' => 'Deploy and maintain applications on VPS with Infrastructure-as-a-Service (IaaS) for scalability and reliability.'],
                ['highlight' => 'Oversee integration and maintenance of third-party applications.'],
                ['highlight' => 'Sole developer of the university’s Single Sign-On (SSO) system and integrated web apps (HR management, correspondence, employee performance). Platform: https://sso.unisi.ac.id.']
            ],
            'tech_stack' => [
                ['tech' => 'Ubuntu'],
                ['tech' => 'Webmin'],
                ['tech' => 'Apache'],
                ['tech' => 'MariaDB'],
                ['tech' => 'PHP'],
                ['tech' => 'Javascript'],
                ['tech' => 'Laravel'],
                ['tech' => 'Vue.js'],
                ['tech' => 'Git'],
                ['tech' => 'Wordpress'],
            ],
        ]);

        Experience::create([
            'position'        => 'Web Programmer',
            'company'         => 'PT. Riau Sakti United Plantations (Sambu Group)',
            'company_link'    => null,
            'location'        => 'Riau, Indonesia',
            'start_date'      => '2023-10-01',
            'end_date'        => '2024-07-31',
            'employment_type' => 'Full-time',
            'description'     => "Contributed to development and operational support for business web systems, with emphasis on quality assurance and data integrity.",
            'highlights'      => [
                ['highlight' => 'Developed and maintained PHP-based web applications.'],
                ['highlight' => 'Analyzed user requirements and conducted testing.'],
                ['highlight' => 'Maintained databases and supported system operations.']
            ],
            'tech_stack' => [
                ['tech' => 'PHP'],
                ['tech' => 'Laravel'],
                ['tech' => 'MySQL'],
                ['tech' => 'HTML'],
                ['tech' => 'CSS'],
                ['tech' => 'JavaScript'],
                ['tech' => 'Git']
            ],
        ]);

        Experience::create([
            'position'        => 'IT Specialist',
            'company'         => 'Indra Institute Research & Publication',
            'company_link'    => 'https://indrainstitute.id',
            'location'        => 'Riau, Indonesia',
            'start_date'      => '2022-12-01',
            'end_date'        => '2023-09-30',
            'employment_type' => 'Full-time',
            'description'     => "Operated and customized the OJS-based journal platform, improving availability and user experience while delivering OJS services to partner institutions.",
            'highlights'      => [
                ['highlight' => 'Manage the academic journal platform using Open Journal Systems (OJS), including server setup, hosting, UI design, and theme customization.'],
                ['highlight' => 'Ensure reliable journal service: https://ejournal.indrainstitute.id.'],
                ['highlight' => 'Provide OJS setup and customization services to other institutions. Portfolio: https://indrainstitute.id/jasa-ojs.']
            ],
            'tech_stack' => [
                ['tech' => 'PHP'],
                ['tech' => 'Open Journal Systems (OJS)'],
                ['tech' => 'MySQL'],
                ['tech' => 'Apache'],
                ['tech' => 'HTML'],
                ['tech' => 'CSS'],
                ['tech' => 'Smarty']
            ],
        ]);
    }
}

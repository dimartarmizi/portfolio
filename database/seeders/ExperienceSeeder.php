<?php

namespace Database\Seeders;

use App\Models\Experience;
use Illuminate\Database\Seeder;

class ExperienceSeeder extends Seeder
{
    public function run(): void
    {
        Experience::updateOrCreate([
            'company' => 'Northwind Studio',
            'position' => 'Senior Software Engineer',
            'start_date' => '2024-01-01',
        ], [
            'company_link'    => 'https://example.com/studio',
            'location'        => 'Remote',
            'end_date'        => null,
            'employment_type' => 'Full-time',
            'description'     => 'Responsible for building and maintaining internal web platforms, API services, and reusable UI systems for client-facing products.',
            'highlights'      => [
                ['highlight' => 'Built a shared component library and design system for multiple products.'],
                ['highlight' => 'Implemented authentication, role management, and API integrations.'],
                ['highlight' => 'Improved deployment workflows and platform reliability.'],
            ],
            'tech_stack' => [
                ['tech' => 'Laravel'],
                ['tech' => 'Vue.js'],
                ['tech' => 'Tailwind CSS'],
                ['tech' => 'MySQL'],
                ['tech' => 'Docker'],
                ['tech' => 'Git'],
            ],
        ]);

        Experience::updateOrCreate([
            'company' => 'Bluebird Labs',
            'position' => 'Web Developer',
            'start_date' => '2022-06-01',
        ], [
            'company_link'    => null,
            'location'        => 'Hybrid',
            'end_date'        => '2023-12-31',
            'employment_type' => 'Contract',
            'description'     => 'Worked on customer portals and operational tools, with a focus on reliability, testing, and maintainable features.',
            'highlights'      => [
                ['highlight' => 'Delivered features for dashboard and reporting workflows.'],
                ['highlight' => 'Supported QA, bug fixing, and release preparation.'],
                ['highlight' => 'Maintained database-driven business processes.'],
            ],
            'tech_stack' => [
                ['tech' => 'Laravel'],
                ['tech' => 'PHP'],
                ['tech' => 'MySQL'],
                ['tech' => 'JavaScript'],
                ['tech' => 'Git'],
                ['tech' => 'Testing'],
            ],
        ]);

        Experience::updateOrCreate([
            'company' => 'Atlas Digital Center',
            'position' => 'Technical Support Specialist',
            'start_date' => '2021-02-01',
        ], [
            'company_link'    => 'https://example.com/center',
            'location'        => 'On-site',
            'end_date'        => '2022-05-31',
            'employment_type' => 'Full-time',
            'description'     => 'Maintained a content management platform and helped teams manage documentation, publishing, and support requests.',
            'highlights'      => [
                ['highlight' => 'Helped teams publish content and manage internal knowledge pages.'],
                ['highlight' => 'Supported platform setup, updates, and day-to-day maintenance.'],
                ['highlight' => 'Improved response times for common support tasks.'],
            ],
            'tech_stack' => [
                ['tech' => 'PHP'],
                ['tech' => 'Laravel'],
                ['tech' => 'MySQL'],
                ['tech' => 'HTML'],
                ['tech' => 'CSS'],
                ['tech' => 'Support Tools'],
            ],
        ]);
    }
}

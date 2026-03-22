<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        $projects = [
            [
                'title' => 'Portfolio Starter',
                'slug' => 'portfolio-starter',
                'made_at' => 'Personal Project',
                'description' => 'A clean portfolio template for presenting profile, skills, experiences, and project case studies in one place.',
                'year' => 2026,
                'link' => null,
                'thumbnail' => null,
                'gallery' => [],
                'technologies' => [
                    ['name' => 'Laravel 13'],
                    ['name' => 'Inertia.js'],
                    ['name' => 'Vue 3'],
                ],
                'features' => [
                    ['feature' => 'Profile Section'],
                    ['feature' => 'Project Showcase'],
                    ['feature' => 'Admin Panel'],
                ],
                'results' => [
                    ['result' => 'Ready-to-edit starter content for a personal portfolio'],
                ],
                'status' => 'completed',
            ],
            [
                'title' => 'Team Task Board',
                'slug' => 'team-task-board',
                'made_at' => 'Internal Tool',
                'description' => 'A task tracking dashboard used to organize assignments, progress updates, and team notes.',
                'year' => 2025,
                'link' => 'https://example.com/task-board',
                'thumbnail' => null,
                'gallery' => [],
                'technologies' => [
                    ['name' => 'Laravel'],
                    ['name' => 'Tailwind CSS'],
                    ['name' => 'MySQL'],
                ],
                'features' => [
                    ['feature' => 'Task Management'],
                    ['feature' => 'Status Filtering'],
                    ['feature' => 'Team Notes'],
                ],
                'results' => [
                    ['result' => 'Simple workflow overview for small teams'],
                ],
                'status' => 'completed',
            ],
            [
                'title' => 'Client Dashboard',
                'slug' => 'client-dashboard',
                'made_at' => 'Agency Project',
                'description' => 'A reporting dashboard for reviewing client activity, metrics, and recent updates in a single interface.',
                'year' => 2025,
                'link' => null,
                'thumbnail' => null,
                'gallery' => [],
                'technologies' => [
                    ['name' => 'Vue 3'],
                    ['name' => 'Charting Library'],
                    ['name' => 'Laravel API'],
                ],
                'features' => [
                    ['feature' => 'Analytics Overview'],
                    ['feature' => 'Recent Activity'],
                    ['feature' => 'Role-based Access'],
                ],
                'results' => [
                    ['result' => 'Clear summary view for client operations'],
                ],
                'status' => 'ongoing',
            ],
            [
                'title' => 'Knowledge Base',
                'slug' => 'knowledge-base',
                'made_at' => 'Support Portal',
                'description' => 'A documentation website for publishing guides, FAQs, and internal references for users and teams.',
                'year' => 2024,
                'link' => 'https://example.com/knowledge-base',
                'thumbnail' => null,
                'gallery' => [],
                'technologies' => [
                    ['name' => 'Laravel'],
                    ['name' => 'Markdown'],
                    ['name' => 'Tailwind CSS'],
                ],
                'features' => [
                    ['feature' => 'Article Search'],
                    ['feature' => 'Category Management'],
                    ['feature' => 'Content Publishing'],
                ],
                'results' => [
                    ['result' => 'Faster access to common help articles'],
                ],
                'status' => 'completed',
            ],
            [
                'title' => 'Booking Manager',
                'slug' => 'booking-manager',
                'made_at' => 'Service Business',
                'description' => 'A lightweight scheduling app for managing appointments, availability, and customer bookings.',
                'year' => 2024,
                'link' => 'https://example.com/booking-manager',
                'thumbnail' => null,
                'gallery' => [],
                'technologies' => [
                    ['name' => 'Laravel'],
                    ['name' => 'Vue 3'],
                    ['name' => 'Calendar UI'],
                ],
                'features' => [
                    ['feature' => 'Availability Calendar'],
                    ['feature' => 'Appointment Requests'],
                    ['feature' => 'Notification Ready'],
                ],
                'results' => [
                    ['result' => 'Simplified booking management for a service workflow'],
                ],
                'status' => 'completed',
            ],
            [
                'title' => 'Content Hub',
                'slug' => 'content-hub',
                'made_at' => 'Publishing Project',
                'description' => 'A content management website for articles, announcements, and public-facing updates.',
                'year' => 2023,
                'link' => null,
                'thumbnail' => null,
                'gallery' => [],
                'technologies' => [
                    ['name' => 'WordPress'],
                    ['name' => 'Custom Theme'],
                    ['name' => 'SEO Tools'],
                ],
                'features' => [
                    ['feature' => 'Article Pages'],
                    ['feature' => 'News Updates'],
                    ['feature' => 'Reusable Blocks'],
                ],
                'results' => [
                    ['result' => 'Flexible content publishing setup'],
                ],
                'status' => 'completed',
            ],
        ];

        foreach ($projects as $data) {
            Project::updateOrCreate([
                'slug' => $data['slug'],
            ], $data);
        }
    }
}

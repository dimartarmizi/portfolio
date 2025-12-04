<?php

namespace Database\Seeders;

use App\Models\Experience;
use Illuminate\Database\Seeder;

class ExperienceSeeder extends Seeder
{
    public function run(): void
    {
        Experience::create([
            'position'        => 'Software Engineer',
            'company'         => 'Universitas Islam Indragiri',
            'company_link'    => 'https://unisi.ac.id',
            'location'        => 'Riau, Indonesia',
            'start_date'      => '2024-08-01',
            'end_date'        => null,
            'employment_type' => 'Full-time',
            'description'     => "Responsible for architecture, platform ownership and delivery of university web systems, SSO design, and operational reliability improvements.",
            'highlights'      => [
                ['highlight' => 'Sole developer of a fully integrated ecosystem of university web applications (SSO, API Gateway, E-Office, HR System, Academic System), centralizing data, automating workflows, and improving operational efficiency.'],
                ['highlight' => 'Contributed to the university’s paperless campus vision by digitizing administrative and academic processes.'],
                ['highlight' => 'Managed full server lifecycle, including VPS setup, domain, Cloudflare, SSL/TLS, and ongoing infrastructure maintenance.'],
                ['highlight' => 'Strengthened digital infrastructure and service accessibility while integrating third-party applications.'],
                ['highlight' => 'Implemented Google Workspace for Education to enhance collaboration and digital communication for faculty, staff, and students.'],
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
                ['tech' => 'Tailwind'],
                ['tech' => 'Bootstrap'],
                ['tech' => 'Git'],
                ['tech' => 'Wordpress'],
                ['tech' => 'Open Journal Systems (OJS)'],
                ['tech' => 'EPrints'],
                ['tech' => 'Google Workspace Management'],
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
                ['tech' => 'CodeIgniter'],
                ['tech' => 'Laravel'],
                ['tech' => 'MySQL'],
                ['tech' => 'Postgre'],
                ['tech' => 'HTML'],
                ['tech' => 'CSS'],
                ['tech' => 'JavaScript'],
                ['tech' => 'jQuery'],
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
                ['highlight' => 'Maintained reliable journal services, improving accessibility and consistency of academic publications.'],
                ['highlight' => 'Provided OJS setup and customization services to other institutions, supporting digital transformation and knowledge dissemination beyond the organization.']
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

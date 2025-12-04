<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        $projects = array(
            array(
                "title" => "Nexus Universitas Islam Indragiri",
                "slug" => "nexus-universitas-islam-indragiri",
                "made_at" => "Universitas Islam Indragiri",
                "description" => "Nexus Universitas Islam Indragiri is the main backend that provides APIs, a centralized authentication system, and cross-application data management within the Arcana Platform. With Nexus, all applications can interconnect securely, consistently, and efficiently.",
                "year" => 2025,
                "link" => "https://nexus.unisi.ac.id/",
                "thumbnail" => "01KAAJAFPNGGRBXVM3WS239T2W.png",
                "gallery" => "[{\"image\":\"01KAAJAFPR17VPQBVAA38T5R8H.png\",\"caption\":null}]",
                "technologies" => "[{\"name\":\"Laravel 12\"}]",
                "features" => "[{\"feature\":\"API Integration\"},{\"feature\":\"Centralized Authentication\"}]",
                "results" => "[{\"result\":\"A Systematic Platform\"}]",
                "status" => "completed",
                "created_at" => "2025-11-18 03:51:06",
                "updated_at" => "2025-11-18 04:07:17",
            ),
            array(
                "title" => "SSO Universitas Islam Indragiri",
                "slug" => "sso-universitas-islam-indragiri",
                "made_at" => "Universitas Islam Indragiri",
                "description" => "A Single Sign-On (SSO) system that allows users to access all applications in the Universitas Islam Indragiri Platform with a single login.",
                "year" => 2025,
                "link" => "https://sso.unisi.ac.id/",
                "thumbnail" => "01KAAJSBJE36AJ178MMYW3P0GG.png",
                "gallery" => "[{\"image\":\"01KAAJSBJH32A7ADA6ZCRG5783.png\",\"caption\":null},{\"image\":\"01KAAJSBJM9BGDR30YABNVGMPP.png\",\"caption\":null},{\"image\":\"01KAAJSBJPV9SRRFYJMY39GJXK.png\",\"caption\":null},{\"image\":\"01KAAJSBJQPFZM4V23K4FYF1FG.png\",\"caption\":null}]",
                "technologies" => "[{\"name\":\"Vue.js\"}]",
                "features" => "[{\"feature\":\"Centralized Authentication\"},{\"feature\":\"User Management\"},{\"feature\":\"Role and Access Management\"},{\"feature\":\"Login History\"}]",
                "results" => "[{\"result\":\"Simplifies logging into multiple applications\"}]",
                "status" => "completed",
                "created_at" => "2025-11-18 04:15:24",
                "updated_at" => "2025-11-18 04:15:24",
            ),
            array(
                "title" => "E-Office Universitas Islam Indragiri",
                "slug" => "eoffice-universitas-islam-indragiri",
                "made_at" => "Universitas Islam Indragiri",
                "description" => "An application for managing incoming and outgoing correspondence, disposition workflows, and digital archiving of letters within Universitas Islam Indragiri.",
                "year" => 2025,
                "link" => "https://e-office.unisi.ac.id/",
                "thumbnail" => "01KAAKA361DPS5SK061FA0W9EW.png",
                "gallery" => "[{\"image\":\"01KAAKA364GJDBTRP4NMRRDYV5.png\",\"caption\":null},{\"image\":\"01KAAKA366TPCW2TXA7FCYE5CP.png\",\"caption\":null}]",
                "technologies" => "[{\"name\":\"Vue.js\"}]",
                "features" => "[{\"feature\":\"Dashboard\"},{\"feature\":\"Letter Creation\"},{\"feature\":\"Disposition Workflow\"},{\"feature\":\"Reports\"}]",
                "results" => "[{\"result\":\"Faster and more efficient handling of correspondence\"}]",
                "status" => "completed",
                "created_at" => "2025-11-18 04:24:33",
                "updated_at" => "2025-11-18 04:24:33",
            ),
            array(
                "title" => "Kerjasama Universitas Islam Indragiri",
                "slug" => "kerjasama-universitas-islam-indragiri",
                "made_at" => "Universitas Islam Indragiri",
                "description" => "An internal application used to manage the university's collaboration data with external parties, including Memoranda of Understanding (MoU) and Memoranda of Agreement (MoA).",
                "year" => 2025,
                "link" => "https://kerjasama.unisi.ac.id/",
                "thumbnail" => "01KAAKFXFE8ED7KFZ7VTMG1FCC.png",
                "gallery" => "[{\"image\":\"01KAAKFXFH093NYJDBKK077Z5Z.png\",\"caption\":null},{\"image\":\"01KAAKFXFKCVE2173RHB4SBW52.png\",\"caption\":null}]",
                "technologies" => "[{\"name\":\"Vue.js\"}]",
                "features" => "[{\"feature\":\"Dashboard\"},{\"feature\":\"Analytics Features\"},{\"feature\":\"Collaboration Management\"}]",
                "results" => "[{\"result\":\"Structured collaboration management\"}]",
                "status" => "completed",
                "created_at" => "2025-11-18 04:27:43",
                "updated_at" => "2025-11-18 04:27:43",
            ),
            array(
                "title" => "E-Staff Universitas Islam Indragiri",
                "slug" => "e-staff-universitas-islam-indragiri",
                "made_at" => "Universitas Islam Indragiri",
                "description" => "A human resources management application for maintaining comprehensive employee records, job history, personnel documents, attendance, and more.",
                "year" => 2025,
                "link" => "https://e-staff.unisi.ac.id/",
                "thumbnail" => "01KAAKJNEJ3132AC78S9HAYFB1.png",
                "gallery" => "[{\"image\":\"01KAAKJNENJTNRHDFRWM9RZJHX.png\",\"caption\":\"Admin dashboard page\"},{\"image\":\"01KAAKJNEQ7SQTMMKA07K0VCT5.png\",\"caption\":\"Employee work unit page\"},{\"image\":\"01KAAKJNESFZ09CQMF70E217RG.png\",\"caption\":\"Employee attendance management page\"},{\"image\":\"01KAAKJNEVDP1SA3844FHTKRTT.png\",\"caption\":\"Employee absence management page\"}]",
                "technologies" => "[{\"name\":\"Vue.js 3\"}]",
                "features" => "[{\"feature\":\"Employee Management\"},{\"feature\":\"Position Management\"},{\"feature\":\"Work Unit Management\"},{\"feature\":\"Attendance and Presence Management\"}]",
                "results" => "[{\"result\":\"Improved HR governance\"}]",
                "status" => "completed",
                "created_at" => "2025-11-18 04:29:14",
                "updated_at" => "2025-11-18 04:38:39",
            ),
            array(
                "title" => "Website Utama Universitas Islam Indragiri",
                "slug" => "website-universitas-islam-indragiri",
                "made_at" => "Universitas Islam Indragiri",
                "description" => "The official portal of Universitas Islam Indragiri containing campus profile, news, announcements, and general academic services.",
                "year" => 2025,
                "link" => "https://unisi.ac.id/",
                "thumbnail" => "01KAAKVJJZPH306VS4VA2SQCYZ.png",
                "gallery" => "[{\"image\":\"01KAAKVJK3DRZ54W4RHTMBN8VG.png\",\"caption\":null}]",
                "technologies" => "[{\"name\":\"Wordpress\"}]",
                "features" => "[{\"feature\":\"About UNISI Page\"},{\"feature\":\"Announcements\"},{\"feature\":\"News\"},{\"feature\":\"Links to other Applications\"}]",
                "results" => "[{\"result\":\"University branding\"}]",
                "status" => "completed",
                "created_at" => "2025-11-18 04:34:06",
                "updated_at" => "2025-11-18 05:47:18",
            ),
            array(
                "title" => "Online Public Access Catalog Universitas Islam Indragiri",
                "slug" => "opac-universitas-islam-indragiri",
                "made_at" => "Universitas Islam Indragiri",
                "description" => "An online catalog application that enables the academic community to search and access the library's available book collections.",
                "year" => 2025,
                "link" => "https://opac.unisi.ac.id/",
                "thumbnail" => "01KAAM0X37EQQTCQ36YCVY4DRX.png",
                "gallery" => "[{\"image\":\"01KAAM0X3AS312H7STD6CA9NXN.png\",\"caption\":null}]",
                "technologies" => "[{\"name\":\"SLiMS 9 Bulian\"}]",
                "features" => "[{\"feature\":\"Digital Book Collections\"}]",
                "results" => "[{\"result\":\"Improved catalog search for books\"}]",
                "status" => "completed",
                "created_at" => "2025-11-18 04:37:00",
                "updated_at" => "2025-11-18 04:37:00",
            ),
            array(
                "title" => "Repository Universitas Islam Indragiri",
                "slug" => "repository-universitas-islam-indragiri",
                "made_at" => "Universitas Islam Indragiri",
                "description" => "A digital repository that stores academic works such as theses, articles, and other research outputs.",
                "year" => 2025,
                "link" => "https://repository.unisi.ac.id/",
                "thumbnail" => "01KAAMBP83VDXX5DVFV0NTPQY3.png",
                "gallery" => "[{\"image\":\"01KAAMBP85XZWFFW1TT3T52BB3.png\",\"caption\":null},{\"image\":\"01KAAMBP878XXEY2VEGDPG64F4.png\",\"caption\":null}]",
                "technologies" => "[{\"name\":\"EPrints 3.4\"}]",
                "features" => "[{\"feature\":\"Institutional Repository\"},{\"feature\":\"Public Search & Access\"},{\"feature\":\"Metadata Management\"},{\"feature\":\"OAI-PMH Support\"}]",
                "results" => "[{\"result\":\"Open access to institutional research and publications\"},{\"result\":\"Increased visibility and citations of academic works\"},{\"result\":\"Efficient and structured management of digital documents\"}]",
                "status" => "completed",
                "created_at" => "2025-11-18 04:42:54",
                "updated_at" => "2025-11-18 04:42:54",
            ),
            array(
                "title" => "Sistem Penjaminan Mutu Internal Universitas Islam Indragiri",
                "slug" => "spmi-universitas-islam-indragiri",
                "made_at" => "Universitas Islam Indragiri",
                "description" => "An application for managing documents, reporting, and internal quality assurance evaluations in accordance with higher education quality assurance standards.",
                "year" => 2025,
                "link" => "https://spmi.unisi.ac.id/",
                "thumbnail" => "01KAAMF1BXN6JW3EMF9VSRW94V.png",
                "gallery" => "[{\"image\":\"01KAAMF1BZKTAFQZW80G29ZGB0.png\",\"caption\":null}]",
                "technologies" => "[{\"name\":\"Laravel 12\"}]",
                "features" => "[{\"feature\":\"Accreditation Management\"},{\"feature\":\"Document Management\"},{\"feature\":\"Audit Management\"},{\"feature\":\"Quality Plan Management\"}]",
                "results" => "[{\"result\":\"Optimized audit processes\"}]",
                "status" => "completed",
                "created_at" => "2025-11-18 04:44:43",
                "updated_at" => "2025-11-18 04:44:43",
            ),
            array(
                "title" => "Surat Akademik Universitas Islam Indragiri",
                "slug" => "surat-akademik-universitas-islam-indragiri",
                "made_at" => "Universitas Islam Indragiri",
                "description" => "An application for university officials to verify and issue academic letters for students.",
                "year" => 2025,
                "link" => "https://sisura.unisi.ac.id/",
                "thumbnail" => "01KAAMKSFZNCF79PP1NBP2QTYT.png",
                "gallery" => "[{\"image\":\"01KAAMKSG10E48BPXJ1FECX068.png\",\"caption\":\"Dashboard page\"},{\"image\":\"01KAAMKSG30MVMZS9QNDPN4E7Q.png\",\"caption\":\"Student academic letters list page\"},{\"image\":\"01KAAMKSG52TH3DQVMRSCMK5YW.png\",\"caption\":\"Letter requirements page\"},{\"image\":\"01KAAMKSG7S9CTZNQYG99S1YZ2.png\",\"caption\":\"Letter types list page\"}]",
                "technologies" => "[{\"name\":\"Vue.js 3\"}]",
                "features" => "[{\"feature\":\"Student Letter List\"},{\"feature\":\"Management of letter data attributes\"},{\"feature\":\"Template Management\"},{\"feature\":\"Letter Type Management\"}]",
                "results" => "[{\"result\":\"Speeds up the administrative process of student academic correspondence\"}]",
                "status" => "completed",
                "created_at" => "2025-11-18 04:47:19",
                "updated_at" => "2025-11-18 04:47:19",
            ),
            array(
                "title" => "Website Utama Yayasan Indra Education College",
                "slug" => "website-yayasan-indra-education-college",
                "made_at" => "Yayasan Indra Education College",
                "description" => "The official portal of Yayasan Indra Education College containing profile, history, objectives, vision & mission.",
                "year" => 2024,
                "link" => "https://indraeducation.org/",
                "thumbnail" => "01KAAQTVZSZYJF7PSN7THVBS99.png",
                "gallery" => "[{\"image\":\"01KAAQTVZXN12R17W6VC5845TP.png\",\"caption\":null},{\"image\":\"01KAAQTVZZN6BJA1GQ2H517GKZ.png\",\"caption\":null}]",
                "technologies" => "[{\"name\":\"Wordpress\"}]",
                "features" => "[{\"feature\":\"Organization Page\"},{\"feature\":\"Gallery\"},{\"feature\":\"Contact\"}]",
                "results" => "[{\"result\":\"Organization branding\"}]",
                "status" => "completed",
                "created_at" => "2025-11-18 05:43:37",
                "updated_at" => "2025-11-18 05:43:37",
            ),
            array(
                "title" => "Website Perpustakaan Universitas Islam Indragiri",
                "slug" => "perpustakaan-universitas-islam-indragiri",
                "made_at" => "Universitas Islam Indragiri",
                "description" => "The official website of the Library and Language Lab serving as an information center for library services and language lab activities.",
                "year" => 2025,
                "link" => "https://perpustakaan.unisi.ac.id/",
                "thumbnail" => "01KAAR05NGNP9QY31YPSJJGSK0.png",
                "gallery" => "[{\"image\":\"01KAAR05NM4HRC1J7DDXMDMXFJ.png\",\"caption\":null}]",
                "technologies" => "[{\"name\":\"Wordpres\"}]",
                "features" => "[{\"feature\":\"Landing Page\"},{\"feature\":\"Profile Page\"},{\"feature\":\"Services Page\"},{\"feature\":\"Links to other Applications\"}]",
                "results" => "[{\"result\":\"Unit branding\"}]",
                "status" => "completed",
                "created_at" => "2025-11-18 05:46:30",
                "updated_at" => "2025-11-18 05:46:30",
            ),
        );

        foreach ($projects as $data) {
            if (isset($data['gallery']) && is_string($data['gallery'])) {
                $data['gallery'] = json_decode($data['gallery'], true) ?: [];
            }

            if (isset($data['technologies']) && is_string($data['technologies'])) {
                $data['technologies'] = json_decode($data['technologies'], true) ?: [];
            }

            if (isset($data['features']) && is_string($data['features'])) {
                $data['features'] = json_decode($data['features'], true) ?: [];
            }

            if (isset($data['results']) && is_string($data['results'])) {
                $data['results'] = json_decode($data['results'], true) ?: [];
            }

            unset($data['created_at'], $data['updated_at']);

            Project::updateOrCreate([
                'slug' => $data['slug'],
            ], $data);
        }
    }
}

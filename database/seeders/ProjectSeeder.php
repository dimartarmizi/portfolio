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
                "description" => "Nexus Universitas Islam Indragiri adalah backend utama yang menyediakan API, sistem autentikasi terpusat, dan pengelolaan data lintas aplikasi dalam Arcana Platform. Dengan Nexus, semua aplikasi dapat saling terhubung secara aman, konsisten, dan efisien.",
                "year" => 2025,
                "link" => "https://nexus.unisi.ac.id/",
                "thumbnail" => "01KAAJAFPNGGRBXVM3WS239T2W.png",
                "gallery" => "[{\"image\":\"01KAAJAFPR17VPQBVAA38T5R8H.png\",\"caption\":null}]",
                "technologies" => "[{\"name\":\"Laravel 12\"}]",
                "features" => "[{\"feature\":\"Integrasi API\"},{\"feature\":\"Autentikasi Terpusat\"}]",
                "results" => "[{\"result\":\"Platform Yang Sistematis\"}]",
                "status" => "completed",
                "created_at" => "2025-11-18 03:51:06",
                "updated_at" => "2025-11-18 04:07:17",
            ),
            array(
                "title" => "SSO Universitas Islam Indragiri",
                "slug" => "sso-universitas-islam-indragiri",
                "made_at" => "Universitas Islam Indragiri",
                "description" => "Sistem Single Sign-On (SSO) yang memudahkan pengguna untuk mengakses semua aplikasi dalam Platform Universitas Islam Indragiri dengan satu login.",
                "year" => 2025,
                "link" => "https://sso.unisi.ac.id/",
                "thumbnail" => "01KAAJSBJE36AJ178MMYW3P0GG.png",
                "gallery" => "[{\"image\":\"01KAAJSBJH32A7ADA6ZCRG5783.png\",\"caption\":null},{\"image\":\"01KAAJSBJM9BGDR30YABNVGMPP.png\",\"caption\":null},{\"image\":\"01KAAJSBJPV9SRRFYJMY39GJXK.png\",\"caption\":null},{\"image\":\"01KAAJSBJQPFZM4V23K4FYF1FG.png\",\"caption\":null}]",
                "technologies" => "[{\"name\":\"Vue.js\"}]",
                "features" => "[{\"feature\":\"Autentikasi Terpusat\"},{\"feature\":\"Manajemen Pengguna\"},{\"feature\":\"Manajemen Peran dan Akses\"},{\"feature\":\"Riwayat Login\"}]",
                "results" => "[{\"result\":\"Memudahkan Login ke berbagai Aplikasi\"}]",
                "status" => "completed",
                "created_at" => "2025-11-18 04:15:24",
                "updated_at" => "2025-11-18 04:15:24",
            ),
            array(
                "title" => "E-Office Universitas Islam Indragiri",
                "slug" => "eoffice-universitas-islam-indragiri",
                "made_at" => "Universitas Islam Indragiri",
                "description" => "Aplikasi untuk mengelola surat masuk/keluar, disposisi, dan pengarsipan surat digital di lingkungan Universitas Islam Indragiri.",
                "year" => 2025,
                "link" => "https://e-office.unisi.ac.id/",
                "thumbnail" => "01KAAKA361DPS5SK061FA0W9EW.png",
                "gallery" => "[{\"image\":\"01KAAKA364GJDBTRP4NMRRDYV5.png\",\"caption\":null},{\"image\":\"01KAAKA366TPCW2TXA7FCYE5CP.png\",\"caption\":null}]",
                "technologies" => "[{\"name\":\"Vue.js\"}]",
                "features" => "[{\"feature\":\"Dashboard\"},{\"feature\":\"Pembuatan Surat\"},{\"feature\":\"Proses Disposisi\"},{\"feature\":\"Laporan\"}]",
                "results" => "[{\"result\":\"Proses Surat Yang Mudah dan Cepat\"}]",
                "status" => "completed",
                "created_at" => "2025-11-18 04:24:33",
                "updated_at" => "2025-11-18 04:24:33",
            ),
            array(
                "title" => "Kerjasama Universitas Islam Indragiri",
                "slug" => "kerjasama-universitas-islam-indragiri",
                "made_at" => "Universitas Islam Indragiri",
                "description" => "Aplikasi milik internal Universitas Islam Indragiri yang digunakan untuk pengelolaan data kerja sama universitas dengan pihak lain, termasuk MoU dan MoA.",
                "year" => 2025,
                "link" => "https://kerjasama.unisi.ac.id/",
                "thumbnail" => "01KAAKFXFE8ED7KFZ7VTMG1FCC.png",
                "gallery" => "[{\"image\":\"01KAAKFXFH093NYJDBKK077Z5Z.png\",\"caption\":null},{\"image\":\"01KAAKFXFKCVE2173RHB4SBW52.png\",\"caption\":null}]",
                "technologies" => "[{\"name\":\"Vue.js\"}]",
                "features" => "[{\"feature\":\"Dashboard\"},{\"feature\":\"Fitur Analitik\"},{\"feature\":\"Manajemen Kerjasama\"}]",
                "results" => "[{\"result\":\"Pengelolaan Kerjasama yang tersistem\"}]",
                "status" => "completed",
                "created_at" => "2025-11-18 04:27:43",
                "updated_at" => "2025-11-18 04:27:43",
            ),
            array(
                "title" => "E-Staff Universitas Islam Indragiri",
                "slug" => "e-staff-universitas-islam-indragiri",
                "made_at" => "Universitas Islam Indragiri",
                "description" => "Aplikasi manajemen kepegawaian untuk mengelola data lengkap pegawai, riwayat jabatan, dokumen kepegawaian, kehadiran, dan lain-lain.",
                "year" => 2025,
                "link" => "https://e-staff.unisi.ac.id/",
                "thumbnail" => "01KAAKJNEJ3132AC78S9HAYFB1.png",
                "gallery" => "[{\"image\":\"01KAAKJNENJTNRHDFRWM9RZJHX.png\",\"caption\":\"Halaman dashboard admin\"},{\"image\":\"01KAAKJNEQ7SQTMMKA07K0VCT5.png\",\"caption\":\"Halaman unit kerja pegawai\"},{\"image\":\"01KAAKJNESFZ09CQMF70E217RG.png\",\"caption\":\"Halaman pengelolaan kehadiran pegawai\"},{\"image\":\"01KAAKJNEVDP1SA3844FHTKRTT.png\",\"caption\":\"Halaman pengelolaan ketidakhadiran pegawai\"}]",
                "technologies" => "[{\"name\":\"Vue.js 3\"}]",
                "features" => "[{\"feature\":\"Manajemen Pegawai\"},{\"feature\":\"Manajemen Jabatan\"},{\"feature\":\"Manajemen Unit Kerja\"},{\"feature\":\"Manajemen Presensi dan Absensi\"}]",
                "results" => "[{\"result\":\"Tata Kelola Kepegawaian Lebih Optimal\"}]",
                "status" => "completed",
                "created_at" => "2025-11-18 04:29:14",
                "updated_at" => "2025-11-18 04:38:39",
            ),
            array(
                "title" => "Website Utama Universitas Islam Indragiri",
                "slug" => "website-universitas-islam-indragiri",
                "made_at" => "Universitas Islam Indragiri",
                "description" => "Portal resmi Universitas Islam Indragiri yang memuat informasi profil kampus, berita, pengumuman, dan layanan akademik umum.",
                "year" => 2025,
                "link" => "https://unisi.ac.id/",
                "thumbnail" => "01KAAKVJJZPH306VS4VA2SQCYZ.png",
                "gallery" => "[{\"image\":\"01KAAKVJK3DRZ54W4RHTMBN8VG.png\",\"caption\":null}]",
                "technologies" => "[{\"name\":\"Wordpress\"}]",
                "features" => "[{\"feature\":\"Halaman Tentang UNISI\"},{\"feature\":\"Pengumuman\"},{\"feature\":\"Berita\"},{\"feature\":\"Link ke Aplikasi Lain\"}]",
                "results" => "[{\"result\":\"University Branding\"}]",
                "status" => "completed",
                "created_at" => "2025-11-18 04:34:06",
                "updated_at" => "2025-11-18 05:47:18",
            ),
            array(
                "title" => "Online Public Access Catalog Universitas Islam Indragiri",
                "slug" => "opac-universitas-islam-indragiri",
                "made_at" => "Universitas Islam Indragiri",
                "description" => "Aplikasi katalog daring yang memungkinkan sivitas akademika mencari dan mengakses koleksi buku yang tersedia di perpustakaan UNISI.",
                "year" => 2025,
                "link" => "https://opac.unisi.ac.id/",
                "thumbnail" => "01KAAM0X37EQQTCQ36YCVY4DRX.png",
                "gallery" => "[{\"image\":\"01KAAM0X3AS312H7STD6CA9NXN.png\",\"caption\":null}]",
                "technologies" => "[{\"name\":\"SLiMS 9 Bulian\"}]",
                "features" => "[{\"feature\":\"Koleksi Buku Digital\"}]",
                "results" => "[{\"result\":\"Pencarian Katalog Buku Lebih Optimal\"}]",
                "status" => "completed",
                "created_at" => "2025-11-18 04:37:00",
                "updated_at" => "2025-11-18 04:37:00",
            ),
            array(
                "title" => "Repository Universitas Islam Indragiri",
                "slug" => "repository-universitas-islam-indragiri",
                "made_at" => "Universitas Islam Indragiri",
                "description" => "Repositori digital yang menyimpan karya ilmiah civitas akademika seperti skripsi, artikel, dan penelitian lainnya.",
                "year" => 2025,
                "link" => "https://repository.unisi.ac.id/",
                "thumbnail" => "01KAAMBP83VDXX5DVFV0NTPQY3.png",
                "gallery" => "[{\"image\":\"01KAAMBP85XZWFFW1TT3T52BB3.png\",\"caption\":null},{\"image\":\"01KAAMBP878XXEY2VEGDPG64F4.png\",\"caption\":null}]",
                "technologies" => "[{\"name\":\"EPrints 3.4\"}]",
                "features" => "[{\"feature\":\"Repositori Institusi\"},{\"feature\":\"Pencarian & Akses Publik\"},{\"feature\":\"Manajemen Metadata\"},{\"feature\":\"OAI-PMH Support\"}]",
                "results" => "[{\"result\":\"Akses terbuka ke penelitian dan publikasi institusi\"},{\"result\":\"Peningkatan visibilitas dan sitasi karya akademik\"},{\"result\":\"Pengelolaan dokumen digital yang efisien dan terstruktur\"}]",
                "status" => "completed",
                "created_at" => "2025-11-18 04:42:54",
                "updated_at" => "2025-11-18 04:42:54",
            ),
            array(
                "title" => "Sistem Penjaminan Mutu Internal Universitas Islam Indragiri",
                "slug" => "spmi-universitas-islam-indragiri",
                "made_at" => "Universitas Islam Indragiri",
                "description" => "Aplikasi untuk pengelolaan dokumen, pelaporan, dan evaluasi mutu internal universitas sesuai standar penjaminan mutu pendidikan tinggi.",
                "year" => 2025,
                "link" => "https://spmi.unisi.ac.id/",
                "thumbnail" => "01KAAMF1BXN6JW3EMF9VSRW94V.png",
                "gallery" => "[{\"image\":\"01KAAMF1BZKTAFQZW80G29ZGB0.png\",\"caption\":null}]",
                "technologies" => "[{\"name\":\"Laravel 12\"}]",
                "features" => "[{\"feature\":\"Pengelolaan Akreditasi\"},{\"feature\":\"Pengelolaan Dokumen\"},{\"feature\":\"Pengelolaan Audit\"},{\"feature\":\"Pengelolaan Rencana Mutu\"}]",
                "results" => "[{\"result\":\"Keperluan Audit Lebih Optimal\"}]",
                "status" => "completed",
                "created_at" => "2025-11-18 04:44:43",
                "updated_at" => "2025-11-18 04:44:43",
            ),
            array(
                "title" => "Surat Akademik Universitas Islam Indragiri",
                "slug" => "surat-akademik-universitas-islam-indragiri",
                "made_at" => "Universitas Islam Indragiri",
                "description" => "Aplikasi bagi pejabat Universitas Islam Indragiri untuk verifikasi, dan penerbitan surat-surat akademik bagi mahasiswa.",
                "year" => 2025,
                "link" => "https://sisura.unisi.ac.id/",
                "thumbnail" => "01KAAMKSFZNCF79PP1NBP2QTYT.png",
                "gallery" => "[{\"image\":\"01KAAMKSG10E48BPXJ1FECX068.png\",\"caption\":\"Halaman dashboard\"},{\"image\":\"01KAAMKSG30MVMZS9QNDPN4E7Q.png\",\"caption\":\"Halaman daftar surata akademik mahasiswa\"},{\"image\":\"01KAAMKSG52TH3DQVMRSCMK5YW.png\",\"caption\":\"Halaman persyaratan surat\"},{\"image\":\"01KAAMKSG7S9CTZNQYG99S1YZ2.png\",\"caption\":\"Halaman daftar jenis surat \"}]",
                "technologies" => "[{\"name\":\"Vue.js 3\"}]",
                "features" => "[{\"feature\":\"Daftar surat mahasiswa\"},{\"feature\":\"Pengelolaan atribut data pada surat\"},{\"feature\":\"Pengelolaan template surat\"},{\"feature\":\"pengelolaan jenis surat\"}]",
                "results" => "[{\"result\":\"Mempercepat proses administrasi surat menyurat akademik mahasiswa\"}]",
                "status" => "completed",
                "created_at" => "2025-11-18 04:47:19",
                "updated_at" => "2025-11-18 04:47:19",
            ),
            array(
                "title" => "Website Utama Yayasan Indra Education College",
                "slug" => "website-yayasan-indra-education-college",
                "made_at" => "Yayasan Indra Education College",
                "description" => "Portal resmi Yayasan Indra Education College yang memuat informasi profil, sejarah, tujuan, visi & misi.",
                "year" => 2024,
                "link" => "https://indraeducation.org/",
                "thumbnail" => "01KAAQTVZSZYJF7PSN7THVBS99.png",
                "gallery" => "[{\"image\":\"01KAAQTVZXN12R17W6VC5845TP.png\",\"caption\":null},{\"image\":\"01KAAQTVZZN6BJA1GQ2H517GKZ.png\",\"caption\":null}]",
                "technologies" => "[{\"name\":\"Wordpress\"}]",
                "features" => "[{\"feature\":\"Halaman Organisasi\"},{\"feature\":\"Galeri\"},{\"feature\":\"Kontak\"}]",
                "results" => "[{\"result\":\"Organization Branding\"}]",
                "status" => "completed",
                "created_at" => "2025-11-18 05:43:37",
                "updated_at" => "2025-11-18 05:43:37",
            ),
            array(
                "title" => "Website Perpustakaan Universitas Islam Indragiri",
                "slug" => "perpustakaan-universitas-islam-indragiri",
                "made_at" => "Universitas Islam Indragiri",
                "description" => "Website resmi UPT Perpustakaan dan Labor Bahasa sebagai pusat informasi layanan perpustakaan dan kegiatan labor bahasa.",
                "year" => 2025,
                "link" => "https://perpustakaan.unisi.ac.id/",
                "thumbnail" => "01KAAR05NGNP9QY31YPSJJGSK0.png",
                "gallery" => "[{\"image\":\"01KAAR05NM4HRC1J7DDXMDMXFJ.png\",\"caption\":null}]",
                "technologies" => "[{\"name\":\"Wordpres\"}]",
                "features" => "[{\"feature\":\"Landing Page\"},{\"feature\":\"Halaman Profil\"},{\"feature\":\"Halaman Layanan\"},{\"feature\":\"Link ke Aplikasi Lain\"}]",
                "results" => "[{\"result\":\"Unit Branding\"}]",
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

<?php

namespace Database\Seeders;

use App\Models\Application;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PortalSeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            'Kepegawaian',
            'IT',
            'Keuangan',
            'Administrasi',
            'Operasional',
            'Pelayanan',
        ];

        foreach ($categories as $name) {
            Category::create([
                'name' => $name,
                'slug' => Str::slug($name),
            ]);
        }

        $it = Category::where('name', 'IT')->first();
        $kepegawaian = Category::where('name', 'Kepegawaian')->first();
        $operasional = Category::where('name', 'Operasional')->first();

        Application::create([
            'name' => 'siLapor',
            'description' => 'Aplikasi untuk mengelola absensi karyawan.',
            'url' => 'https://silapor.syifaglobalgroup.com/',
            'icon' => '🕐',
            'category_id' => $kepegawaian->id,
            'is_active' => true,
        ]);

        Application::create([
            'name' => 'IT Helpdesk',
            'description' => 'Aplikasi untuk melaporkan masalah dan kebutuhan IT.',
            'url' => 'https://example.com',
            'icon' => '🛠️',
            'category_id' => $it->id,
            'is_active' => true,
        ]);

        Application::create([
            'name' => 'Maintenance',
            'description' => 'Aplikasi untuk pelaporan kerusakan fasilitas.',
            'url' => 'https://example.com',
            'icon' => '🔧',
            'category_id' => $operasional->id,
            'is_active' => true,
        ]);

        Application::create([
            'name' => 'Inventaris',
            'description' => 'Aplikasi pengelolaan inventaris rumah sakit.',
            'url' => 'https://example.com',
            'icon' => '📦',
            'category_id' => $operasional->id,
            'is_active' => true,
        ]);

        Application::create([
            'name' => 'E-Office',
            'description' => 'Aplikasi administrasi dan surat menyurat.',
            'url' => 'https://example.com',
            'icon' => '📄',
            'category_id' => $kepegawaian->id,
            'is_active' => true,
        ]);
    }
}

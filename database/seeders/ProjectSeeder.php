<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project;

class ProjectSeeder extends Seeder
{
    public function run()
    {
        Project::create([
            'title' => 'Sample Project One',
            'description' => 'A short description for sample project one.',
            'category' => 'Web',
            'link' => 'https://example.com',
            'image' => null,
        ]);

        Project::create([
            'title' => 'Sample Project Two',
            'description' => 'A short description for sample project two.',
            'category' => 'Mobile',
            'link' => null,
            'image' => null,
        ]);
    }
}

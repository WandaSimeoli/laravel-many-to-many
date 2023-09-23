<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use App\Models\Technology;
use Illuminate\Support\Str;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::withoutForeignKeyConstraints(function () {
            Technology::truncate();
        });
        $technology = ['HTML','CSS', 'JAVASCRIPT', 'PHP', 'VIEW', 'LARAVEL'];
        foreach ($technology as $title) {
            $slug = str()->slug($title);
          Technology::create([
            'title'=>$title,
            'slug'=>$slug,
          ]);
        }
    }
}

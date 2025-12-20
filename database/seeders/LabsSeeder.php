<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class LabsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('labs')->insert([
            [
                'lab_name' => 'Computer Lab',
                'main_banner' => 'labs/computer/main.jpg',
                'description' => 'Modern computer lab with high-speed internet and latest systems.',
                'slider_images' => json_encode([
                    'labs/computer/slider1.jpg',
                    'labs/computer/slider2.jpg',
                    'labs/computer/slider3.jpg',
                ]),
                'status' => 'active',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'lab_name' => 'Physics Lab',
                'main_banner' => 'labs/physics/main.jpg',
                'description' => 'Physics lab equipped with practical experiment instruments.',
                'slider_images' => json_encode([
                    'labs/physics/slider1.jpg',
                    'labs/physics/slider2.jpg',
                    'labs/physics/slider3.jpg',
                ]),
                'status' => 'active',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'lab_name' => 'Art Lab',
                'main_banner' => 'labs/art/main.jpg',
                'description' => 'Creative art lab for drawing, painting and craft activities.',
                'slider_images' => json_encode([
                    'labs/art/slider1.jpg',
                    'labs/art/slider2.jpg',
                    'labs/art/slider3.jpg',
                ]),
                'status' => 'active',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'lab_name' => 'Chemistry Lab',
                'main_banner' => 'labs/chemistry/main.jpg',
                'description' => 'Chemistry lab with safe and advanced chemical apparatus.',
                'slider_images' => json_encode([
                    'labs/chemistry/slider1.jpg',
                    'labs/chemistry/slider2.jpg',
                    'labs/chemistry/slider3.jpg',
                ]),
                'status' => 'active',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'lab_name' => 'Biology Lab',
                'main_banner' => 'labs/biology/main.jpg',
                'description' => 'Biology lab for anatomy, microscopy and biological experiments.',
                'slider_images' => json_encode([
                    'labs/biology/slider1.jpg',
                    'labs/biology/slider2.jpg',
                    'labs/biology/slider3.jpg',
                ]),
                'status' => 'active',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}

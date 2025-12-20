<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Banner;
use App\Models\TopScorer;
use App\Models\Blog;
use Carbon\Carbon;

class AdminModulesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Seed Banners
        Banner::create([
            'image' => 'banners/sample-banner-1.jpg',
            'title' => 'Welcome to Gurukul',
            'status' => 'active',
        ]);

        Banner::create([
            'image' => 'banners/sample-banner-2.jpg',
            'title' => 'Admissions Open 2024',
            'status' => 'active',
        ]);

        Banner::create([
            'image' => 'banners/sample-banner-3.jpg',
            'title' => 'Excellence in Education',
            'status' => 'inactive',
        ]);

        // Seed Top Scorers
        $topScorers = [
            ['name' => 'Rahul Sharma', 'class' => '10th', 'section' => 'A', 'subject' => 'Mathematics'],
            ['name' => 'Priya Singh', 'class' => '10th', 'section' => 'B', 'subject' => 'Science'],
            ['name' => 'Amit Kumar', 'class' => '12th', 'section' => 'A', 'subject' => 'Physics'],
            ['name' => 'Sneha Patel', 'class' => '12th', 'section' => 'B', 'subject' => 'Chemistry'],
            ['name' => 'Vikram Reddy', 'class' => '9th', 'section' => 'A', 'subject' => 'English'],
            ['name' => 'Anjali Gupta', 'class' => '11th', 'section' => 'C', 'subject' => 'Biology'],
        ];

        foreach ($topScorers as $scorer) {
            TopScorer::create($scorer);
        }

        // Seed Blogs
        Blog::create([
            'title' => 'Welcome to Our New Academic Year',
            'author' => 'Principal Dr. Sharma',
            'content' => 'We are excited to welcome all students to the new academic year. This year promises to be filled with learning, growth, and achievement. Our dedicated faculty and staff are committed to providing the best educational experience for all our students.',
            'status' => 'published',
            'publish_date' => Carbon::now()->subDays(5),
        ]);

        Blog::create([
            'title' => 'Annual Sports Day Highlights',
            'author' => 'Sports Coordinator',
            'content' => 'Our annual sports day was a grand success with students participating in various events. The day was filled with enthusiasm, sportsmanship, and memorable moments. Congratulations to all the winners and participants!',
            'status' => 'published',
            'publish_date' => Carbon::now()->subDays(10),
        ]);

        Blog::create([
            'title' => 'Upcoming Science Exhibition',
            'author' => 'Science Department',
            'content' => 'Get ready for our upcoming science exhibition where students will showcase their innovative projects and experiments. The exhibition will be held next month. Stay tuned for more details!',
            'status' => 'draft',
            'publish_date' => null,
        ]);

        Blog::create([
            'title' => 'Parent-Teacher Meeting Schedule',
            'author' => 'Admin Office',
            'content' => 'The parent-teacher meetings for this semester are scheduled for next week. Parents are requested to attend and discuss their child\'s progress with the respective teachers. Detailed schedule will be shared soon.',
            'status' => 'published',
            'publish_date' => Carbon::now()->subDays(2),
        ]);

        $this->command->info('Admin modules seeded successfully!');
    }
}

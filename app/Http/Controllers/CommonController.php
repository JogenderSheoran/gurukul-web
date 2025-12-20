<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommonController extends Controller
{
   public function blogs()
{
    $seo = [
        'title' => 'Blog | Gurukul Takshshila School',
        'description' => 'Read educational articles, school activities, wellness tips and learning insights from Gurukul Takshshila School.',
        'keywords' => 'school blog, education articles, gurukul takshshila blog, student learning',
        'image' => asset('assets/img/blog-banner.jpg'),
    ];

    $blogs = [
        [
            'title' => 'Benefits of Art Education in Schools',
            'slug' => 'benefits-of-art-education',
            'short_description' =>
                'Art education helps students develop creativity, confidence and emotional balance.',
            'image' => 'https://picsum.photos/600/400?random=9001',
            'date' => 'Jan 10, 2025',
        ],
        [
            'title' => 'Creating a Creative Learning Environment',
            'slug' => 'creative-learning-environment',
            'short_description' =>
                'A creative environment encourages innovation and joyful learning experiences.',
            'image' => 'https://picsum.photos/600/400?random=9002',
            'date' => 'Jan 05, 2025',
        ],
        [
            'title' => 'Importance of Co-Curricular Activities',
            'slug' => 'importance-of-co-curricular-activities',
            'short_description' =>
                'Co-curricular activities play a key role in holistic student development.',
            'image' => 'https://picsum.photos/600/400?random=9003',
            'date' => 'Dec 28, 2024',
        ],
        [
            'title' => 'Role of Sports in Student Life',
            'slug' => 'role-of-sports-in-student-life',
            'short_description' =>
                'Sports help students build discipline, teamwork and physical fitness.',
            'image' => 'https://picsum.photos/600/400?random=9004',
            'date' => 'Dec 20, 2024',
        ],
        [
            'title' => 'Student Wellness & Mental Health',
            'slug' => 'student-wellness-mental-health',
            'short_description' =>
                'Mental wellness programs ensure emotional stability and confidence.',
            'image' => 'https://picsum.photos/600/400?random=9005',
            'date' => 'Dec 15, 2024',
        ],
        [
            'title' => 'Why Residential Schooling Matters',
            'slug' => 'why-residential-schooling-matters',
            'short_description' =>
                'Residential schooling promotes independence, discipline and life skills.',
            'image' => 'https://picsum.photos/600/400?random=9006',
            'date' => 'Dec 08, 2024',
        ],
    ];

    return view('frontend.blog.index', compact('seo', 'blogs'));
}


public function blogDetails($slug)
{
    // SEO (static)
    $seo = [
        'title' => 'Blog | Gurukul Takshshila School',
        'description' =>
            'Read educational articles, activities and insights from Gurukul Takshshila School.',
        'keywords' => 'school blog, education articles, gurukul takshshila',
        'image' => asset('assets/img/blog/blog-detail.jpg'),
    ];

    // Static blog content (same for all slugs)
    $blog = [
        'title' => 'Benefits of Holistic Education',
        'date' => 'Jan 15, 2025',
        'image' => asset('assets/img/blog/blog-detail.jpg'),
        'description' =>
            'Holistic education focuses on overall development of students including academics,
             creativity, emotional intelligence and physical well-being.
             
             At Gurukul Takshshila, we believe education goes beyond textbooks and classrooms.
             Our approach ensures students grow into confident and responsible individuals.',
    ];

    return view('frontend.blog.details', compact('seo', 'blog'));
}

public function newsIndex()
    {
        $seo = [
            'title' => 'School News | Gurukul Takshshila',
            'description' => 'Latest school news, updates and announcements from Gurukul Takshshila.',
            'keywords' => 'school news, gurukul takshshila news',
            'image' => 'https://picsum.photos/1200/630?random=301',
        ];

        $news = $this->newsData();

        return view('frontend.news.index', compact('seo', 'news'));
    }

    public function newsDetails($slug)
    {
        $news = collect($this->newsData())->firstWhere('slug', $slug)
            ?? $this->newsData()[0]; // static fallback

        $seo = [
            'title' => $news['title'].' | Gurukul Takshshila',
            'description' => strip_tags($news['description']),
            'keywords' => 'school news, education updates',
            'image' => $news['image'],
        ];

        return view('frontend.news.details', compact('seo', 'news'));
    }

    /* ================= EVENTS ================= */

    public function eventsIndex()
    {
        $seo = [
            'title' => 'School Events | Gurukul Takshshila',
            'description' => 'Upcoming school events, programs and activities at Gurukul Takshshila.',
            'keywords' => 'school events, gurukul takshshila events',
            'image' => 'https://picsum.photos/1200/630?random=401',
        ];

        $events = $this->eventsData();

        return view('frontend.events.index', compact('seo', 'events'));
    }

    public function eventsDetails($slug)
    {
        $event = collect($this->eventsData())->firstWhere('slug', $slug)
            ?? $this->eventsData()[0]; // static fallback

        $seo = [
            'title' => $event['title'].' | Gurukul Takshshila',
            'description' => strip_tags($event['description']),
            'keywords' => 'school events, education programs',
            'image' => $event['image'],
        ];

        return view('frontend.events.details', compact('seo', 'event'));
    }

    /* ================= STATIC DATA ================= */

    private function newsData()
    {
        return [
            [
                'title' => 'Annual Sports Meet Highlights',
                'slug' => 'annual-sports-meet',
                'image' => 'https://picsum.photos/600/400?random=1',
                'location' => 'School Playground',
                'date' => '10 Jan 2025',
                'time' => '10:00 AM',
                'description' => 'Annual sports meet was celebrated with great enthusiasm and participation.',
            ],
            [
                'title' => 'Science Exhibition Success',
                'slug' => 'science-exhibition',
                'image' => 'https://picsum.photos/600/400?random=2',
                'location' => 'Science Block',
                'date' => '05 Jan 2025',
                'time' => '11:30 AM',
                'description' => 'Students showcased innovative science projects and experiments.',
            ],
            [
                'title' => 'Art Competition Winners',
                'slug' => 'art-competition',
                'image' => 'https://picsum.photos/600/400?random=3',
                'location' => 'Art Lab',
                'date' => '28 Dec 2024',
                'time' => '09:00 AM',
                'description' => 'Creative artworks were displayed during the annual art competition.',
            ],
            [
                'title' => 'Health & Wellness Camp',
                'slug' => 'health-wellness-camp',
                'image' => 'https://picsum.photos/600/400?random=4',
                'location' => 'Medical Wing',
                'date' => '20 Dec 2024',
                'time' => '10:00 AM',
                'description' => 'Health checkups and wellness sessions for students.',
            ],
            [
                'title' => 'Parent Teacher Meeting',
                'slug' => 'ptm-meeting',
                'image' => 'https://picsum.photos/600/400?random=5',
                'location' => 'School Auditorium',
                'date' => '15 Dec 2024',
                'time' => '01:00 PM',
                'description' => 'Parents interacted with teachers to discuss student progress.',
            ],
            [
                'title' => 'Cultural Fest Celebration',
                'slug' => 'cultural-fest',
                'image' => 'https://picsum.photos/600/400?random=6',
                'location' => 'Main Stage',
                'date' => '10 Dec 2024',
                'time' => '05:00 PM',
                'description' => 'Students showcased cultural performances and traditions.',
            ],
        ];
    }

    private function eventsData()
    {
        return [
            [
                'title' => 'Annual Day Celebration',
                'slug' => 'annual-day',
                'image' => 'https://picsum.photos/600/400?random=11',
                'location' => 'School Auditorium',
                'date' => '25 Jan 2025',
                'time' => '04:00 PM',
                'description' => 'Annual Day celebration with cultural programs and awards.',
            ],
            [
                'title' => 'Science Fair',
                'slug' => 'science-fair',
                'image' => 'https://picsum.photos/600/400?random=12',
                'location' => 'Science Block',
                'date' => '20 Jan 2025',
                'time' => '11:00 AM',
                'description' => 'Students present innovative science models and ideas.',
            ],
            [
                'title' => 'Yoga & Meditation Camp',
                'slug' => 'yoga-camp',
                'image' => 'https://picsum.photos/600/400?random=13',
                'location' => 'Activity Hall',
                'date' => '18 Jan 2025',
                'time' => '07:00 AM',
                'description' => 'Morning yoga and meditation sessions for students.',
            ],
            [
                'title' => 'Inter School Debate',
                'slug' => 'debate-competition',
                'image' => 'https://picsum.photos/600/400?random=14',
                'location' => 'Conference Hall',
                'date' => '15 Jan 2025',
                'time' => '10:00 AM',
                'description' => 'Inter-school debate competition on current topics.',
            ],
            [
                'title' => 'Sports Tournament',
                'slug' => 'sports-tournament',
                'image' => 'https://picsum.photos/600/400?random=15',
                'location' => 'Sports Ground',
                'date' => '12 Jan 2025',
                'time' => '09:00 AM',
                'description' => 'Annual sports tournament with various games.',
            ],
            [
                'title' => 'Music & Dance Workshop',
                'slug' => 'music-dance-workshop',
                'image' => 'https://picsum.photos/600/400?random=16',
                'location' => 'Music Room',
                'date' => '08 Jan 2025',
                'time' => '02:00 PM',
                'description' => 'Workshop conducted by professional artists.',
            ],
        ];
    }

  public function contactUs()
    {
        $seo = [
            'title' => 'Contact Us | गुरुकुल तक्षशिला',
            'description' => 'Get in touch with Gurukul Takshshila for admission inquiries, feedback or general information.',
            'keywords' => 'Gurukul Takshshila contact, school inquiry, admission',
            'image' => asset('assets/img/contact-banner.jpg'),
        ];

        return view('frontend.contact', compact('seo'));
    }





    
}

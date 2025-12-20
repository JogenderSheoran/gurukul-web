<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\AboutSection;
use App\Models\InnerBanner;
use App\Models\NewsEvent;
use App\Models\TopScorer;
use App\Models\Infrastructure;
use App\Models\Stat;
use App\Models\Lab;
use App\Models\HomePageText;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Fetch active banners
        $banners = Banner::where('status', 'active')->orderBy('created_at', 'desc')->get();
        
        // Fetch about section (get first active record)
        $aboutSection = AboutSection::where('status', 'active')->first();
        
        // Fetch active inner banner
        $innerBanner = InnerBanner::where('status', 'active')->orderBy('order')->first();
        
        // Fetch news & events
        $newsEvents = NewsEvent::where('status', 'active')
            ->orderBy('created_at', 'desc')
            ->get();
        
        // Fetch active infrastructure
        $infrastructures = Infrastructure::where('status', 'active')
            ->orderBy('order', 'asc')
            ->get();
        
        // Fetch active stats
        $stats = Stat::where('status', 'active')
            ->orderBy('order', 'asc')
            ->get();
        
        // Fetch active labs
        $labs = Lab::where('status', 'active')
            ->orderBy('created_at', 'desc')
            ->get();
        
        // Fetch active home page texts
        $homePageTexts = HomePageText::where('status', 'active')
            ->orderBy('created_at', 'desc')
            ->get();
        
        // Fetch top scorers (limit to 3 for homepage)
        $topScorers = TopScorer::orderBy('created_at', 'desc')->limit(3)->get();
        
        return view('frontend.home.index', compact(
            'banners',
            'aboutSection',
            'innerBanner',
            'newsEvents',
            'infrastructures',
            'stats',
            'labs',
            'homePageTexts',
            'topScorers'
        ));
    }

    public function principalMessage()
    {
        return view('frontend.about-us.principal-message');
    }

    public function visionMission()
    {
        return view('frontend.about-us.vision-mission');
    }
    
    public function coreValues()
    {
        return view('frontend.about-us.core-values');
    }

    public function team()
    {
        return view('frontend.about-us.team');
    }

    public function hostel()
    {
        return view('frontend.bording.hostel');
    }
    
    public function nutritiousMeals()
    {
        return view('frontend.bording.nutrition');
    }

   public function healthWellness()
    {
        $seo = [
            'title' => 'Health & Wellness Facilities | Gurukul Takshshila School',
            'description' => 'Comprehensive health and wellness facilities at Gurukul Takshshila including 24/7 medical staff, wellness programs and regular health check-ups.',
            'keywords' => 'school health facilities, student wellness, residential school healthcare',
            'image' => asset('assets/img/health-wellness-banner.jpg'),
        ];

        return view('frontend.bording.health-wellness', compact('seo'));
    }

    public function classroomFacilities()
    {
        $seo = [
            'title' => 'Smart Classrooms | Gurukul Takshshila School',
            'description' => 'Modern smart classrooms at Gurukul Takshshila with digital boards, spacious seating, ventilation and student-friendly learning environment.',
            'keywords' => 'smart classrooms, school classroom facilities, digital classroom, gurukul infrastructure',
            'image' => asset('assets/img/classroom-banner.jpg'),
        ];

        return view('frontend.infrastructure.classroom-facilities', compact('seo'));
    }

    public function libraryFacilities()
    {
        $seo = [
            'title' => 'Library Facilities | Gurukul Takshshila School',
            'description' => 'Well-equipped library at Gurukul Takshshila with academic books, reference material, digital resources and peaceful reading environment for students.',
            'keywords' => 'school library facilities, gurukul library, academic library, digital library for students',
            'image' => asset('assets/img/library-banner.jpg'),
        ];

        return view('frontend.infrastructure.library-facilities', compact('seo'));
    }

    public function musicDanceClasses()
    {
        $seo = [
            'title' => 'Music & Dance Classes | Gurukul Takshshila Performing Arts Program',
            'description' => 'Music and dance classes at Gurukul Takshshila offering vocal, instrumental, classical, contemporary dance and performing arts training for holistic student development.',
            'keywords' => 'music classes school, dance classes gurukul, performing arts education, music and dance training',
            'image' => asset('assets/img/music-dance-banner.jpg'),
        ];

        return view('frontend.infrastructure.music-dance-classes', compact('seo'));
    }

    public function smartClassrooms()
    {
        $seo = [
            'title' => 'Smart Classrooms with Virtual & Interactive Boards | Gurukul Takshshila',
            'description' => 'Virtual and interactive board smart classrooms at Gurukul Takshshila with digital learning tools, audio-visual aids and modern teaching infrastructure.',
            'keywords' => 'smart classrooms, virtual board classroom, interactive board school, digital classroom gurukul',
            'image' => asset('assets/img/smart-classroom-banner.jpg'),
        ];

        return view('frontend.infrastructure.smart-classrooms', compact('seo'));
    }

    public function computerLabs()
    {
        $seo = [
            'title' => 'Computer Labs | Gurukul Takshshila School',
            'description' => 'Well-equipped computer labs at Gurukul Takshshila with state-of-the-art technology, software tools and hands-on training for students.',
            'keywords' => 'school computer labs, gurukul computer labs, computer lab facilities, technology education',
            'image' => asset('assets/img/computer-lab-banner.jpg'),
        ];

        return view('frontend.infrastructure.computer-lab', compact('seo'));
    }

    public function physicsLabs()
    {
        $seo = [
            'title' => 'Physics Labs | Gurukul Takshshila School',
            'description' => 'Well-equipped physics labs at Gurukul Takshshila with state-of-the-art equipment, safety measures and hands-on experiments for students.',
            'keywords' => 'school physics labs, gurukul physics labs, physics lab facilities, science education',
            'image' => asset('assets/img/physics-lab-banner.jpg'),
        ];

        return view('frontend.infrastructure.physics-lab', compact('seo'));
    }

    public function chemistryLabs()
    {
        $seo = [
            'title' => 'Chemistry Labs | Gurukul Takshshila School',
            'description' => 'Well-equipped chemistry labs at Gurukul Takshshila with state-of-the-art equipment, safety measures and hands-on experiments for students.',
            'keywords' => 'school chemistry labs, gurukul chemistry labs, chemistry lab facilities, science education',
            'image' => asset('assets/img/chemistry-lab-banner.jpg'),
        ];

        return view('frontend.infrastructure.chemistry-lab', compact('seo'));
    }

    public function biologyLabs()
    {
        $seo = [
            'title' => 'Biology Labs | Gurukul Takshshila School',
            'description' => 'Well-equipped biology labs at Gurukul Takshshila with state-of-the-art equipment, safety measures and hands-on experiments for students.',
            'keywords' => 'school biology labs, gurukul biology labs, biology lab facilities, science education',
            'image' => asset('assets/img/biology-lab-banner.jpg'),
        ];

        return view('frontend.infrastructure.biology-lab', compact('seo'));
    }

    public function artLabs()
    {
        $seo = [
            'title' => 'Art Labs | Gurukul Takshshila School',
            'description' => 'Well-equipped art labs at Gurukul Takshshila with state-of-the-art equipment, safety measures and hands-on experiments for students.',
            'keywords' => 'school art labs, gurukul art labs, art lab facilities, art education',
            'image' => asset('assets/img/art-lab-banner.jpg'),
        ];

        return view('frontend.infrastructure.art-lab', compact('seo'));
    }


    



    



}

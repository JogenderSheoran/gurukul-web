<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\AboutSection;
use App\Models\AboutSectionData;
use App\Models\InnerBanner;
use App\Models\NewsEvent;
use App\Models\TopScorer;
use App\Models\Infrastructure;
use App\Models\InfrastructureSection;
use App\Models\Stat;
use App\Models\Lab;
use App\Models\HomePageText;
use App\Models\WelcomePopup;
use App\Models\PrincipalMessage;
use App\Models\ChairmanMessage;
use App\Models\DisclosureGeneralInfo;
use App\Models\DisclosureDocument;
use App\Models\DisclosureResult;
use App\Models\DisclosureStaffInfo;
use App\Models\DisclosureInfrastructure;
use App\Models\DisclosureTeacher;
use App\Models\TeamMember;
use App\Models\Hostel;
use App\Models\NutritionManagement;
use App\Models\HealthNutrition;
use App\Models\SportsComplex;
use App\Models\ReadingMission;
use App\Models\CoCurricularActivity;
use App\Models\CompetitiveExam;
use App\Models\HouseSystem;
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
        
        // Fetch active welcome popup
        $welcomePopup = WelcomePopup::where('status', 'active')->first();
        
        // Fetch about section data (principal, chairman, vision, mission, core values)
        $aboutSectionData = AboutSectionData::first();
        
        return view('frontend.home.index', compact(
            'banners',
            'aboutSection',
            'innerBanner',
            'newsEvents',
            'infrastructures',
            'stats',
            'labs',
            'homePageTexts',
            'topScorers',
            'welcomePopup',
            'aboutSectionData'
        ));
    }

    public function principalMessage()
    {
        $aboutSectionData = AboutSectionData::first();
        
        return view('frontend.about-us.principal-message', compact('aboutSectionData'));
    }

    public function chairmainMessage()
    {
        $aboutSectionData = AboutSectionData::first();
        
        return view('frontend.about-us.chairman-message', compact('aboutSectionData'));
    }

    public function visionMission()
    {
        $aboutSectionData = AboutSectionData::first();
        
        return view('frontend.about-us.vision-mission', compact('aboutSectionData'));
    }
    
    public function coreValues()
    {
        $aboutSectionData = AboutSectionData::first();
        
        return view('frontend.about-us.core-values', compact('aboutSectionData'));
    }

    public function team()
    {
        $teachingStaff = TeamMember::where('member_type', 'teaching')->get();
        $nonTeachingStaff = TeamMember::where('member_type', 'non_teaching')->get();
        
        return view('frontend.about-us.team', compact('teachingStaff', 'nonTeachingStaff'));
    }

    public function hostel()
    {
        $hostel = Hostel::first();
        
        return view('frontend.bording.hostel', compact('hostel'));
    }
    
    public function nutritiousMeals()
    {
        $nutrition = NutritionManagement::first();
        
        return view('frontend.bording.nutrition', compact('nutrition'));
    }

   public function healthWellness()
    {
        $healthNutrition = HealthNutrition::first();
        
        $seo = [
            'title' => 'Health & Wellness Facilities | Gurukul Takshshila School',
            'description' => 'Comprehensive health and wellness facilities at Gurukul Takshshila including 24/7 medical staff, wellness programs and regular health check-ups.',
            'keywords' => 'school health facilities, student wellness, residential school healthcare',
            'image' => asset('assets/img/health-wellness-banner.jpg'),
        ];

        return view('frontend.bording.health-wellness', compact('seo', 'healthNutrition'));
    }

    public function classroomFacilities()
    {
        $section = InfrastructureSection::where('section_key', 'classroom')->first();
        
        $seo = [
            'title' => 'Smart Classrooms | Gurukul Takshshila School',
            'description' => 'Modern smart classrooms at Gurukul Takshshila with digital boards, spacious seating, ventilation and student-friendly learning environment.',
            'keywords' => 'smart classrooms, school classroom facilities, digital classroom, gurukul infrastructure',
            'image' => asset('assets/img/classroom-banner.jpg'),
        ];

        return view('frontend.infrastructure.classroom-facilities', compact('seo', 'section'));
    }

    public function libraryFacilities()
    {
        $section = InfrastructureSection::where('section_key', 'library')->first();
        
        $seo = [
            'title' => 'Library Facilities | Gurukul Takshshila School',
            'description' => 'Well-equipped library at Gurukul Takshshila with academic books, reference material, digital resources and peaceful reading environment for students.',
            'keywords' => 'school library facilities, gurukul library, academic library, digital library for students',
            'image' => asset('assets/img/library-banner.jpg'),
        ];

        return view('frontend.infrastructure.library-facilities', compact('seo', 'section'));
    }

    public function musicDanceClasses()
    {
        $section = InfrastructureSection::where('section_key', 'music_and_dance')->first();
        
        $seo = [
            'title' => 'Music & Dance Classes | Gurukul Takshshila Performing Arts Program',
            'description' => 'Music and dance classes at Gurukul Takshshila offering vocal, instrumental, classical, contemporary dance and performing arts training for holistic student development.',
            'keywords' => 'music classes school, dance classes gurukul, performing arts education, music and dance training',
            'image' => asset('assets/img/music-dance-banner.jpg'),
        ];

        return view('frontend.infrastructure.music-dance-classes', compact('seo', 'section'));
    }

    public function smartClassrooms()
    {
        $section = InfrastructureSection::where('section_key', 'smart_classroom')->first();
        
        $seo = [
            'title' => 'Smart Classrooms with Virtual & Interactive Boards | Gurukul Takshshila',
            'description' => 'Virtual and interactive board smart classrooms at Gurukul Takshshila with digital learning tools, audio-visual aids and modern teaching infrastructure.',
            'keywords' => 'smart classrooms, virtual board classroom, interactive board school, digital classroom gurukul',
            'image' => asset('assets/img/smart-classroom-banner.jpg'),
        ];

        return view('frontend.infrastructure.smart-classrooms', compact('seo', 'section'));
    }

    public function computerLabs()
    {
        $lab = Lab::where('lab_name', 'LIKE', '%Computer%')->first();
        
        $seo = [
            'title' => 'Computer Labs | Gurukul Takshshila School',
            'description' => 'Well-equipped computer labs at Gurukul Takshshila with state-of-the-art technology, software tools and hands-on training for students.',
            'keywords' => 'school computer labs, gurukul computer labs, computer lab facilities, technology education',
            'image' => asset('assets/img/computer-lab-banner.jpg'),
        ];

        return view('frontend.infrastructure.computer-lab', compact('seo', 'lab'));
    }

    public function physicsLabs()
    {
        $lab = Lab::where('lab_name', 'LIKE', '%Physics%')->first();
        
        $seo = [
            'title' => 'Physics Labs | Gurukul Takshshila School',
            'description' => 'Well-equipped physics labs at Gurukul Takshshila with state-of-the-art equipment, safety measures and hands-on experiments for students.',
            'keywords' => 'school physics labs, gurukul physics labs, physics lab facilities, science education',
            'image' => asset('assets/img/physics-lab-banner.jpg'),
        ];

        return view('frontend.infrastructure.physics-lab', compact('seo', 'lab'));
    }

    public function chemistryLabs()
    {
        $lab = Lab::where('lab_name', 'LIKE', '%Chemistry%')->first();
        
        $seo = [
            'title' => 'Chemistry Labs | Gurukul Takshshila School',
            'description' => 'Well-equipped chemistry labs at Gurukul Takshshila with state-of-the-art equipment, safety measures and hands-on experiments for students.',
            'keywords' => 'school chemistry labs, gurukul chemistry labs, chemistry lab facilities, science education',
            'image' => asset('assets/img/chemistry-lab-banner.jpg'),
        ];

        return view('frontend.infrastructure.chemistery-lab', compact('seo', 'lab'));
    }

    public function biologyLabs()
    {
        $lab = Lab::where('lab_name', 'LIKE', '%Biology%')->first();
        
        $seo = [
            'title' => 'Biology Labs | Gurukul Takshshila School',
            'description' => 'Well-equipped biology labs at Gurukul Takshshila with state-of-the-art equipment, safety measures and hands-on experiments for students.',
            'keywords' => 'school biology labs, gurukul biology labs, biology lab facilities, science education',
            'image' => asset('assets/img/biology-lab-banner.jpg'),
        ];

        return view('frontend.infrastructure.biology-lab', compact('seo', 'lab'));
    }

    public function artLabs()
    {
        $lab = Lab::where('lab_name', 'LIKE', '%Art%')->first();
        
        $seo = [
            'title' => 'Art Labs | Gurukul Takshshila School',
            'description' => 'Well-equipped art labs at Gurukul Takshshila with state-of-the-art equipment, safety measures and hands-on experiments for students.',
            'keywords' => 'school art labs, gurukul art labs, art lab facilities, art education',
            'image' => asset('assets/img/art-lab-banner.jpg'),
        ];

        return view('frontend.infrastructure.art-lab', compact('seo', 'lab'));
    }

    public function sportsComplex()
    {
        $sportsComplex = SportsComplex::first();
        
        $seo = [
            'title' => 'Sports Complex | Gurukul Takshshila Residential School',
            'description' => 'State-of-the-art sports complex at Gurukul Takshshila with facilities for cricket, football, basketball, volleyball and more.',
            'keywords' => 'school sports complex, sports facilities, gurukul sports, outdoor sports',
            'image' => asset('assets/img/sports-complex-banner.jpg'),
        ];

        return view('frontend.special-program.sports-complex', compact('seo', 'sportsComplex'));
    }

    public function readingMission()
    {
        $readingMission = ReadingMission::first();
        
        $seo = [
            'title' => 'Reading Mission Programme | Gurukul Takshshila',
            'description' => 'Reading Mission Programme at Gurukul Takshshila encourages critical thinking, vocabulary building and love for literature among students.',
            'keywords' => 'reading mission, school reading program, literacy development, gurukul reading initiative',
            'image' => asset('assets/img/reading-mission-banner.jpg'),
        ];

        return view('frontend.special-program.reading-mission', compact('seo', 'readingMission'));
    }

    public function celebrationsAdventure()
    {
        $seo = [
            'title' => 'Celebrations & Adventure Trips | Gurukul Takshshila',
            'description' => 'Celebrations and Adventure Trips at Gurukul Takshshila create unforgettable memories through educational tours, cultural events and joyful celebrations.',
            'keywords' => 'school adventure trips, school celebrations, educational tours, gurukul activities',
            'image' => asset('assets/img/celebrations-banner.jpg'),
        ];

        return view('frontend.special-program.celebrations-adventure', compact('seo'));
    }

    public function coCurricularActivities()
    {
        $coCurricularActivity = CoCurricularActivity::first();
        
        $seo = [
            'title' => 'Co-curricular Activities | Gurukul Takshshila',
            'description' => 'Co-curricular activities at Gurukul Takshshila help students develop creativity, teamwork, leadership and confidence beyond academics.',
            'keywords' => 'co-curricular activities, school activities, student development, gurukul activities',
            'image' => asset('assets/img/co-curricular-banner.jpg'),
        ];

        return view('frontend.special-program.co-curricular-activities', compact('seo', 'coCurricularActivity'));
    }

    public function competitiveExam()
    {
        $competitiveExam = CompetitiveExam::first();
        
        $seo = [
            'title' => 'Excellence in Competitive Examinations | Gurukul Takshshila',
            'description' => 'Gurukul Takshshila prepares students for competitive examinations with focused coaching, practice tests and expert guidance.',
            'keywords' => 'competitive exams, entrance exams, coaching, test preparation',
            'image' => asset('assets/img/competitive-exam-banner.jpg'),
        ];

        return view('frontend.special-program.competitive-examinations', compact('seo', 'competitiveExam'));
    }

    public function houseSystem()
    {
        $houseSystem = HouseSystem::first();
        
        $seo = [
            'title' => 'House System | Gurukul Takshshila',
            'description' => 'The House System at Gurukul Takshshila fosters leadership, teamwork and healthy competition through four houses of excellence.',
            'keywords' => 'school house system, student leadership, inter house activities, gurukul house system',
            'image' => asset('assets/img/house-system.jpg'),
        ];

        return view('frontend.special-program.house-system', compact('seo', 'houseSystem'));
    }

    public function admissionProcedure()
    {
        $seo = [
            'title' => 'Admission Procedure | Gurukul Takshshila',
            'description' => 'Know the admission procedure, selection process, entrance test, interview and required documents at Gurukul Takshshila.',
            'keywords' => 'school admission procedure, gurukul admission, boarding school admission',
            'image' => asset('assets/img/admission-banner.jpg'),
        ];

        return view('frontend.admission.admission-procedure', compact('seo'));
    }

    public function entranceCumSyllabus()
    {
        $seo = [
            'title' => 'Entrance cum Syllabus | Gurukul Takshshila',
            'description' => 'Complete entrance test pattern and syllabus details for admission to Gurukul Takshshila.',
            'keywords' => 'entrance test syllabus, gurukul admission test, school entrance exam syllabus',
            'image' => asset('assets/img/admission-banner.jpg'),
        ];

        return view('frontend.admission.entrance-cum-syllabus', compact('seo'));
    }

    public function feeStructure()
    {
        $seo = [
            'title' => 'Fee Structure | Gurukul Takshshila',
            'description' => 'Comprehensive fee details, concession policies and refund rules applicable for admission at Gurukul Takshshila.',
            'keywords' => 'school fee structure, gurukul fee, boarding school fee',
            'image' => asset('assets/img/admission-banner.jpg'),
        ];

        return view('frontend.admission.fee-structure', compact('seo'));
    }

    public function requiredItem()
    {
        $seo = [
            'title' => 'Required Items | Gurukul Takshshila',
            'description' => 'Complete list of required items, inventory details and school uniform for admission and hostel stay at Gurukul Takshshila.',
            'keywords' => 'Gurukul Takshshila required items, hostel items list, school uniform details',
            'image' => asset('assets/img/admission-banner.jpg'),
        ];

        return view('frontend.admission.required-item', compact('seo'));
    }

    public function importantInformation()
    {
        $seo = [
            'title' => 'Important Information | Gurukul Takshshila Rules & Regulations',
            'description' => 'Rules, regulations, discipline guidelines and boarding rules of Gurukul Takshshila',
            'keywords' => 'Gurukul Takshshila rules, boarding rules, school discipline, hostel rules',
            'image' => asset('assets/images/seo/rules.jpg'),
        ];

        return view('frontend.admission.important-information', compact('seo'));
    }

    public function mandatoryDisclosure()
    {
        $seo = [
            'title' => 'Mandatory Public Disclosure | Gurukul Takshshila School',
            'description' => 'Complete mandatory public disclosure information as per CBSE guidelines including general information, documents, results, staff details, infrastructure and teacher information.',
            'keywords' => 'mandatory disclosure, CBSE disclosure, school information, gurukul takshshila disclosure',
            'image' => asset('assets/img/mandatory-disclosure-banner.jpg'),
        ];

        // Fetch all disclosure data
        $generalInfo = DisclosureGeneralInfo::first();
        $documents = DisclosureDocument::where('section', 'general')->get();
        $academicDocuments = DisclosureDocument::where('section', 'results_academics')->get();
        $resultsClassX = DisclosureResult::where('class_type', 'X')->get();
        $resultsClassXII = DisclosureResult::where('class_type', 'XII')->get();
        $staffInfo = DisclosureStaffInfo::first();
        $infrastructure = DisclosureInfrastructure::first();
        $teachers = DisclosureTeacher::all();

        return view('frontend.mandatory-disclosure.index', compact(
            'seo',
            'generalInfo',
            'documents',
            'academicDocuments',
            'resultsClassX',
            'resultsClassXII',
            'staffInfo',
            'infrastructure',
            'teachers'
        ));
    }

    public function celebrationAdventure()
    {
        $adventures = \App\Models\AdventureCelebration::active()
            ->adventure()
            ->orderBy('created_at', 'desc')
            ->get();
            
        $celebrations = \App\Models\AdventureCelebration::active()
            ->celebration()
            ->orderBy('created_at', 'desc')
            ->get();
        
        $seo = [
            'title' => 'Celebration & Adventure Trips | Gurukul Takshshila',
            'description' => 'Celebration and Adventure Trips at Gurukul Takshshila create unforgettable memories through educational tours, cultural events and joyful celebrations.',
            'keywords' => 'school adventure trips, school celebrations, educational tours, gurukul activities',
            'image' => asset('assets/img/celebrations-banner.jpg'),
        ];

        return view('frontend.special-program.celebrations-adventure', compact('seo', 'adventures', 'celebrations'));
    }


    



    



}

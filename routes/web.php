<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\TopScorerController;
use App\Http\Controllers\Admin\AboutSectionController;
use App\Http\Controllers\Admin\InnerBannerController;
use App\Http\Controllers\Admin\NewsEventController;
use App\Http\Controllers\Admin\StatController;
use App\Http\Controllers\Admin\InfrastructureController;
use App\Http\Controllers\Admin\LabController;
use App\Http\Controllers\Admin\HomePageTextController;
use App\Http\Controllers\Admin\WelcomePopupController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\AboutUsController;
use App\Http\Controllers\Admin\HostelController;
use App\Http\Controllers\Admin\NutritionManagementController;
use App\Http\Controllers\Admin\HealthNutritionController;
use App\Http\Controllers\Admin\SportsComplexController;
use App\Http\Controllers\Admin\ReadingMissionController;
use App\Http\Controllers\Admin\CoCurricularActivityController;
use App\Http\Controllers\Admin\CompetitiveExamController;
use App\Http\Controllers\Admin\HouseSystemController;
use App\Http\Controllers\Admin\PageBannerController;
use App\Http\Controllers\Admin\TeamMemberController;
use App\Http\Controllers\Admin\MandatoryDisclosureController;
use App\Http\Controllers\Admin\InfrastructureSectionController;
use App\Http\Controllers\Admin\ProgramController;
use App\Http\Controllers\Admin\AdmissionEnquiryController;
use App\Http\Controllers\Admin\ContactEnquiryController;
use App\Http\Controllers\Admin\GalleryController as AdminGalleryController;
use App\Http\Controllers\CommonController;
use App\Http\Controllers\GalleryController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/principal-message', [HomeController::class, 'principalMessage'])->name('principal-message');
Route::get('/chairmain-message', [HomeController::class, 'chairmainMessage'])->name('chairmain-message');
Route::get('/vision-mission', [HomeController::class, 'visionMission'])->name('vision-mission');
Route::get('/core-values', [HomeController::class, 'coreValues'])->name('core-values');
Route::get('/team', [HomeController::class, 'team'])->name('team');


Route::get('/hostel', [HomeController::class, 'hostel'])->name('hostel');
Route::get('/nutrition', [HomeController::class, 'nutritiousMeals'])->name('nutrition');
Route::get('health-wellness', [HomeController::class, 'healthWellness'])->name('health-wellness');
Route::get('/classroom-facilities', [HomeController::class, 'classroomFacilities'])->name('classroom-facilities');
Route::get('/library-facilities', [HomeController::class, 'libraryFacilities'])->name('library-facilities');
Route::get('/music-dance-classes', [HomeController::class, 'musicDanceClasses'])->name('music-dance-classes');
Route::get('/virtual-and-interactive-board-smart-classrooms', [HomeController::class, 'smartClassrooms'])->name('virtual-and-interactive-board-smart-classrooms');

Route::get('/computer-lab', [HomeController::class, 'computerLabs'])->name('computer-labs');
Route::get('/physics-lab', [HomeController::class, 'physicsLabs'])->name('physics-labs');
Route::get('/chemistry-lab', [HomeController::class, 'chemistryLabs'])->name('chemistry-labs');
Route::get('/biology-lab', [HomeController::class, 'biologyLabs'])->name('biology-labs');
Route::get('/art-lab', [HomeController::class, 'artLabs'])->name('art-labs');

Route::get('sports-complex', [HomeController::class, 'sportsComplex'])->name('sports-complex');
Route::get('reading-mission', [HomeController::class, 'readingMission'])->name('reading-mission');
Route::get('celebration-adventure', [HomeController::class, 'celebrationAdventure'])->name('celebration-adventure');
Route::get('co-curricular-activities', [HomeController::class, 'coCurricularActivities'])->name('co-curricular-activities');
Route::get('competitive-exam', [HomeController::class, 'competitiveExam'])->name('competitive-exam');
Route::get('house-system', [HomeController::class, 'houseSystem'])->name('house-system');

Route::get('admission-form', [HomeController::class, 'admissionForm'])->name('admission-form');
Route::get('admission-procedure', [HomeController::class, 'admissionProcedure'])->name('admission-procedure');
Route::get('entrance-cum-syllabus', [HomeController::class, 'entranceCumSyllabus'])->name('entrance-cum-syllabus');
Route::get('fee-structure', [HomeController::class, 'feeStructure'])->name('fee-structure');
Route::get('required-item', [HomeController::class, 'requiredItem'])->name('required-item');
Route::get('important-information', [HomeController::class, 'importantInformation'])->name('important-information');


Route::get('blogs', [CommonController::class, 'blogs'])->name('blogs');
Route::get('/blogs/{slug}', [CommonController::class, 'blogDetails'])->name('blog.details');
Route::get('/gallery', [GalleryController::class, 'gallery'])->name('gallery.index');
Route::get('/mandatory-disclosure', [HomeController::class, 'mandatoryDisclosure'])->name('mandatory-disclosure');
Route::get('/programs/{program_key}', [HomeController::class, 'showProgram'])->name('programs.show');

/* EVENTS */
Route::get('/events', [CommonController::class, 'eventsIndex'])->name('events.index');
Route::get('/events/{slug}', [CommonController::class, 'eventsDetails'])->name('events.details');
Route::get('/news', [CommonController::class, 'newsIndex'])->name('news.index');
Route::get('/news/{slug}', [CommonController::class, 'newsDetails'])->name('news.details');

Route::get('/contact-us', [CommonController::class, 'contactUs'])->name('contact');

/* ADMISSION ENQUIRY */
Route::post('/admission-enquiry', [App\Http\Controllers\AdmissionEnquiryController::class, 'store'])->name('admission-enquiry.store');

/* CONTACT ENQUIRY */
Route::post('/contact-enquiry', [App\Http\Controllers\ContactEnquiryController::class, 'store'])->name('contact-enquiry.store');






    
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {
    // Banner routes - specific routes must come before resource routes
    Route::get('banner/data', [BannerController::class, 'getData'])->name('banner.data');
    Route::post('banner/{banner}/toggle-status', [BannerController::class, 'toggleStatus'])->name('banner.toggle-status');
    Route::resource('banner', BannerController::class);
    
    // Top Scorer routes - specific routes must come before resource routes
    Route::get('top-scorer/data', [TopScorerController::class, 'getData'])->name('top-scorer.data');
    Route::resource('top-scorer', TopScorerController::class);
    
    // Welcome Popup routes
    Route::get('welcome-popup', [WelcomePopupController::class, 'index'])->name('welcome-popup.index');
    Route::post('welcome-popup', [WelcomePopupController::class, 'store'])->name('welcome-popup.store');
    Route::delete('welcome-popup', [WelcomePopupController::class, 'destroy'])->name('welcome-popup.destroy');
    
    // Blog routes - specific routes must come before resource routes
    Route::get('blog/data', [BlogController::class, 'getData'])->name('blog.data');
    Route::post('blog/{blog}/toggle-status', [BlogController::class, 'toggleStatus'])->name('blog.toggle-status');
    Route::resource('blog', BlogController::class);
    
    // Inner Banner routes - specific routes must come before resource routes
    Route::get('inner-banner/data', [InnerBannerController::class, 'getData'])->name('inner-banner.data');
    Route::post('inner-banner/{innerBanner}/toggle-status', [InnerBannerController::class, 'toggleStatus'])->name('inner-banner.toggle-status');
    Route::resource('inner-banner', InnerBannerController::class);
    
    // News & Events routes - specific routes must come before resource routes
    Route::get('news-event/data', [NewsEventController::class, 'getData'])->name('news-event.data');
    Route::post('news-event/{newsEvent}/toggle-status', [NewsEventController::class, 'toggleStatus'])->name('news-event.toggle-status');
    Route::resource('news-event', NewsEventController::class);
    
    // Statistics routes - specific routes must come before resource routes
    Route::get('stat/data', [StatController::class, 'getData'])->name('stat.data');
    Route::post('stat/{stat}/toggle-status', [StatController::class, 'toggleStatus'])->name('stat.toggle-status');
    Route::resource('stat', StatController::class);
    
    // Infrastructure routes - specific routes must come before resource routes
    Route::get('infrastructure/data', [InfrastructureController::class, 'getData'])->name('infrastructure.data');
    Route::post('infrastructure/{infrastructure}/toggle-status', [InfrastructureController::class, 'toggleStatus'])->name('infrastructure.toggle-status');
    Route::resource('infrastructure', InfrastructureController::class);
    
    // Lab routes - specific routes must come before resource routes
    Route::get('lab/data', [LabController::class, 'getData'])->name('lab.data');
    Route::post('lab/{lab}/toggle-status', [LabController::class, 'toggleStatus'])->name('lab.toggle-status');
    Route::post('lab/{lab}/remove-slider-image', [LabController::class, 'removeSliderImage'])->name('lab.remove-slider-image');
    Route::resource('lab', LabController::class);
    
    // Home Page Text routes - specific routes must come before resource routes
    Route::get('home-page-text/data', [HomePageTextController::class, 'getData'])->name('home-page-text.data');
    Route::post('home-page-text/{homePageText}/toggle-status', [HomePageTextController::class, 'toggleStatus'])->name('home-page-text.toggle-status');
    Route::resource('home-page-text', HomePageTextController::class);
    
    // About Us routes
    Route::get('about-us', [AboutUsController::class, 'index'])->name('about-us.index');
    Route::post('about-us', [AboutUsController::class, 'store'])->name('about-us.store');
    Route::put('about-us', [AboutUsController::class, 'update'])->name('about-us.update');
    
    // Hostel routes
    Route::get('hostel', [HostelController::class, 'index'])->name('hostel.index');
    Route::post('hostel', [HostelController::class, 'store'])->name('hostel.store');
    Route::put('hostel', [HostelController::class, 'update'])->name('hostel.update');
    
    // Nutrition Management routes
    Route::get('nutrition-management', [NutritionManagementController::class, 'index'])->name('nutrition-management.index');
    Route::post('nutrition-management', [NutritionManagementController::class, 'store'])->name('nutrition-management.store');
    Route::put('nutrition-management', [NutritionManagementController::class, 'update'])->name('nutrition-management.update');
    
    // Health Nutrition routes
    Route::get('health-nutrition', [HealthNutritionController::class, 'index'])->name('health-nutrition.index');
    Route::post('health-nutrition', [HealthNutritionController::class, 'store'])->name('health-nutrition.store');
    Route::put('health-nutrition', [HealthNutritionController::class, 'update'])->name('health-nutrition.update');
    
    // Sports Complex routes
    Route::get('sports-complex', [SportsComplexController::class, 'index'])->name('sports-complex.index');
    Route::post('sports-complex', [SportsComplexController::class, 'store'])->name('sports-complex.store');
    Route::put('sports-complex', [SportsComplexController::class, 'update'])->name('sports-complex.update');
    
    // Reading Mission routes
    Route::get('reading-mission', [ReadingMissionController::class, 'index'])->name('reading-mission.index');
    Route::post('reading-mission', [ReadingMissionController::class, 'store'])->name('reading-mission.store');
    Route::put('reading-mission', [ReadingMissionController::class, 'update'])->name('reading-mission.update');
    
    // Co-curricular Activity routes
    Route::get('co-curricular-activity', [CoCurricularActivityController::class, 'index'])->name('co-curricular-activity.index');
    Route::post('co-curricular-activity', [CoCurricularActivityController::class, 'store'])->name('co-curricular-activity.store');
    Route::put('co-curricular-activity', [CoCurricularActivityController::class, 'update'])->name('co-curricular-activity.update');
    
    // Competitive Exam routes
    Route::get('competitive-exam', [CompetitiveExamController::class, 'index'])->name('competitive-exam.index');
    Route::post('competitive-exam', [CompetitiveExamController::class, 'store'])->name('competitive-exam.store');
    Route::put('competitive-exam', [CompetitiveExamController::class, 'update'])->name('competitive-exam.update');
    
    // House System routes
    Route::get('house-system', [HouseSystemController::class, 'index'])->name('house-system.index');
    Route::post('house-system', [HouseSystemController::class, 'store'])->name('house-system.store');
    Route::put('house-system', [HouseSystemController::class, 'update'])->name('house-system.update');
    
    // Page Banner routes
    Route::resource('page-banner', PageBannerController::class);
    
    // Team Member routes
    Route::resource('team-member', TeamMemberController::class);
    
    // Mandatory Disclosure routes
    Route::get('mandatory-disclosure', [MandatoryDisclosureController::class, 'index'])->name('mandatory-disclosure.index');
    Route::post('mandatory-disclosure', [MandatoryDisclosureController::class, 'store'])->name('mandatory-disclosure.store');
    
    // Infrastructure Section routes
    Route::resource('infrastructure-section', InfrastructureSectionController::class);
    
    // Program routes
    Route::resource('program', ProgramController::class);
    
    // Admission Enquiry routes
    Route::get('admission-enquiry', [App\Http\Controllers\Admin\AdmissionEnquiryController::class, 'index'])->name('admission-enquiry.index');
    Route::get('admission-enquiry/data', [App\Http\Controllers\Admin\AdmissionEnquiryController::class, 'getData'])->name('admission-enquiry.data');
    Route::get('admission-enquiry/{admissionEnquiry}', [App\Http\Controllers\Admin\AdmissionEnquiryController::class, 'show'])->name('admission-enquiry.show');
    
    // Contact Enquiry routes
    Route::get('contact-enquiry', [App\Http\Controllers\Admin\ContactEnquiryController::class, 'index'])->name('contact-enquiry.index');
    Route::get('contact-enquiry/data', [App\Http\Controllers\Admin\ContactEnquiryController::class, 'getData'])->name('contact-enquiry.data');
    Route::get('contact-enquiry/{contactEnquiry}', [App\Http\Controllers\Admin\ContactEnquiryController::class, 'show'])->name('contact-enquiry.show');
    
    // Gallery routes - specific routes must come before resource routes
    Route::get('gallery/data', [AdminGalleryController::class, 'getData'])->name('gallery.data');
    Route::post('gallery/{gallery}/toggle-status', [AdminGalleryController::class, 'toggleStatus'])->name('gallery.toggle-status');
    Route::delete('gallery/{id}/remove-image', [AdminGalleryController::class, 'removeImage'])->name('gallery.remove-image');
    Route::resource('gallery', AdminGalleryController::class);
    
    // Adventure & Celebrations routes
    Route::get('adventure-celebration/data', [App\Http\Controllers\Admin\AdventureCelebrationController::class, 'getData'])->name('adventure-celebration.data');
    Route::post('adventure-celebration/{adventureCelebration}/toggle-status', [App\Http\Controllers\Admin\AdventureCelebrationController::class, 'toggleStatus'])->name('adventure-celebration.toggle-status');
    Route::resource('adventure-celebration', App\Http\Controllers\Admin\AdventureCelebrationController::class);
});


require __DIR__.'/auth.php';

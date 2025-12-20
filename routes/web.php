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


Route::get('gallery', [HomeController::class, 'gallery'])->name('gallery');
Route::get('contact', [HomeController::class, 'contact'])->name('contact');








    
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('admin')->name('admin.')->group(function () {
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
});


require __DIR__.'/auth.php';

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\TeamMember;
use App\Models\NewsEvent;
use App\Models\AdmissionEnquiry;
use App\Models\ContactEnquiry;
use App\Models\Banner;
use App\Models\Blog;
use Carbon\Carbon;

class DashboardController extends Controller
{
    /**
     * Display the admin dashboard.
     */
    public function index()
    {
        $title = 'Dashboard';
        
        // Get total team members
        $totalTeam = TeamMember::count();
        
        // Get total news and events
        $totalNewsEvents = NewsEvent::count();
        
        // Get total admission enquiries
        $totalAdmissionEnquiries = AdmissionEnquiry::count();
        
        // Get total contact us enquiries
        $totalContactEnquiries = ContactEnquiry::count();
            
        return view('admin-v1.admin.dashboard.index', compact(
            'title',
            'totalTeam',
            'totalNewsEvents',
            'totalAdmissionEnquiries',
            'totalContactEnquiries'
        ));
    }
}

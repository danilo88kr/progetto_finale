<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;




class AnnouncementController extends Controller
{
    public function __construct(){
        $this->middleware('auth')->except( 'show');
    }  
    public function createAnnouncement() {
        return view('announcements.create');
    }

    public function showAnnouncement(Announcement $announcement)
    {
        return view('announcements.show', compact ('announcement'));
    }

    public function indexAnnouncement()
    {
        $announcements = Announcement::orderby('created_at','desc')->where('is_accepted', true)->paginate(10);
        return view('announcements.index', compact ('announcements'));
    }

}


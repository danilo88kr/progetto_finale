<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Announcement;
use Illuminate\Http\Request;


class PublicController extends Controller
{
    function welcome () {
        $announcements=Announcement::take(6)->where('is_accepted', true)->orderby('created_at','desc')->get();
        
    return view('welcome',compact('announcements'));

    
}

    public function categoryShow(Category $category)
    {
        return view('category.show',compact('category'));
    }

    public function searchAnnouncements(Request $request)
    {
       $announcements=Announcement::search($request->searched)->where('is_accepted', true)->paginate(10);
       return view('announcements.index', compact('announcements'));
    }

    public function setLanguage ($lang)
    {

      
        session()->put('locale', $lang);
        return redirect()->back();
    }
}

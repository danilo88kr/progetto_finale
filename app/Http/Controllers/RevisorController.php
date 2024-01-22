<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Announcement;
use Illuminate\Http\Request;
use App\Mail\BecomeRevisorEmail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Artisan;

class RevisorController extends Controller
{
    public function index(){
        $announcement_to_check=Announcement::where('is_accepted',null)->first();
        return view('revisor.index',compact('announcement_to_check'));
    }

    public function acceptAnnouncement(Announcement $announcement){
        $announcement->setAccepted(true);
        return redirect()->back()->with('message','Complimenti, hai accettato l\'annuncio');
    }

    
    public function rejectAnnouncement(Announcement $announcement){
        $announcement->setAccepted(false);
        return redirect()->back()->with('message','Hai rifiutato l\'annuncio');
    }


    public function workWhitUs() {
        return view('revisor.create');
    }

    public function becomeRevisor(Request $request) {

        Mail::to('admin@infinitycode.it')->send(new BecomeRevisorEmail(Auth::user(), $request->motivo));
        return redirect()->back()->with('message', 'La richiesta di diventare Revisore è andata a buon fine!');
    }

    public function makeRevisor(User $user){

        Artisan::call('app:make-user-revisor', ["email"=>$user->email]);
        return redirect('/')->with('message', 'Complimenti! L\'utente è diventato revisore');
    }



}

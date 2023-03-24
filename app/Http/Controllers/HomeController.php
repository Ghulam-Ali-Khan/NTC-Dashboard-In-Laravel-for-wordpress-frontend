<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tenders;
use App\Models\Policies;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

   
    public function index()
    {
        $tendersCount = Tenders::count();
        $policiesCount = Policies::count();
    // dd($tenders);
    
        return view('web.home', compact('tendersCount','policiesCount'));
    }
}

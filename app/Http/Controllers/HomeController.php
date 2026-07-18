<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Stat;
use App\Models\User;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * Show the public portfolio homepage.
     */
    public function index(): View
    {
        $owner = User::first();
        $stats = Stat::orderBy('sort_order')->orderBy('id')->get();
        $services = Service::orderBy('sort_order')->orderBy('id')->get();

        return view('frontend.home', compact('owner', 'stats', 'services'));
    }
}

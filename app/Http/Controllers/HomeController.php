<?php

namespace App\Http\Controllers;

use App\Models\AboutImage;
use App\Models\ContactInfo;
use App\Models\EducationEntry;
use App\Models\Service;
use App\Models\SocialLink;
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
        $educationEntries = EducationEntry::orderBy('sort_order')->orderBy('id')->get();
        $socialLinks = SocialLink::orderBy('sort_order')->orderBy('id')->get();
        $aboutImages = AboutImage::orderBy('sort_order')->orderBy('id')->get();
        $contactInfos = ContactInfo::orderBy('sort_order')->orderBy('id')->get();

        return view('frontend.home', compact(
            'owner', 'stats', 'services', 'educationEntries', 'socialLinks', 'aboutImages', 'contactInfos'
        ));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\AboutImage;
use App\Models\ContactInfo;
use App\Models\EducationEntry;
use App\Models\GalleryImage;
use App\Models\Project;
use App\Models\Service;
use App\Models\Skill;
use App\Models\SocialLink;
use App\Models\Stat;
use App\Models\User;
use Illuminate\Support\Str;
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
        $skills = Skill::orderBy('sort_order')->orderBy('id')->get();
        $educationEntries = EducationEntry::orderBy('sort_order')->orderBy('id')->get();
        $socialLinks = SocialLink::orderBy('sort_order')->orderBy('id')->get();
        $aboutImages = AboutImage::orderBy('sort_order')->orderBy('id')->get();
        $contactInfos = ContactInfo::orderBy('sort_order')->orderBy('id')->get();
        $galleryImages = GalleryImage::orderBy('sort_order')->orderBy('id')->get();

        $projects = Project::orderBy('sort_order')->orderBy('id')->get();
        // Portfolio filter buttons are derived from whatever tags projects actually have,
        // so the filter list never drifts out of sync with the cards themselves.
        $portfolioFilters = $projects
            ->flatMap(fn (Project $project) => $project->tagList())
            ->unique()
            ->mapWithKeys(fn (string $tag) => [Str::slug($tag) => $tag]);

        return view('frontend.home', compact(
            'owner', 'stats', 'services', 'skills', 'educationEntries', 'socialLinks',
            'aboutImages', 'contactInfos', 'projects', 'portfolioFilters', 'galleryImages'
        ));
    }
}

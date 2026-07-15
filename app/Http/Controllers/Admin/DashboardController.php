<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use App\Models\User;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * Show the dashboard overview.
     */
    public function index(): View
    {
        $stats = [
            'messages' => ContactMessage::count(),
            'messages_this_week' => ContactMessage::where('created_at', '>=', now()->subWeek())->count(),
            'users' => User::count(),
        ];

        $recentMessages = ContactMessage::latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recentMessages'));
    }
}

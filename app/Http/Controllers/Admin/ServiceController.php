<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class ServiceController extends Controller
{
    /**
     * Display a listing of the services.
     */
    public function index(): View
    {
        $services = Service::orderBy('sort_order')->orderBy('id')->get();

        return view('admin.services.index', compact('services'));
    }

    /**
     * Show the form for creating a new service.
     */
    public function create(): View
    {
        return view('admin.services.create');
    }

    /**
     * Store a newly created service.
     */
    public function store(Request $request): RedirectResponse
    {
        Service::create($this->validated($request));

        return redirect()->route('admin.services.index')->with('status', 'Service added.');
    }

    /**
     * Show the form for editing a service.
     */
    public function edit(Service $service): View
    {
        return view('admin.services.edit', compact('service'));
    }

    /**
     * Update the specified service.
     */
    public function update(Request $request, Service $service): RedirectResponse
    {
        $service->update($this->validated($request));

        return redirect()->route('admin.services.index')->with('status', 'Service updated.');
    }

    /**
     * Remove the specified service.
     */
    public function destroy(Service $service): RedirectResponse
    {
        $service->delete();

        return redirect()->route('admin.services.index')->with('status', 'Service removed.');
    }

    /**
     * Shared validation rules for store/update.
     *
     * @return array<string, mixed>
     */
    private function validated(Request $request): array
    {
        return $request->validate([
            'icon' => ['required', 'string', Rule::in(array_keys(Service::iconMap()))],
            'color' => ['required', 'string', Rule::in(Service::colorOptions())],
            'title' => ['required', 'string', 'max:100'],
            'description' => ['required', 'string', 'max:500'],
            'sort_order' => ['required', 'integer', 'min:0', 'max:999'],
        ]);
    }
}

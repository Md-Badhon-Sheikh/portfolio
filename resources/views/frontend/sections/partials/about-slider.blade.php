{{-- ============================================================
     About Slider (shared component)
     Reused for both the Education tab and Bio tab sliders in
     resources/views/frontend/sections/about.blade.php — same
     markup/classes so the JS slider logic in app.js works
     identically for either tab.

     Expects:
       $tabKey  (string)      — 'education' | 'bio', matches data-tab on the tab buttons
       $images  (Collection)  — AboutImage models for this tab
       $hidden  (bool)        — whether this slider starts hidden (inactive tab)
     ============================================================ --}}
<div class="about-slider-group {{ $hidden ? 'hidden' : '' }}" data-slider-tab="{{ $tabKey }}">
    <div class="relative h-80 sm:h-96 w-full rounded-xl overflow-hidden shadow-lg group">
        @foreach ($images as $i => $slide)
            <div class="about-slide absolute inset-0 transition-opacity duration-1000 ease-in-out {{ $i === 0 ? 'opacity-100' : 'opacity-0' }}">
                <img src="{{ $slide->imageUrl() }}" alt="{{ $slide->alt }}" class="w-full h-full object-cover">
            </div>
        @endforeach

        <div class="about-slider-dots absolute bottom-4 left-0 right-0 flex justify-center space-x-2 z-10">
            @foreach ($images as $i => $slide)
                <button type="button" class="about-slider-dot w-3 h-3 rounded-full transition-all duration-300 shadow-sm {{ $i === 0 ? 'bg-orange-500 scale-110' : 'bg-white/60 hover:bg-white' }}" data-slide="{{ $i }}" aria-label="Go to slide {{ $i + 1 }}"></button>
            @endforeach
        </div>
    </div>
</div>

{{-- ============================================================
     UI Design Gallery Section
     CSS-columns masonry grid, hover zoom, click opens lightbox (app.js)
     ============================================================ --}}
<section id="gallery" class="bg-orange-50/50 py-24">
    <div class="mx-auto max-w-7xl px-5 lg:px-8">

        <div class="reveal mx-auto max-w-2xl text-center">
            <span class="section-kicker">UI/UX Designs</span>
            <h2 class="section-title">My Amazing Works</h2>
        </div>

        <div class="mt-14 columns-2 gap-5 sm:columns-3 lg:columns-4">
            @php
                $gallery = [
                    ['title' => 'Shoe Store Landing', 'h' => 'h-56', 'from' => '#ff7a00', 'to' => '#ffb27a'],
                    ['title' => 'Finance Dashboard', 'h' => 'h-72', 'from' => '#1e2a5e', 'to' => '#3a4a8f'],
                    ['title' => 'Mobile App Screens', 'h' => 'h-64', 'from' => '#7ac9ff', 'to' => '#1e2a5e'],
                    ['title' => 'Business Landing Page', 'h' => 'h-48', 'from' => '#ffd27a', 'to' => '#ff7a00'],
                    ['title' => 'Analytics Widgets', 'h' => 'h-60', 'from' => '#ff9a5a', 'to' => '#1e2a5e'],
                    ['title' => 'Portfolio Homepage', 'h' => 'h-72', 'from' => '#7ac9ff', 'to' => '#ff7a00'],
                    ['title' => 'Food Delivery App', 'h' => 'h-52', 'from' => '#1e2a5e', 'to' => '#7ac9ff'],
                    ['title' => 'Architecture Studio Site', 'h' => 'h-64', 'from' => '#ffb27a', 'to' => '#1e2a5e'],
                ];
            @endphp
            @foreach ($gallery as $item)
                <button type="button"
                    class="gallery-item group relative mb-5 block w-full break-inside-avoid overflow-hidden rounded-2xl {{ $item['h'] }} shadow-[0_10px_30px_-12px_rgba(30,42,94,0.25)]"
                    data-title="{{ $item['title'] }}"
                    data-from="{{ $item['from'] }}"
                    data-to="{{ $item['to'] }}">
                    <span class="absolute inset-0 block transition duration-500 group-hover:scale-110" style="background: linear-gradient(135deg, {{ $item['from'] }}, {{ $item['to'] }});"></span>
                    <span class="absolute inset-0 flex items-end bg-gradient-to-t from-heading/70 via-transparent to-transparent p-4 opacity-0 transition duration-300 group-hover:opacity-100">
                        <span class="text-left text-sm font-semibold text-white">{{ $item['title'] }}</span>
                    </span>
                </button>
            @endforeach
        </div>
    </div>
</section>

{{-- Lightbox overlay (populated by app.js on gallery item click) --}}
<div id="lightbox" class="fixed inset-0 z-[100] hidden items-center justify-center bg-heading/90 p-6">
    <button type="button" id="lightbox-close" aria-label="Close preview" class="absolute right-6 top-6 flex h-10 w-10 items-center justify-center rounded-full bg-white/10 text-white transition hover:bg-white/20">
        <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
    </button>
    <div class="w-full max-w-2xl overflow-hidden rounded-2xl">
        <div id="lightbox-image" class="flex aspect-[4/3] w-full items-center justify-center"></div>
        <div class="bg-white p-5 text-center">
            <h4 id="lightbox-title" class="text-lg font-bold text-heading"></h4>
        </div>
    </div>
</div>

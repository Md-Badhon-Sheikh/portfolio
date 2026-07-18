{{-- ============================================================
     UI Design Gallery Section
     Flex-wrap masonry grid of real design shots, hover zoom,
     click opens lightbox (app.js)
     ============================================================ --}}
<section id="gallery" class="bg-white py-24">
    <div class="mx-auto max-w-7xl px-5 lg:px-8">

        <div class="reveal mx-auto max-w-2xl text-center">
            <span class="section-kicker">UI/UX Designs</span>
            <h2 class="section-title">My Amazing Works</h2>
        </div>

        @if ($galleryImages->isNotEmpty())
            <div class="mt-14 flex flex-wrap gap-4 after:content-[''] after:grow-[99999] after:min-w-[200px]">
                @foreach ($galleryImages as $item)
                    <button type="button"
                        class="gallery-item group relative flex-auto h-40 md:h-56 {{ $item->widthClass() }} overflow-hidden rounded-xl shadow-md hover:shadow-xl transition-shadow duration-300"
                        data-title="{{ $item->title }}"
                        data-src="{{ $item->imageUrl() }}">
                        <img src="{{ $item->imageUrl() }}" alt="{{ $item->title }}" loading="lazy"
                            class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-300">
                        <span class="absolute inset-0 bg-black/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300 pointer-events-none"></span>
                    </button>
                @endforeach
            </div>
        @else
            <p class="mt-14 text-center text-sm text-body">No gallery images added yet.</p>
        @endif
    </div>
</section>

{{-- Lightbox overlay (populated by app.js on gallery item click) --}}
<div id="lightbox" class="fixed inset-0 z-[100] hidden items-center justify-center bg-heading/90 p-6">
    <button type="button" id="lightbox-close" aria-label="Close preview" class="absolute right-6 top-6 flex h-10 w-10 items-center justify-center rounded-full bg-white/10 text-white transition hover:bg-white/20">
        <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
    </button>
    <div class="w-full max-w-2xl overflow-hidden rounded-2xl">
        <div id="lightbox-image" class="flex aspect-[4/3] w-full items-center justify-center bg-heading/50">
            <img id="lightbox-img" src="" alt="" class="h-full w-full object-cover">
        </div>
        <div class="bg-white p-5 text-center">
            <h4 id="lightbox-title" class="text-lg font-bold text-heading"></h4>
        </div>
    </div>
</div>

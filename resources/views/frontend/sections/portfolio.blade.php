{{-- ============================================================
     Portfolio Section
     Filter buttons + projects grid. Filtering is handled entirely
     by jQuery in app.js (data-category attribute matching), no reload.
     ============================================================ --}}
<section id="portfolio" class="bg-white py-24">
    <div class="mx-auto max-w-7xl px-5 lg:px-8">

        <div class="reveal mx-auto max-w-2xl text-center">
            <span class="section-kicker">Web Development</span>
            <h2 class="section-title">My Amazing Works</h2>
        </div>

        {{-- Filter buttons — derived from the tags on the projects below --}}
        <div class="reveal mt-10 flex flex-wrap items-center justify-center gap-3">
            <button type="button" class="portfolio-filter-btn rounded-full px-5 py-2 text-sm font-medium transition bg-primary text-white shadow-lg shadow-orange-500/25" data-filter="all">
                All
            </button>
            @foreach ($portfolioFilters as $slug => $label)
                <button type="button"
                    class="portfolio-filter-btn rounded-full px-5 py-2 text-sm font-medium transition bg-heading/5 text-heading hover:bg-primary/10 hover:text-primary"
                    data-filter="{{ $slug }}">
                    {{ $label }}
                </button>
            @endforeach
        </div>

        {{-- Projects grid --}}
        <div id="portfolio-grid" class="mt-12 grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
            @php
                // Fallback gradient rotation for projects without an uploaded thumbnail.
                $gradients = [['#ff7a00', '#1e2a5e'], ['#7ac9ff', '#1e2a5e'], ['#ffb27a', '#ff7a00'], ['#1e2a5e', '#7ac9ff'], ['#ffd27a', '#ff7a00'], ['#ff9a5a', '#1e2a5e']];
            @endphp
            @forelse ($projects as $i => $project)
                @php [$from, $to] = $gradients[$i % count($gradients)]; @endphp
                <div class="portfolio-item reveal group relative overflow-hidden rounded-2xl shadow-[0_10px_40px_-15px_rgba(30,42,94,0.2)]" data-category="{{ $project->filterSlugs() }}" style="transition-delay: {{ $i % 3 * 80 }}ms">
                    @if ($project->imageUrl())
                        <img src="{{ $project->imageUrl() }}" alt="{{ $project->title }}" class="aspect-[4/3] w-full object-cover">
                    @else
                        <div class="flex aspect-[4/3] items-center justify-center" style="background: linear-gradient(135deg, {{ $from }}, {{ $to }});">
                            <svg class="h-14 w-14 text-white/60" fill="none" stroke="currentColor" stroke-width="1.4" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 5h16v12H4V5zm4 12v3h8v-3M9 9h6M9 12h4"/></svg>
                        </div>
                    @endif

                    {{-- Hover overlay --}}
                    <div class="absolute inset-0 flex flex-col items-center justify-center gap-3 bg-heading/80 text-center opacity-0 transition duration-300 group-hover:opacity-100">
                        @if ($project->primaryCategory())
                            <span class="rounded-full bg-primary px-3 py-1 text-xs font-semibold text-white">{{ $project->primaryCategory() }}</span>
                        @endif
                        <h3 class="px-4 text-lg font-bold text-white">{{ $project->title }}</h3>
                        <a href="{{ $project->url ?: '#' }}" @if ($project->url) target="_blank" rel="noopener" @endif class="flex h-10 w-10 items-center justify-center rounded-full bg-white text-heading transition hover:bg-primary hover:text-white" aria-label="View project">
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                        </a>
                    </div>
                </div>
            @empty
                <p class="text-center text-sm text-body sm:col-span-2 lg:col-span-3">No projects added yet.</p>
            @endforelse
        </div>
    </div>
</section>

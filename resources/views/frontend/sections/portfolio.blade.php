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

        {{-- Filter buttons --}}
        <div class="reveal mt-10 flex flex-wrap items-center justify-center gap-3">
            @php
                $filters = ['all' => 'All', 'laravel' => 'Laravel', 'php' => 'PHP', 'javascript' => 'JavaScript', 'ui' => 'UI Design', 'dashboard' => 'Dashboard'];
            @endphp
            @foreach ($filters as $key => $label)
                <button type="button"
                    class="portfolio-filter-btn rounded-full px-5 py-2 text-sm font-medium transition {{ $key === 'all' ? 'bg-primary text-white shadow-lg shadow-orange-500/25' : 'bg-heading/5 text-heading hover:bg-primary/10 hover:text-primary' }}"
                    data-filter="{{ $key }}">
                    {{ $label }}
                </button>
            @endforeach
        </div>

        {{-- Projects grid --}}
        <div id="portfolio-grid" class="mt-12 grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
            @php
                $projects = [
                    ['title' => 'E-Commerce Platform', 'category' => 'Laravel', 'filter' => 'laravel dashboard', 'from' => '#ff7a00', 'to' => '#1e2a5e'],
                    ['title' => 'Portfolio Template', 'category' => 'UI Design', 'filter' => 'ui', 'from' => '#7ac9ff', 'to' => '#1e2a5e'],
                    ['title' => 'Task Manager App', 'category' => 'JavaScript', 'filter' => 'javascript dashboard', 'from' => '#ffb27a', 'to' => '#ff7a00'],
                    ['title' => 'Admin Dashboard', 'category' => 'PHP', 'filter' => 'php dashboard', 'from' => '#1e2a5e', 'to' => '#7ac9ff'],
                    ['title' => 'Restaurant Booking UI', 'category' => 'UI Design', 'filter' => 'ui', 'from' => '#ffd27a', 'to' => '#ff7a00'],
                    ['title' => 'Blog &amp; CMS', 'category' => 'Laravel', 'filter' => 'laravel php', 'from' => '#ff9a5a', 'to' => '#1e2a5e'],
                ];
            @endphp
            @foreach ($projects as $i => $project)
                <div class="portfolio-item reveal group relative overflow-hidden rounded-2xl shadow-[0_10px_40px_-15px_rgba(30,42,94,0.2)]" data-category="{{ $project['filter'] }}" style="transition-delay: {{ $i % 3 * 80 }}ms">
                    <div class="flex aspect-[4/3] items-center justify-center" style="background: linear-gradient(135deg, {{ $project['from'] }}, {{ $project['to'] }});">
                        <svg class="h-14 w-14 text-white/60" fill="none" stroke="currentColor" stroke-width="1.4" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 5h16v12H4V5zm4 12v3h8v-3M9 9h6M9 12h4"/></svg>
                    </div>

                    {{-- Hover overlay --}}
                    <div class="absolute inset-0 flex flex-col items-center justify-center gap-3 bg-heading/80 text-center opacity-0 transition duration-300 group-hover:opacity-100">
                        <span class="rounded-full bg-primary px-3 py-1 text-xs font-semibold text-white">{{ $project['category'] }}</span>
                        <h3 class="px-4 text-lg font-bold text-white">{!! $project['title'] !!}</h3>
                        <a href="#" class="flex h-10 w-10 items-center justify-center rounded-full bg-white text-heading transition hover:bg-primary hover:text-white" aria-label="View project">
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

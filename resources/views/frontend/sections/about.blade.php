{{-- ============================================================
     About Section
     Tabs: Education / Bio / Contact (left) — Image slider (right)
     Tab switching + slider are handled by jQuery in app.js
     ============================================================ --}}
<section id="about" class="bg-slate-50 py-16 sm:py-24">
    <style>
        @keyframes aboutFadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        #about .animate-fade-in {
            animation: aboutFadeIn 0.5s ease-out forwards;
        }
    </style>
    <div class="container mx-auto px-4 max-w-6xl">

        <div class="reveal text-center mb-12">
            <h2 class="text-4xl sm:text-5xl font-bold text-[#14295F]">About Me</h2>
        </div>

        <div class="flex flex-col items-center">
            {{-- Tab buttons --}}
            <div class="border-b border-slate-200 mb-10 w-full max-w-4xl">
                <nav class="-mb-px flex justify-center space-x-8" aria-label="Tabs">
                    <button type="button" class="about-tab-btn whitespace-nowrap py-4 px-1 border-b-2 font-medium text-lg transition-colors duration-200 border-orange-500 text-orange-500" data-tab="education">
                        Education
                    </button>
                    <button type="button" class="about-tab-btn whitespace-nowrap py-4 px-1 border-b-2 font-medium text-lg transition-colors duration-200 border-transparent text-slate-500 hover:text-slate-700 hover:border-slate-300" data-tab="bio">
                        Bio
                    </button>
                    <button type="button" class="about-tab-btn whitespace-nowrap py-4 px-1 border-b-2 font-medium text-lg transition-colors duration-200 border-transparent text-slate-500 hover:text-slate-700 hover:border-slate-300" data-tab="contact">
                        Contact
                    </button>
                </nav>
            </div>

            {{-- Card --}}
            <div class="bg-white p-8 sm:p-12 rounded-xl shadow-lg w-full min-h-[500px]">
                <div id="about-tab-content" class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-start animate-fade-in">

                    {{-- Left: tab panels --}}
                    <div class="about-left-col {{ $aboutImages->isEmpty() ? 'lg:col-span-2' : '' }}">
                        {{-- Education panel --}}
                        <div class="about-tab-panel space-y-10" data-panel="education">
                            @forelse ($educationEntries as $entry)
                                <div class="flex gap-5">
                                    @if ($entry->imageUrl())
                                        <img src="{{ $entry->imageUrl() }}" alt="{{ $entry->title }}" class="h-16 w-16 shrink-0 rounded-lg object-cover">
                                    @endif
                                    <div>
                                        <h3 class="text-2xl font-bold text-slate-900 mb-4">{{ $entry->title }}:</h3>
                                        <ul class="space-y-2 text-slate-600 list-disc list-inside">
                                            @foreach ($entry->lines() as $line)
                                                <li>
                                                    @if ($line['label'])
                                                        <span class="font-semibold text-slate-700">{{ $line['label'] }}: </span>
                                                    @endif
                                                    {{ $line['value'] }}
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            @empty
                                <p class="text-slate-500">No education entries added yet.</p>
                            @endforelse
                        </div>

                        {{-- Bio panel --}}
                        @php
                            $bioHtml = $owner?->about_bio ?: "<p>I'm a full stack web developer focused on building fast, accessible, and maintainable web applications. I enjoy working across the stack — from crafting pixel-perfect, responsive interfaces to designing clean back-end architecture with Laravel and PHP.</p><p>I care about writing readable code, solving real problems, and constantly learning new tools and best practices to deliver better products for the people who use them.</p>";
                            $bioHighlights = $owner?->highlights() ?: ['Clean Code', 'Responsive Design', 'On-time Delivery', 'Clear Communication'];
                        @endphp
                        <div class="about-tab-panel hidden space-y-4 text-slate-600 leading-relaxed" data-panel="bio">
                            {{-- Rendered as HTML from the admin's CKEditor field — trusted single-admin content, same as other admin-authored sections on this site. --}}
                            <div class="prose prose-slate max-w-none prose-p:leading-relaxed prose-a:text-orange-500">
                                {!! $bioHtml !!}
                            </div>
                            <ul class="grid grid-cols-2 gap-3 pt-2 text-slate-700">
                                @foreach ($bioHighlights as $highlight)
                                    <li class="flex items-center gap-2"><span class="h-1.5 w-1.5 rounded-full bg-orange-500"></span> {{ $highlight }}</li>
                                @endforeach
                            </ul>
                        </div>

                        {{-- Contact panel --}}
                        <div class="about-tab-panel hidden" data-panel="contact">
                            <div class="grid grid-cols-1 sm:grid-cols-3 gap-5">
                                @forelse ($contactInfos as $info)
                                    <div class="rounded-xl bg-slate-50 p-6 text-center">
                                        <div class="mx-auto mb-4 flex h-12 w-12 items-center justify-center rounded-full bg-orange-100 text-orange-500">
                                            <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">{!! $info->svgPaths() !!}</svg>
                                        </div>
                                        <h4 class="font-bold text-slate-900">{{ $info->title }}</h4>
                                        @if ($info->href())
                                            <a href="{{ $info->href() }}" class="mt-1 block text-sm text-slate-600 hover:text-orange-500">{{ $info->details }}</a>
                                        @else
                                            <span class="mt-1 block text-sm text-slate-600">{{ $info->details }}</span>
                                        @endif
                                    </div>
                                @empty
                                    <p class="sm:col-span-3 text-center text-sm text-slate-500">No contact info added yet.</p>
                                @endforelse
                            </div>

                            <div class="mt-10 text-center">
                                <h4 class="text-xl font-bold text-slate-900">Connect on Social Media</h4>
                                <div class="mt-4 flex justify-center gap-3">
                                    @forelse ($socialLinks as $link)
                                        <a href="{{ $link->url }}" target="_blank" rel="noopener" aria-label="{{ $link->label() }}" class="flex h-11 w-11 items-center justify-center rounded-xl {{ $link->bgClass() }} text-white transition hover:opacity-90">
                                            <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">{!! $link->svgPaths() !!}</svg>
                                        </a>
                                    @empty
                                        <p class="text-sm text-slate-500">No social links added yet.</p>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Right: image slider (Bio slider images, managed under /about-images) --}}
                    @if ($aboutImages->isNotEmpty())
                        <div class="about-slider-col lg:sticky lg:top-12">
                            <div class="relative h-80 sm:h-96 w-full rounded-xl overflow-hidden shadow-lg group">
                                @foreach ($aboutImages as $i => $slide)
                                    <div class="about-slide absolute inset-0 transition-opacity duration-1000 ease-in-out {{ $i === 0 ? 'opacity-100' : 'opacity-0' }}">
                                        <img src="{{ $slide->imageUrl() }}" alt="{{ $slide->alt }}" class="w-full h-full object-cover">
                                    </div>
                                @endforeach

                                <div id="about-slider-dots" class="absolute bottom-4 left-0 right-0 flex justify-center space-x-2 z-10">
                                    @foreach ($aboutImages as $i => $slide)
                                        <button type="button" class="about-slider-dot w-3 h-3 rounded-full transition-all duration-300 shadow-sm {{ $i === 0 ? 'bg-orange-500 scale-110' : 'bg-white/60 hover:bg-white' }}" data-slide="{{ $i }}" aria-label="Go to slide {{ $i + 1 }}"></button>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

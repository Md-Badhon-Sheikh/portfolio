{{-- ============================================================
     Services Section
     Section title + auto-scrolling marquee of service cards
     ============================================================ --}}
<section id="services" class="py-16 sm:py-24 overflow-hidden bg-white text-slate-900">
    <style>
        @keyframes serviceScroll {
            0% { transform: translateX(0); }
            100% { transform: translateX(-50%); }
        }

        .scroll-track {
            animation: serviceScroll 22s linear infinite;
            will-change: transform;
        }

        .group:hover .scroll-track {
            animation-play-state: paused;
        }
    </style>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 items-center">
            <div class="space-y-6 pr-0 lg:pr-12">
                <p class="text-amber-500 font-semibold text-xl">Services</p>
                <h2 class="text-4xl sm:text-4xl font-bold text-[#14295F] leading-tight">I provide a wide range of digital services</h2>
            </div>

            <div class="lg:col-span-2 overflow-hidden relative group">
                <div class="absolute left-0 top-0 bottom-0 w-6 z-10 bg-linear-to-r from-white to-transparent pointer-events-none"></div>
                <div class="absolute right-0 top-0 bottom-0 w-6 z-10 bg-linear-to-l from-white to-transparent pointer-events-none"></div>

                @php
                    $services = [
                        [
                            'title' => 'UI/UX Design',
                            'desc' => 'Creating intuitive and visually appealing interfaces to enhance user experience and engagement.',
                            'color' => 'text-orange-600',
                            'svg' => '<path d="M5 5.5A3.5 3.5 0 0 1 8.5 2H12v7H8.5A3.5 3.5 0 0 1 5 5.5z"/><path d="M12 2h3.5a3.5 3.5 0 1 1 0 7H12V2z"/><path d="M12 12.5a3.5 3.5 0 1 1 7 0 3.5 3.5 0 1 1-7 0z"/><path d="M5 19.5A3.5 3.5 0 0 1 8.5 16H12v3.5a3.5 3.5 0 1 1-7 0z"/><path d="M5 12.5A3.5 3.5 0 0 1 8.5 9H12v7H8.5A3.5 3.5 0 0 1 5 12.5z"/>',
                        ],
                        [
                            'title' => 'Web Development',
                            'desc' => 'Building responsive, fast, and modern websites tailored to your specific business needs and goals.',
                            'color' => 'text-green-500',
                            'svg' => '<path d="M12 12h.01"/><path d="M16 12h.01"/><path d="m17 7 5 5-5 5"/><path d="m7 7-5 5 5 5"/><path d="M8 12h.01"/>',
                        ],
                        [
                            'title' => 'Laravel Development',
                            'desc' => 'Developing scalable, secure, and maintainable web applications using the Laravel framework.',
                            'color' => 'text-purple-500',
                            'svg' => '<rect width="20" height="8" x="2" y="2" rx="2" ry="2"/><rect width="20" height="8" x="2" y="14" rx="2" ry="2"/><line x1="6" x2="6.01" y1="6" y2="6"/><line x1="6" x2="6.01" y1="18" y2="18"/>',
                        ],
                        [
                            'title' => 'API Development',
                            'desc' => 'Designing and building robust RESTful APIs that connect your applications and services seamlessly.',
                            'color' => 'text-orange-600',
                            'svg' => '<path d="M12 22v-5"/><path d="M9 8V2"/><path d="M15 8V2"/><path d="M18 8v5a4 4 0 0 1-4 4h-4a4 4 0 0 1-4-4V8Z"/>',
                        ],
                        [
                            'title' => 'Database Design',
                            'desc' => 'Structuring efficient, normalized databases that keep your application fast and reliable at scale.',
                            'color' => 'text-green-500',
                            'svg' => '<ellipse cx="12" cy="5" rx="9" ry="3"/><path d="M3 5V19A9 3 0 0 0 21 19V5"/><path d="M3 12A9 3 0 0 0 21 12"/>',
                        ],
                        [
                            'title' => 'Responsive Design',
                            'desc' => 'Ensuring your website looks and performs beautifully across desktop, tablet, and mobile devices.',
                            'color' => 'text-purple-500',
                            'svg' => '<rect width="14" height="20" x="5" y="2" rx="2" ry="2"/><path d="M12 18h.01"/>',
                        ],
                    ];
                @endphp

                <div class="flex scroll-track w-max">
                    @for ($pass = 0; $pass < 2; $pass++)
                        <div class="flex space-x-8 shrink-0{{ $pass ? ' ml-8' : '' }}" @if ($pass) aria-hidden="true" @endif>
                            @foreach ($services as $service)
                                <div class="w-[320px] shrink-0">
                                    <div class="bg-[#F57C29] p-8 rounded-lg shadow-sm hover:shadow-lg transition-shadow duration-300 flex flex-col items-start h-full border border-slate-100">
                                        <div class="w-16 h-16 mb-6 rounded-full flex items-center justify-center bg-white">
                                            <span class="text-3xl {{ $service['color'] }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                                    {!! $service['svg'] !!}
                                                </svg>
                                            </span>
                                        </div>
                                        <h3 class="text-2xl font-extrabold mb-3 text-white">{{ $service['title'] }}</h3>
                                        <p class="text-base text-white leading-relaxed">{{ $service['desc'] }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endfor
                </div>
            </div>
        </div>
    </div>
</section>

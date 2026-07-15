{{-- ============================================================
     Hero Section
     Two column: intro/name/CTA (left) — photo with circle shapes (right)
     Followed by a floating stats card (years / projects / support)
     ============================================================ --}}
<section id="home" class="relative overflow-hidden bg-gradient-to-b from-orange-50/60 to-page pt-36 pb-0 lg:pt-44">

    <div class="mx-auto max-w-7xl px-5 lg:px-8">
        <div class="grid grid-cols-1 items-center gap-12 lg:grid-cols-2">

            {{-- Left: intro text --}}
            <div class="reveal reveal-left text-center lg:text-left">
                <p class="mb-3 inline-flex items-center gap-2 text-sm font-semibold text-primary">
                    <span class="h-px w-8 bg-primary"></span> Hi, I'm
                </p>
                <h1 class="text-4xl font-bold leading-tight text-heading sm:text-5xl lg:text-6xl">
                    Mohammad Badhon
                </h1>
                <p class="mt-3 text-xl font-semibold text-heading/80 sm:text-2xl">
                    Web Developer &amp; Designer
                </p>
                <p class="mx-auto mt-4 max-w-md text-base leading-relaxed text-body lg:mx-0">
                    Laravel, PHP, and front-end specialist with strong UI/UX instincts —
                    creating fast, functional, and visually compelling digital experiences.
                </p>

                <div class="mt-8 flex flex-wrap items-center justify-center gap-4 lg:justify-start">
                    <a href="#" class="btn-primary">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v12m0 0l-4-4m4 4l4-4M4 20h16"/></svg>
                        Download CV
                    </a>
                    <a href="#contact" class="btn-outline">Contact</a>
                </div>
            </div>

            {{-- Right: photo with circle shapes --}}
            <div class="reveal reveal-right relative mx-auto flex h-72 w-72 items-center justify-center sm:h-96 sm:w-96 lg:mx-0 lg:ml-auto">
                <span class="absolute inset-0 translate-x-6 translate-y-6 rounded-full bg-orange-100"></span>
                <span class="absolute inset-4 rounded-full bg-orange-200/70"></span>
                <div class="relative flex h-full w-full items-center justify-center overflow-hidden rounded-full bg-heading/90 shadow-2xl">
                    <svg viewBox="0 0 200 200" class="h-[85%] w-[85%]" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="100" cy="78" r="38" fill="#fff" fill-opacity="0.12"/>
                        <path d="M28 192c0-46 32-77 72-77s72 31 72 77" fill="#fff" fill-opacity="0.12"/>
                        <circle cx="100" cy="78" r="38" fill="#ff7a00" fill-opacity="0.85"/>
                        <path d="M28 192c0-46 32-77 72-77s72 31 72 77" fill="#ff7a00" fill-opacity="0.55"/>
                    </svg>
                </div>
            </div>
        </div>
    </div>

    {{-- Floating stats card — pill-shaped, overlapping the hero bottom edge --}}
    <div class="relative z-10 mx-auto -mt-12 mb-20 max-w-7xl px-5 md:-mt-20 lg:px-8">
        <div class="reveal grid grid-cols-3 gap-2 rounded-2xl border border-slate-100 bg-white px-2 py-6 shadow-[0_20px_50px_rgba(0,0,0,0.1)] md:gap-10 md:rounded-full md:px-12">
            @php
                $stats = [
                    [
                        'svg' => '<path d="m15.477 12.89 1.515 8.526a.5.5 0 0 1-.81.47l-3.58-2.687a1 1 0 0 0-1.197 0l-3.586 2.686a.5.5 0 0 1-.81-.469l1.514-8.526"/><circle cx="12" cy="8" r="6"/>',
                        'value' => 2, 'suffix' => ' Years', 'label' => 'Experience',
                    ],
                    [
                        'svg' => '<path d="M6 22a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h8a2.4 2.4 0 0 1 1.704.706l3.588 3.588A2.4 2.4 0 0 1 20 8v12a2 2 0 0 1-2 2z"/><path d="M14 2v5a1 1 0 0 0 1 1h5"/><path d="M10 9H8"/><path d="M16 13H8"/><path d="M16 17H8"/>',
                        'value' => 55, 'suffix' => '+', 'label' => 'Projects',
                    ],
                    [
                        'svg' => '<path d="M3 14h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-7a9 9 0 0 1 18 0v7a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2v-3a2 2 0 0 1 2-2h3"/>',
                        'value' => 24, 'suffix' => '/7', 'label' => 'Support',
                    ],
                ];
            @endphp
            @foreach ($stats as $stat)
                <div class="flex flex-col items-center justify-center gap-2 text-center md:flex-row md:justify-start md:gap-4 md:text-left">
                    <div class="rounded-full bg-[#F57C20] p-2 text-white shadow-md md:p-4">
                        <svg class="h-5 w-5 md:h-8 md:w-8" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">{!! $stat['svg'] !!}</svg>
                    </div>
                    <div>
                        <h4 class="text-sm font-bold text-[#14295F] md:text-2xl">
                            <span class="counter" data-count="{{ $stat['value'] }}">0</span>{{ $stat['suffix'] }}
                        </h4>
                        <p class="text-xs font-medium text-orange-400 md:text-base">{{ $stat['label'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

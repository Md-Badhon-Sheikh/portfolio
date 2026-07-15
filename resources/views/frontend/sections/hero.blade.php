{{-- ============================================================
     Hero Section
     Two column: intro/name/CTA (left) — photo with circle shapes (right)
     Followed by a floating stats card (years / projects / support)
     ============================================================ --}}
<section id="home" class="relative overflow-hidden bg-gradient-to-b from-orange-50/60 to-page pt-36 pb-28 lg:pt-44">

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

    {{-- Floating stats card --}}
    <div class="reveal mx-auto mt-16 max-w-4xl px-5 lg:px-8">
        <div class="card-surface grid grid-cols-1 divide-y divide-heading/10 sm:grid-cols-3 sm:divide-x sm:divide-y-0">
            @php
                $stats = [
                    ['icon' => 'M12 2l2.5 6.5L21 9l-5 4.5L17.5 21 12 17l-5.5 4L8 13.5 3 9l6.5-.5L12 2z', 'value' => 2, 'suffix' => '+', 'label' => 'Years Experience'],
                    ['icon' => 'M4 6h16M4 12h16M4 18h10', 'value' => 55, 'suffix' => '+', 'label' => 'Projects Done'],
                    ['icon' => 'M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z', 'value' => 24, 'suffix' => '/7', 'label' => 'Support'],
                ];
            @endphp
            @foreach ($stats as $stat)
                <div class="flex items-center justify-center gap-4 px-6 py-6">
                    <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-full bg-primary/10 text-primary">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="{{ $stat['icon'] }}"/></svg>
                    </div>
                    <div>
                        <div class="text-2xl font-bold text-heading">
                            <span class="counter" data-count="{{ $stat['value'] }}">0</span>{{ $stat['suffix'] }}
                        </div>
                        <div class="text-sm text-body">{{ $stat['label'] }}</div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

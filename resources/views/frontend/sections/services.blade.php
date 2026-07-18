{{-- ============================================================
     Services Section
     Section title + auto-scrolling marquee of service cards
     ============================================================ --}}
<section id="services" class="py-16 sm:py-24 -mt-12 overflow-hidden bg-white text-slate-900">
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


      {{-- Floating stats card — pill-shaped, overlapping the hero bottom edge --}}
    <div class="relative z-10 mx-auto  max-w-7xl px-5 md:-mt-20 lg:px-8 mb-20">
        <div class="reveal grid grid-cols-3 gap-2 rounded-2xl border border-slate-100 bg-white px-2 py-6 shadow-[0_20px_50px_rgba(0,0,0,0.1)] md:gap-10 md:rounded-full md:px-12" style="margin-top: -96px;">
            @forelse ($stats as $stat)
                <div class="flex flex-col items-center justify-center gap-2 text-center md:flex-row md:justify-start md:gap-4 md:text-left">
                    <div class="rounded-full bg-[#F57C20] p-2 text-white shadow-md md:p-4">
                        <svg class="h-5 w-5 md:h-8 md:w-8" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">{!! $stat->svgPaths() !!}</svg>
                    </div>
                    <div>
                        <h4 class="text-sm font-bold text-[#14295F] md:text-2xl">
                            <span class="counter" data-count="{{ $stat->value }}">0</span>{{ $stat->suffix }}
                        </h4>
                        <p class="text-xs font-medium text-orange-400 md:text-base">{{ $stat->label }}</p>
                    </div>
                </div>
            @empty
                <p class="col-span-3 py-2 text-center text-sm text-body">No stats added yet.</p>
            @endforelse
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 items-center">
            <div class="space-y-6 pr-0 lg:pr-12">
                <p class="text-amber-500 font-semibold text-xl">Services</p>
                <h2 class="text-4xl sm:text-4xl font-bold text-[#14295F] leading-tight">I provide a wide range of digital services</h2>
            </div>

            <div class="lg:col-span-2 overflow-hidden relative group">
                <div class="absolute left-0 top-0 bottom-0 w-6 z-10 bg-linear-to-r from-white to-transparent pointer-events-none"></div>
                <div class="absolute right-0 top-0 bottom-0 w-6 z-10 bg-linear-to-l from-white to-transparent pointer-events-none"></div>

                <div class="flex scroll-track w-max">
                    @if ($services->isEmpty())
                        <p class="px-2 text-sm text-body">No services added yet.</p>
                    @else
                        {{-- Two passes of the same list, back to back, for a seamless marquee loop --}}
                        @for ($pass = 0; $pass < 2; $pass++)
                            <div class="flex space-x-8 shrink-0{{ $pass ? ' ml-8' : '' }}" @if ($pass) aria-hidden="true" @endif>
                                @foreach ($services as $service)
                                    <div class="w-[320px] shrink-0">
                                        <div class="bg-[#F57C29] p-8 rounded-lg shadow-sm hover:shadow-lg transition-shadow duration-300 flex flex-col items-start h-full border border-slate-100">
                                            <div class="w-16 h-16 mb-6 rounded-full flex items-center justify-center bg-white">
                                                <span class="text-3xl {{ $service->color }}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                                        {!! $service->svgPaths() !!}
                                                    </svg>
                                                </span>
                                            </div>
                                            <h3 class="text-2xl font-extrabold mb-3 text-white">{{ $service->title }}</h3>
                                            <p class="text-base text-white leading-relaxed">{{ $service->description }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endfor
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

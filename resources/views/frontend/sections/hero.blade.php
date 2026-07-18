{{-- ============================================================
     Hero Section
     Two column: intro/name/CTA (left) — photo with circle shapes (right)
     Followed by a floating stats card (years / projects / support)
     Content is dynamic: $owner (User) and $stats (Stat collection),
     both supplied by HomeController — editable from /profile and /stats.
     ============================================================ --}}
@php
    $heroName = $owner->name ?? 'Mohammad Badhon';
    $heroDesignation = $owner->designation ?? 'Web Developer and Designer';
    $heroBio = $owner->bio ?? 'React, Django, and WordPress specialist with strong UI/UX design skills—creating fast, functional, and visually compelling digital experiences.';
    $heroCv = $owner?->cvUrl() ?? asset('mycv.pdf');
    $heroContact = $owner->contact_link ?? '#contact';
    $heroPhoto = $owner?->avatarUrl() ?? asset('images/hero/profile.webp');
    $isExternalContact = str_starts_with($heroContact, 'http') || str_starts_with($heroContact, 'mailto:');
@endphp
<section id="home" class="relative overflow-hidden bg-[#FDF8F7] pt-12 pb-0 lg:pt-16">

    <div class="mx-auto max-w-7xl px-5 lg:px-8">
        <div class="grid grid-cols-1 items-center gap-12 lg:grid-cols-2">

            {{-- Left: intro text --}}
            <div class="reveal reveal-left space-y-6 text-center lg:text-left">
                <h3 class="text-orange-500 text-xl font-bold">Hi I'm</h3>
                <h1 class="text-[#14295F] text-5xl md:text-7xl font-extrabold leading-tight">{{ $heroName }}</h1>
                <h2 class="text-[#14295F] text-2xl md:text-3xl font-bold">{{ $heroDesignation }}</h2>
                <p class="text-[#14295F] text-lg max-w-lg mx-auto lg:mx-0 leading-relaxed">
                    {{ $heroBio }}
                </p>

                <div class="flex flex-wrap gap-6 justify-center lg:justify-start pt-4">
                    <a href="{{ $heroCv }}" target="_blank" rel="noopener noreferrer" class="bg-[#F57C20] text-white px-8 py-3 shadow-2xl rounded-lg font-medium hover:bg-orange-600 transition active:scale-95 cursor-pointer">
                        Download CV
                    </a>
                    <a href="{{ $heroContact }}" @if ($isExternalContact) target="_blank" rel="noopener noreferrer" @endif class="border-2 border-[#F57C20] text-[#14295F] shadow-2xl px-8 py-3 rounded-lg font-medium hover:bg-orange-50 transition active:scale-95 cursor-pointer">
                        Contact
                    </a>
                </div>
            </div>

            {{-- Right: photo --}}
            <div class="reveal reveal-right relative flex justify-center items-end h-auto">
                <img src="{{ $heroPhoto }}" alt="{{ $heroName }}" class="relative z-10 h-full max-h-[520px] object-cover">
            </div>
        </div>
    </div>

    {{-- Floating stats card — pill-shaped, overlapping the hero bottom edge --}}
    <div class="relative z-10 mx-auto -mt-12 mb-20 max-w-7xl px-5 md:-mt-20 lg:px-8">
        <div class="reveal grid grid-cols-3 gap-2 rounded-2xl border border-slate-100 bg-white px-2 py-6 shadow-[0_20px_50px_rgba(0,0,0,0.1)] md:gap-10 md:rounded-full md:px-12" style="margin-top: 150px;">
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
</section>

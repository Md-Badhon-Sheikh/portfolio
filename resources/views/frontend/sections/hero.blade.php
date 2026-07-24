{{-- ============================================================
     Hero Section
     Two column: intro/name/CTA (left) — photo with circle shapes (right)
     Followed by a floating stats card (years / projects / support)
     Content is dynamic: $owner (User) and $stats (Stat collection),
     both supplied by HomeController — editable from /profile and /stats.
     ============================================================ --}}
@php
    $heroName = $owner->name ?? 'Badhon Sheikh';
    $heroDesignation = $owner->designation ?? 'Full Stack Web Developer';
    $heroBio = $owner->bio ?? 'React, Django, and WordPress specialist with strong UI/UX design skills—creating fast, functional, and visually compelling digital experiences.';
    $heroCv = $owner?->cvUrl() ?? asset('mycv.pdf');
    $heroContact = $owner->contact_link ?? '#contact';
    $heroPhoto = $owner?->avatarUrl() ?? asset('images/hero/profile.webp');
    $isExternalContact = str_starts_with($heroContact, 'http') || str_starts_with($heroContact, 'mailto:');
@endphp
<section id="home" class="relative pb-12 bg-[#FDF8F7] pt-12 pb-0 lg:pt-16">

    <div class="mx-auto max-w-7xl px-5 lg:px-8">
        <div class="grid grid-cols-1 items-center gap-12 lg:grid-cols-2">

            {{-- Left: intro text (shows after the photo on mobile, left of it on desktop) --}}
            <div class="reveal reveal-left order-2 lg:order-1 space-y-6 text-center lg:text-left">
                <h3 class="text-orange-500 text-xl font-bold">Hi I'm</h3>
                <h1 class="text-[#14295F] text-5xl md:text-7xl font-extrabold leading-tight">{{ $heroName }}</h1>
                <h2 class="text-[#14295F] text-2xl md:text-3xl font-bold">{{ $heroDesignation }}</h2>
                <p class="text-[#14295F] text-lg max-w-lg mx-auto lg:mx-0 leading-relaxed">
                    {{ $heroBio }}
                </p>

                <div class="flex flex-wrap gap-6 justify-center lg:justify-start pt-4 mb-20">
                    <a href="{{ $heroCv }}" target="_blank" rel="noopener noreferrer" class="bg-[#F57C20] text-white px-8 py-3 shadow-2xl rounded-lg font-medium hover:bg-orange-600 transition active:scale-95 cursor-pointer">
                        Download CV
                    </a>
                    <a href="{{ $heroContact }}" @if ($isExternalContact) target="_blank" rel="noopener noreferrer" @endif class="border-2 border-[#F57C20] text-[#14295F] shadow-2xl px-8 py-3 rounded-lg font-medium hover:bg-orange-50 transition active:scale-95 cursor-pointer">
                        Contact
                    </a>
                </div>
            </div>

            {{-- Right: photo (shows first on mobile, right of the text on desktop) --}}
            <div class="reveal reveal-right order-1 lg:order-2 relative flex justify-center items-end h-auto">
                <img src="{{ $heroPhoto }}" alt="{{ $heroName }}" class="relative z-10 h-full max-h-[520px] object-cover">
            </div>
        </div>
    </div>

  
</section>

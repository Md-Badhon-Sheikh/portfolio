{{-- ============================================================
     Services Section
     Section title + grid of service cards with hover animation
     ============================================================ --}}
<section id="services" class="bg-page py-24">
    <div class="mx-auto max-w-7xl px-5 lg:px-8">

        <div class="reveal mx-auto max-w-2xl text-center">
            <span class="section-kicker">Services</span>
            <h2 class="section-title">I Provide a Wide Range of Digital Services</h2>
        </div>

        <div class="mt-14 grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
            @php
                $services = [
                    ['icon' => 'M9.75 17L4.5 12l5.25-5M14.25 7l5.25 5-5.25 5', 'title' => 'UI/UX Design', 'desc' => 'Creating intuitive and visually appealing interfaces that enhance user experience and engagement.'],
                    ['icon' => 'M3 3h18v14H3V3zm0 18h18M9 21V17', 'title' => 'Web Development', 'desc' => 'Building responsive, fast, and modern websites tailored to your specific business needs and goals.'],
                    ['icon' => 'M12 3v3m0 12v3m9-9h-3M6 12H3m14.5-6.5l-2 2m-9 9l-2 2m0-13l2 2m9 9l2 2', 'title' => 'Laravel Development', 'desc' => 'Developing scalable, secure, and maintainable web applications using the Laravel framework.'],
                    ['icon' => 'M12 4.5C7 4.5 2.7 7.6 1 12c1.7 4.4 6 7.5 11 7.5s9.3-3.1 11-7.5C21.3 7.6 17 4.5 12 4.5z', 'title' => 'API Development', 'desc' => 'Designing and building robust RESTful APIs that connect your applications and services seamlessly.'],
                    ['icon' => 'M4 7c0-1.66 3.58-3 8-3s8 1.34 8 3-3.58 3-8 3-8-1.34-8-3zm0 0v10c0 1.66 3.58 3 8 3s8-1.34 8-3V7M4 12c0 1.66 3.58 3 8 3s8-1.34 8-3', 'title' => 'Database Design', 'desc' => 'Structuring efficient, normalized databases that keep your application fast and reliable at scale.'],
                    ['icon' => 'M4 6h16M4 12h16M4 18h16', 'title' => 'Responsive Design', 'desc' => 'Ensuring your website looks and performs beautifully across desktop, tablet, and mobile devices.'],
                ];
            @endphp

            @foreach ($services as $i => $service)
                <div class="reveal group card-surface p-8 transition duration-300 hover:-translate-y-2 hover:bg-primary" style="transition-delay: {{ $i % 3 * 80 }}ms">
                    <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-primary/10 text-primary transition group-hover:bg-white/20 group-hover:text-white">
                        <svg class="h-7 w-7" fill="none" stroke="currentColor" stroke-width="1.7" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="{{ $service['icon'] }}"/></svg>
                    </div>
                    <h3 class="mt-6 text-lg font-bold text-heading transition group-hover:text-white">{{ $service['title'] }}</h3>
                    <p class="mt-2 text-sm leading-relaxed text-body transition group-hover:text-white/90">{{ $service['desc'] }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>

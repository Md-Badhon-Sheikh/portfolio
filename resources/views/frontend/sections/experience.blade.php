{{-- ============================================================
     Experience Section
     Vertical timeline of work history, alternating left/right on desktop
     ============================================================ --}}
<section id="experience" class="bg-orange-50/50 py-24">
    <div class="mx-auto max-w-5xl px-5 lg:px-8">

        <div class="reveal mx-auto max-w-2xl text-center">
            <span class="section-kicker">Experience</span>
            <h2 class="section-title">My Work Journey</h2>
        </div>

        <div class="mt-16 relative">
            {{-- Timeline spine --}}
            <div class="absolute left-4 top-0 bottom-0 w-px bg-heading/10 md:left-1/2 md:-translate-x-1/2"></div>

            @php
                $experiences = [
                    [
                        'period' => '2024 — Present',
                        'role' => 'Freelance Web Developer',
                        'company' => 'Self-employed',
                        'desc' => 'Designing and building responsive websites and web applications for clients using Laravel, PHP, and modern front-end tooling.',
                    ],
                    [
                        'period' => '2023 — 2024',
                        'role' => 'Junior Laravel Developer',
                        'company' => 'Company Name',
                        'desc' => 'Contributed to building and maintaining web applications, working with a team to ship features and fix bugs in a Laravel-based codebase.',
                    ],
                    [
                        'period' => '2022 — 2023',
                        'role' => 'Web Development Intern',
                        'company' => 'Company Name',
                        'desc' => 'Assisted in developing responsive UI components and learned real-world development workflows, version control, and code review practices.',
                    ],
                ];
            @endphp

            @foreach ($experiences as $i => $exp)
                <div class="reveal relative mb-12 pl-12 last:mb-0 md:flex md:items-center md:pl-0 {{ $i % 2 === 0 ? 'md:flex-row' : 'md:flex-row-reverse' }}">
                    {{-- Dot --}}
                    <span class="absolute left-4 top-6 h-3.5 w-3.5 -translate-x-1/2 rounded-full border-4 border-white bg-primary shadow-[0_0_0_4px_rgba(245,124,32,0.15)] md:left-1/2"></span>

                    <div class="md:w-1/2 {{ $i % 2 === 0 ? 'md:pr-10' : 'md:pl-10' }}">
                        <div class="card-surface p-6 {{ $i % 2 === 0 ? 'md:text-right' : '' }}">
                            <span class="text-xs font-semibold uppercase tracking-wide text-primary">{{ $exp['period'] }}</span>
                            <h3 class="mt-1 text-lg font-bold text-heading">{{ $exp['role'] }}</h3>
                            <p class="text-sm font-medium text-body/80">{{ $exp['company'] }}</p>
                            <p class="mt-2 text-sm leading-relaxed text-body">{{ $exp['desc'] }}</p>
                        </div>
                    </div>

                    <div class="hidden md:block md:w-1/2"></div>
                </div>
            @endforeach
        </div>
    </div>
</section>

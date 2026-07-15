{{-- ============================================================
     About Section
     Tabs: Education / Bio / Contact (left) — Image slider (right)
     Tab switching + slider are handled by jQuery in app.js
     ============================================================ --}}
<section id="about" class="bg-white py-24">
    <div class="mx-auto max-w-7xl px-5 lg:px-8">

        <div class="reveal mx-auto max-w-2xl text-center">
            <span class="section-kicker">About Me</span>
            <h2 class="section-title">Get To Know Me</h2>
        </div>

        <div class="mt-14 grid grid-cols-1 gap-12 lg:grid-cols-2 lg:items-start">

            {{-- Left: Tabs --}}
            <div class="reveal reveal-left">
                {{-- Tab buttons --}}
                <div class="mb-6 flex gap-8 border-b border-heading/10">
                    <button type="button" class="about-tab-btn relative pb-3 text-sm font-semibold text-primary" data-tab="education">
                        Education
                        <span class="about-tab-indicator absolute -bottom-px left-0 h-0.5 w-full bg-primary"></span>
                    </button>
                    <button type="button" class="about-tab-btn relative pb-3 text-sm font-semibold text-heading/50 transition hover:text-primary" data-tab="bio">
                        Bio
                    </button>
                    <button type="button" class="about-tab-btn relative pb-3 text-sm font-semibold text-heading/50 transition hover:text-primary" data-tab="contact">
                        Contact
                    </button>
                </div>

                {{-- Education panel --}}
                <div class="about-tab-panel space-y-6" data-panel="education">
                    <div>
                        <h4 class="font-bold text-heading">Secondary Education</h4>
                        <ul class="mt-2 space-y-1 text-sm text-body">
                            <li><span class="font-medium text-heading/80">Institution:</span> Your School Name, City</li>
                            <li><span class="font-medium text-heading/80">Certificate:</span> Secondary School Certificate (SSC)</li>
                            <li><span class="font-medium text-heading/80">GPA:</span> 5.0</li>
                            <li><span class="font-medium text-heading/80">Graduated:</span> 2018</li>
                        </ul>
                    </div>
                    <div>
                        <h4 class="font-bold text-heading">Higher Secondary Education</h4>
                        <ul class="mt-2 space-y-1 text-sm text-body">
                            <li><span class="font-medium text-heading/80">Institution:</span> Your College Name, City</li>
                            <li><span class="font-medium text-heading/80">Certificate:</span> Higher Secondary Certificate (HSC)</li>
                            <li><span class="font-medium text-heading/80">GPA:</span> 5.0</li>
                            <li><span class="font-medium text-heading/80">Graduated:</span> 2020</li>
                        </ul>
                    </div>
                    <div>
                        <h4 class="font-bold text-heading">Current Pursuit</h4>
                        <ul class="mt-2 space-y-1 text-sm text-body">
                            <li><span class="font-medium text-heading/80">Institution:</span> Your University Name</li>
                            <li><span class="font-medium text-heading/80">Program:</span> B.Sc. in Computer Science &amp; Engineering</li>
                            <li><span class="font-medium text-heading/80">Status:</span> Enrolled</li>
                            <li><span class="font-medium text-heading/80">Expected Graduation:</span> 2026</li>
                        </ul>
                    </div>
                </div>

                {{-- Bio panel --}}
                <div class="about-tab-panel hidden space-y-4 text-sm leading-relaxed text-body" data-panel="bio">
                    <p>
                        I'm a full stack web developer focused on building fast, accessible, and maintainable
                        web applications. I enjoy working across the stack — from crafting pixel-perfect,
                        responsive interfaces to designing clean back-end architecture with Laravel and PHP.
                    </p>
                    <p>
                        I care about writing readable code, solving real problems, and constantly learning
                        new tools and best practices to deliver better products for the people who use them.
                    </p>
                    <ul class="grid grid-cols-2 gap-3 pt-2">
                        <li class="flex items-center gap-2"><span class="h-1.5 w-1.5 rounded-full bg-primary"></span> Clean Code</li>
                        <li class="flex items-center gap-2"><span class="h-1.5 w-1.5 rounded-full bg-primary"></span> Responsive Design</li>
                        <li class="flex items-center gap-2"><span class="h-1.5 w-1.5 rounded-full bg-primary"></span> On-time Delivery</li>
                        <li class="flex items-center gap-2"><span class="h-1.5 w-1.5 rounded-full bg-primary"></span> Clear Communication</li>
                    </ul>
                </div>

                {{-- Contact panel --}}
                <div class="about-tab-panel hidden space-y-4 text-sm text-body" data-panel="contact">
                    <p class="leading-relaxed">Please fill out the form in the Contact section, or reach me directly through the details below. I typically reply within 24 hours on business days.</p>
                    <ul class="space-y-2">
                        <li><span class="font-medium text-heading/80">Email:</span> hello@example.com</li>
                        <li><span class="font-medium text-heading/80">Phone:</span> +880 000 000 000</li>
                        <li><span class="font-medium text-heading/80">Location:</span> Dhaka, Bangladesh</li>
                    </ul>
                    <a href="#contact" class="btn-primary !py-2.5">Go to Contact Form</a>
                </div>
            </div>

            {{-- Right: Image slider --}}
            <div class="reveal reveal-right">
                <div id="about-slider" class="card-surface relative aspect-[4/3] overflow-hidden">
                    @php
                        $slides = [
                            ['from' => '#ffb27a', 'to' => '#ff7a00'],
                            ['from' => '#7ac9ff', 'to' => '#1e2a5e'],
                            ['from' => '#ffd27a', 'to' => '#ff7a00'],
                        ];
                    @endphp
                    @foreach ($slides as $i => $slide)
                        <div class="about-slide absolute inset-0 flex items-center justify-center transition-opacity duration-700 {{ $i === 0 ? 'opacity-100' : 'opacity-0' }}"
                             style="background: linear-gradient(135deg, {{ $slide['from'] }}, {{ $slide['to'] }});">
                            <svg class="h-20 w-20 text-white/70" fill="none" stroke="currentColor" stroke-width="1.4" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 5h16v12H4V5zm4 12v3h8v-3M9 9h6M9 12h4"/></svg>
                        </div>
                    @endforeach

                    {{-- Slider controls --}}
                    <button type="button" id="about-slider-prev" aria-label="Previous slide" class="absolute left-3 top-1/2 flex h-9 w-9 -translate-y-1/2 items-center justify-center rounded-full bg-white/80 text-heading shadow transition hover:bg-white">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/></svg>
                    </button>
                    <button type="button" id="about-slider-next" aria-label="Next slide" class="absolute right-3 top-1/2 flex h-9 w-9 -translate-y-1/2 items-center justify-center rounded-full bg-white/80 text-heading shadow transition hover:bg-white">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
                    </button>

                    <div id="about-slider-dots" class="absolute bottom-4 left-1/2 flex -translate-x-1/2 gap-2">
                        @foreach ($slides as $i => $slide)
                            <button type="button" class="about-slider-dot h-2 w-2 rounded-full transition {{ $i === 0 ? 'bg-white w-6' : 'bg-white/50' }}" data-slide="{{ $i }}" aria-label="Go to slide {{ $i + 1 }}"></button>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

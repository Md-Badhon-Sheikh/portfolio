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
                    <div class="about-left-col">
                        {{-- Education panel --}}
                        <div class="about-tab-panel space-y-10" data-panel="education">
                            <div>
                                <h3 class="text-2xl font-bold text-slate-900 mb-4">Secondary Education:</h3>
                                <ul class="space-y-2 text-slate-600 list-disc list-inside">
                                    <li><span class="font-semibold text-slate-700">Institution: </span>Brother Andre High School, Noakhali</li>
                                    <li><span class="font-semibold text-slate-700">Certificate: </span>Secondary School Certificate (SSC)</li>
                                    <li><span class="font-semibold text-slate-700">GPA: </span>5.0</li>
                                    <li><span class="font-semibold text-slate-700">Graduated: </span>2018</li>
                                </ul>
                            </div>
                            <div>
                                <h3 class="text-2xl font-bold text-slate-900 mb-4">Higher Secondary Education:</h3>
                                <ul class="space-y-2 text-slate-600 list-disc list-inside">
                                    <li><span class="font-semibold text-slate-700">Institution: </span>Noakhali Government College, Noakhali</li>
                                    <li><span class="font-semibold text-slate-700">Certificate: </span>Higher Secondary Certificate (HSC)</li>
                                    <li><span class="font-semibold text-slate-700">GPA: </span>5.0</li>
                                    <li><span class="font-semibold text-slate-700">Graduated: </span>2020</li>
                                </ul>
                            </div>
                            <div>
                                <h3 class="text-2xl font-bold text-slate-900 mb-4">Current Pursuit:</h3>
                                <ul class="space-y-2 text-slate-600 list-disc list-inside">
                                    <li><span class="font-semibold text-slate-700">Institution: </span>International University of Business Agriculture and Technology (IUBAT)</li>
                                    <li><span class="font-semibold text-slate-700">Program: </span>Bachelor of Science in Computer Science and Engineering (CSE)</li>
                                    <li><span class="font-semibold text-slate-700">Status: </span>Enrolled</li>
                                    <li><span class="font-semibold text-slate-700">Expected Graduation: </span>January 2026</li>
                                </ul>
                            </div>
                        </div>

                        {{-- Bio panel --}}
                        <div class="about-tab-panel hidden space-y-4 text-slate-600 leading-relaxed" data-panel="bio">
                            <p>
                                I'm a full stack web developer focused on building fast, accessible, and maintainable
                                web applications. I enjoy working across the stack — from crafting pixel-perfect,
                                responsive interfaces to designing clean back-end architecture with Laravel and PHP.
                            </p>
                            <p>
                                I care about writing readable code, solving real problems, and constantly learning
                                new tools and best practices to deliver better products for the people who use them.
                            </p>
                            <ul class="grid grid-cols-2 gap-3 pt-2 text-slate-700">
                                <li class="flex items-center gap-2"><span class="h-1.5 w-1.5 rounded-full bg-orange-500"></span> Clean Code</li>
                                <li class="flex items-center gap-2"><span class="h-1.5 w-1.5 rounded-full bg-orange-500"></span> Responsive Design</li>
                                <li class="flex items-center gap-2"><span class="h-1.5 w-1.5 rounded-full bg-orange-500"></span> On-time Delivery</li>
                                <li class="flex items-center gap-2"><span class="h-1.5 w-1.5 rounded-full bg-orange-500"></span> Clear Communication</li>
                            </ul>
                        </div>

                        {{-- Contact panel --}}
                        <div class="about-tab-panel hidden" data-panel="contact">
                            <div class="grid grid-cols-1 sm:grid-cols-3 gap-5">
                                <div class="rounded-xl bg-slate-50 p-6 text-center">
                                    <div class="mx-auto mb-4 flex h-12 w-12 items-center justify-center rounded-full bg-orange-100 text-orange-500">
                                        <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h2.28a1 1 0 01.98.804l.716 3.578a1 1 0 01-.54 1.06l-1.548.774a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.06-.54l3.578.716a1 1 0 01.804.98V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                                    </div>
                                    <h4 class="font-bold text-slate-900">Phone</h4>
                                    <a href="tel:+8801642874989" class="mt-1 block text-sm text-slate-600 hover:text-orange-500">+88016 4287 4989</a>
                                </div>
                                <div class="rounded-xl bg-slate-50 p-6 text-center">
                                    <div class="mx-auto mb-4 flex h-12 w-12 items-center justify-center rounded-full bg-orange-100 text-orange-500">
                                        <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                                    </div>
                                    <h4 class="font-bold text-slate-900">Email</h4>
                                    <a href="mailto:fazlah.alvee20@gmail.com" class="mt-1 block text-sm text-slate-600 hover:text-orange-500">fazlah.alvee20@gmail.com</a>
                                </div>
                                <div class="rounded-xl bg-slate-50 p-6 text-center">
                                    <div class="mx-auto mb-4 flex h-12 w-12 items-center justify-center rounded-full bg-orange-100 text-orange-500">
                                        <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a2 2 0 01-2.828 0l-4.243-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                    </div>
                                    <h4 class="font-bold text-slate-900">Address</h4>
                                    <span class="mt-1 block text-sm text-slate-600">39/c Monsur Ali Road, Tongi, Gazipur, Bangladesh</span>
                                </div>
                            </div>

                            <div class="mt-10 text-center">
                                <h4 class="text-xl font-bold text-slate-900">Connect on Social Media</h4>
                                <div class="mt-4 flex justify-center gap-3">
                                    <a href="#" target="_blank" rel="noopener" aria-label="Facebook" class="flex h-11 w-11 items-center justify-center rounded-xl bg-blue-600 text-white transition hover:opacity-90">
                                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24"><path d="M13.5 21v-7.5h2.5l.5-3h-3V8.5c0-.87.24-1.46 1.49-1.46H16.5V4.36C16.18 4.32 15.06 4.23 13.77 4.23c-2.69 0-4.53 1.64-4.53 4.66V10.5H6.7v3h2.54V21h4.26z"/></svg>
                                    </a>
                                    <a href="#" target="_blank" rel="noopener" aria-label="LinkedIn" class="flex h-11 w-11 items-center justify-center rounded-xl bg-sky-500 text-white transition hover:opacity-90">
                                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24"><path d="M20.45 20.45h-3.55v-5.57c0-1.33-.02-3.03-1.85-3.03-1.86 0-2.14 1.45-2.14 2.94v5.66H9.36V9h3.41v1.56h.05c.48-.9 1.64-1.85 3.38-1.85 3.61 0 4.28 2.38 4.28 5.47v6.27zM5.34 7.43a2.06 2.06 0 1 1 0-4.12 2.06 2.06 0 0 1 0 4.12zM7.11 20.45H3.56V9h3.55v11.45z"/></svg>
                                    </a>
                                    <a href="#" target="_blank" rel="noopener" aria-label="Instagram" class="flex h-11 w-11 items-center justify-center rounded-xl bg-gradient-to-tr from-yellow-400 via-pink-500 to-purple-600 text-white transition hover:opacity-90">
                                        <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><rect width="20" height="20" x="2" y="2" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" x2="17.51" y1="6.5" y2="6.5"/></svg>
                                    </a>
                                    <a href="#" target="_blank" rel="noopener" aria-label="WhatsApp" class="flex h-11 w-11 items-center justify-center rounded-xl bg-green-500 text-white transition hover:opacity-90">
                                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12.04 2.003c-5.5 0-9.96 4.46-9.96 9.96 0 1.76.46 3.48 1.34 4.99L2 22l5.2-1.36a9.9 9.9 0 0 0 4.84 1.24h.005c5.5 0 9.96-4.46 9.96-9.96 0-2.66-1.04-5.16-2.92-7.04a9.9 9.9 0 0 0-7.04-2.92zm5.83 14.19c-.25.7-1.24 1.29-1.99 1.44-.53.11-1.22.2-3.56-.76-2.99-1.24-4.92-4.25-5.07-4.45-.15-.2-1.21-1.61-1.21-3.07s.76-2.18 1.03-2.48c.27-.29.58-.36.78-.36.2 0 .39.002.56.01.18.008.42-.07.66.5.25.6.85 2.07.92 2.22.07.15.12.32.02.52-.1.2-.15.32-.3.5-.15.17-.3.38-.44.5-.14.13-.29.28-.13.55.16.27.72 1.19 1.55 1.93 1.06.95 1.96 1.24 2.24 1.38.28.13.44.11.6-.07.17-.18.71-.83.9-1.11.19-.29.38-.24.63-.14.26.1 1.63.77 1.91.91.28.14.46.2.53.32.07.11.07.68-.18 1.38z"/></svg>
                                    </a>
                                    <a href="#" target="_blank" rel="noopener" aria-label="GitHub" class="flex h-11 w-11 items-center justify-center rounded-xl bg-slate-900 text-white transition hover:opacity-90">
                                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 .5C5.73.5.5 5.73.5 12c0 5.08 3.29 9.39 7.86 10.91.57.1.79-.25.79-.55v-2.15c-3.2.7-3.87-1.36-3.87-1.36-.53-1.33-1.29-1.68-1.29-1.68-1.06-.72.08-.71.08-.71 1.17.08 1.78 1.2 1.78 1.2 1.04 1.77 2.72 1.26 3.38.96.1-.75.4-1.26.73-1.55-2.55-.29-5.24-1.28-5.24-5.68 0-1.25.45-2.28 1.18-3.08-.12-.29-.51-1.46.11-3.04 0 0 .96-.31 3.15 1.18a10.9 10.9 0 0 1 5.74 0c2.19-1.49 3.15-1.18 3.15-1.18.62 1.58.23 2.75.11 3.04.74.8 1.18 1.83 1.18 3.08 0 4.41-2.7 5.38-5.27 5.67.42.36.78 1.07.78 2.16v3.2c0 .3.21.66.79.55A10.51 10.51 0 0 0 23.5 12C23.5 5.73 18.27.5 12 .5z"/></svg>
                                    </a>
                                    <a href="#" target="_blank" rel="noopener" aria-label="Dribbble" class="flex h-11 w-11 items-center justify-center rounded-xl bg-pink-500 text-white transition hover:opacity-90">
                                        <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><path d="M8.56 2.75c4.37 6.03 6.02 9.42 8.03 17.72m2.54-15.38c-3.72 4.35-8.94 5.66-16.88 5.85m19.5 1.9c-3.5-.93-6.63-.82-8.94 0-2.58.92-5.01 2.86-7.44 6.32"/></svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Right: image slider --}}
                    <div class="about-slider-col lg:sticky lg:top-12">
                        <div class="relative h-80 sm:h-96 w-full rounded-xl overflow-hidden shadow-lg group">
                            @php
                                $slides = [
                                    ['src' => asset('images/about/school.webp'), 'alt' => 'Brother Andre High School, Noakhali'],
                                    ['src' => asset('images/about/iubat-1.webp'), 'alt' => 'IUBAT campus'],
                                    ['src' => asset('images/about/college.webp'), 'alt' => 'Noakhali Government College'],
                                    ['src' => asset('images/about/iubat-2.webp'), 'alt' => 'IUBAT campus'],
                                    ['src' => asset('images/about/iubat-3.webp'), 'alt' => 'IUBAT campus'],
                                ];
                            @endphp
                            @foreach ($slides as $i => $slide)
                                <div class="about-slide absolute inset-0 transition-opacity duration-1000 ease-in-out {{ $i === 0 ? 'opacity-100' : 'opacity-0' }}">
                                    <img src="{{ $slide['src'] }}" alt="{{ $slide['alt'] }}" class="w-full h-full object-cover">
                                </div>
                            @endforeach

                            <div id="about-slider-dots" class="absolute bottom-4 left-0 right-0 flex justify-center space-x-2 z-10">
                                @foreach ($slides as $i => $slide)
                                    <button type="button" class="about-slider-dot w-3 h-3 rounded-full transition-all duration-300 shadow-sm {{ $i === 0 ? 'bg-orange-500 scale-110' : 'bg-white/60 hover:bg-white' }}" data-slide="{{ $i }}" aria-label="Go to slide {{ $i + 1 }}"></button>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

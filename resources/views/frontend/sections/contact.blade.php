{{-- ============================================================
     Contact Section
     Left: contact info + socials — Right: validated contact form
     Form posts to route('contact.store') — see ContactController
     ============================================================ --}}
<section id="contact" class="bg-white py-24">
    <div class="mx-auto max-w-7xl px-5 lg:px-8">

        <div class="reveal mx-auto max-w-2xl text-center">
            <span class="section-kicker">Contact</span>
            <h2 class="section-title">Let's Connect</h2>
            <p class="mt-3 text-body">Please fill out the form below, or reach me directly. I usually respond within 24 hours.</p>
        </div>

        <div class="mt-14 grid grid-cols-1 gap-10 lg:grid-cols-5">

            {{-- Left: info --}}
            <div class="reveal reveal-left lg:col-span-2">
                <div class="space-y-5">
                    <div class="flex items-start gap-4">
                        <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-full bg-primary/10 text-primary">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        </div>
                        <div>
                            <h4 class="font-semibold text-heading">Email</h4>
                            <a href="mailto:hello@example.com" class="text-sm text-body hover:text-primary">hello@example.com</a>
                        </div>
                    </div>
                    <div class="flex items-start gap-4">
                        <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-full bg-primary/10 text-primary">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h2.28a1 1 0 01.98.804l.716 3.578a1 1 0 01-.54 1.06l-1.548.774a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.06-.54l3.578.716a1 1 0 01.804.98V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                        </div>
                        <div>
                            <h4 class="font-semibold text-heading">Phone</h4>
                            <a href="tel:+8800000000" class="text-sm text-body hover:text-primary">+880 000 000 000</a>
                        </div>
                    </div>
                    <div class="flex items-start gap-4">
                        <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-full bg-primary/10 text-primary">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a2 2 0 01-2.828 0l-4.243-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        </div>
                        <div>
                            <h4 class="font-semibold text-heading">Location</h4>
                            <span class="text-sm text-body">Dhaka, Bangladesh</span>
                        </div>
                    </div>
                </div>

                <div class="mt-8 flex gap-3">
                    <a href="#" target="_blank" rel="noopener" aria-label="LinkedIn" class="flex h-10 w-10 items-center justify-center rounded-full bg-heading/5 text-heading transition hover:bg-primary hover:text-white">
                        <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24"><path d="M20.45 20.45h-3.55v-5.57c0-1.33-.02-3.03-1.85-3.03-1.86 0-2.14 1.45-2.14 2.94v5.66H9.36V9h3.41v1.56h.05c.48-.9 1.64-1.85 3.38-1.85 3.61 0 4.28 2.38 4.28 5.47v6.27zM5.34 7.43a2.06 2.06 0 1 1 0-4.12 2.06 2.06 0 0 1 0 4.12zM7.11 20.45H3.56V9h3.55v11.45z"/></svg>
                    </a>
                    <a href="#" target="_blank" rel="noopener" aria-label="GitHub" class="flex h-10 w-10 items-center justify-center rounded-full bg-heading/5 text-heading transition hover:bg-primary hover:text-white">
                        <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 .5C5.73.5.5 5.73.5 12c0 5.08 3.29 9.39 7.86 10.91.57.1.79-.25.79-.55v-2.15c-3.2.7-3.87-1.36-3.87-1.36-.53-1.33-1.29-1.68-1.29-1.68-1.06-.72.08-.71.08-.71 1.17.08 1.78 1.2 1.78 1.2 1.04 1.77 2.72 1.26 3.38.96.1-.75.4-1.26.73-1.55-2.55-.29-5.24-1.28-5.24-5.68 0-1.25.45-2.28 1.18-3.08-.12-.29-.51-1.46.11-3.04 0 0 .96-.31 3.15 1.18a10.9 10.9 0 0 1 5.74 0c2.19-1.49 3.15-1.18 3.15-1.18.62 1.58.23 2.75.11 3.04.74.8 1.18 1.83 1.18 3.08 0 4.41-2.7 5.38-5.27 5.67.42.36.78 1.07.78 2.16v3.2c0 .3.21.66.79.55A10.51 10.51 0 0 0 23.5 12C23.5 5.73 18.27.5 12 .5z"/></svg>
                    </a>
                    <a href="#" target="_blank" rel="noopener" aria-label="Twitter / X" class="flex h-10 w-10 items-center justify-center rounded-full bg-heading/5 text-heading transition hover:bg-primary hover:text-white">
                        <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24"><path d="M18.9 2H22l-7.6 8.7L23 22h-6.9l-5.4-6.6L4.5 22H1.3l8.1-9.3L1 2h7l4.9 6.1L18.9 2zm-1.2 18h1.9L7.4 3.9H5.4L17.7 20z"/></svg>
                    </a>
                </div>
            </div>

            {{-- Right: form --}}
            <div class="reveal reveal-right lg:col-span-3">

                @if (session('success'))
                    <div class="mb-6 rounded-xl border border-green-200 bg-green-50 px-5 py-4 text-sm font-medium text-green-700">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('contact.store') }}" method="POST" class="card-surface space-y-5 p-8" novalidate>
                    @csrf

                    <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">
                        <div>
                            <label for="name" class="mb-1.5 block text-sm font-medium text-heading">Name</label>
                            <input type="text" id="name" name="name" value="{{ old('name') }}" required
                                class="w-full rounded-xl border border-heading/10 bg-page px-4 py-3 text-sm text-heading outline-none transition focus:border-primary focus:ring-2 focus:ring-primary/20 @error('name') border-red-400 @enderror"
                                placeholder="John Doe">
                            @error('name') <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label for="email" class="mb-1.5 block text-sm font-medium text-heading">Email</label>
                            <input type="email" id="email" name="email" value="{{ old('email') }}" required
                                class="w-full rounded-xl border border-heading/10 bg-page px-4 py-3 text-sm text-heading outline-none transition focus:border-primary focus:ring-2 focus:ring-primary/20 @error('email') border-red-400 @enderror"
                                placeholder="john@example.com">
                            @error('email') <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    <div>
                        <label for="subject" class="mb-1.5 block text-sm font-medium text-heading">Subject</label>
                        <input type="text" id="subject" name="subject" value="{{ old('subject') }}" required
                            class="w-full rounded-xl border border-heading/10 bg-page px-4 py-3 text-sm text-heading outline-none transition focus:border-primary focus:ring-2 focus:ring-primary/20 @error('subject') border-red-400 @enderror"
                            placeholder="Project inquiry">
                        @error('subject') <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label for="message" class="mb-1.5 block text-sm font-medium text-heading">Message</label>
                        <textarea id="message" name="message" rows="5" required
                            class="w-full rounded-xl border border-heading/10 bg-page px-4 py-3 text-sm text-heading outline-none transition focus:border-primary focus:ring-2 focus:ring-primary/20 @error('message') border-red-400 @enderror"
                            placeholder="Tell me about your project...">{{ old('message') }}</textarea>
                        @error('message') <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p> @enderror
                    </div>

                    <button type="submit" class="btn-primary w-full sm:w-auto">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M22 2L11 13M22 2l-7 20-4-9-9-4 20-7z"/></svg>
                        Send Message
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>

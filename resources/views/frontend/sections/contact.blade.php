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

            {{-- Left: info (from About → Contact) + socials --}}
            <div class="reveal reveal-left lg:col-span-2">
                <div class="space-y-5">
                    @forelse ($contactInfos as $info)
                        <div class="flex items-start gap-4">
                            <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-full bg-primary/10 text-primary">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">{!! $info->svgPaths() !!}</svg>
                            </div>
                            <div>
                                <h4 class="font-semibold text-heading">{{ $info->title }}</h4>
                                @if ($info->href())
                                    <a href="{{ $info->href() }}" class="text-sm text-body hover:text-primary">{{ $info->details }}</a>
                                @else
                                    <span class="text-sm text-body">{{ $info->details }}</span>
                                @endif
                            </div>
                        </div>
                    @empty
                        <p class="text-sm text-body">Contact details coming soon.</p>
                    @endforelse
                </div>

                <div class="mt-8 flex gap-3">
                    @foreach ($socialLinks as $link)
                        <a href="{{ $link->url }}" target="_blank" rel="noopener" aria-label="{{ $link->label() }}" class="flex h-10 w-10 items-center justify-center rounded-full bg-heading/5 text-heading transition hover:bg-primary hover:text-white">
                            <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24">{!! $link->svgPaths() !!}</svg>
                        </a>
                    @endforeach
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

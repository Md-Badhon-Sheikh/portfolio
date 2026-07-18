{{-- ============================================================
     Skills Section
     Two-column animated progress bars (filled via IntersectionObserver in app.js)
     ============================================================ --}}
<section id="skills" class="bg-orange-50/50 py-24">
    <div class="mx-auto max-w-7xl px-5 lg:px-8">

        <div class="reveal mx-auto max-w-2xl text-center">
            <span class="section-kicker">Why Choose Me</span>
            <h2 class="section-title">My Experience Area</h2>
        </div>

        <div class="mt-14 grid grid-cols-1 gap-x-12 gap-y-7 md:grid-cols-2">
            @forelse ($skills as $skill)
                <div class="reveal">
                    <div class="mb-2 flex items-center justify-between">
                        <span class="text-sm font-semibold text-heading">{{ $skill->name }}</span>
                        <span class="skill-percent text-sm font-semibold text-primary" data-target="{{ $skill->level }}">0%</span>
                    </div>
                    <div class="h-2 w-full overflow-hidden rounded-full bg-heading/10">
                        <div class="skill-bar-fill" data-width="{{ $skill->level }}"></div>
                    </div>
                </div>
            @empty
                <p class="text-center text-sm text-body md:col-span-2">No skills added yet.</p>
            @endforelse
        </div>
    </div>
</section>

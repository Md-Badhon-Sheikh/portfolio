@extends('layouts.admin')

@section('title', 'Profile')

@section('content')
    <div class="mb-8">
        <h2 class="text-2xl font-bold text-heading">Profile Settings</h2>
        <p class="mt-1 text-sm text-body">Update your account's profile information and password.</p>
    </div>

    <div class="grid grid-cols-1 gap-6 lg:grid-cols-2">
        {{-- Profile info --}}
        <div class="card-surface p-6 sm:p-8">
            <h3 class="mb-6 text-lg font-bold text-heading">Profile Information</h3>

            <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
                @csrf
                @method('PUT')

                <div class="flex items-center gap-4">
                    @if ($user->avatarUrl())
                        <img src="{{ $user->avatarUrl() }}" alt="{{ $user->name }}" class="h-16 w-16 rounded-full object-cover">
                    @else
                        <span class="flex h-16 w-16 items-center justify-center rounded-full bg-primary/10 text-xl font-bold text-primary">
                            {{ $user->initial() }}
                        </span>
                    @endif
                    <div class="flex-1">
                        <label for="avatar" class="mb-1.5 block text-sm font-medium text-heading">Avatar</label>
                        <input type="file" id="avatar" name="avatar" accept="image/*"
                            class="w-full text-sm text-body file:mr-3 file:rounded-lg file:border-0 file:bg-primary/10 file:px-3 file:py-2 file:text-sm file:font-medium file:text-primary hover:file:bg-primary/20">
                        @error('avatar') <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p> @enderror
                    </div>
                </div>

                <div>
                    <label for="name" class="mb-1.5 block text-sm font-medium text-heading">Name</label>
                    <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" required
                        class="w-full rounded-xl border border-heading/10 bg-page px-4 py-3 text-sm text-heading outline-none transition focus:border-primary focus:ring-2 focus:ring-primary/20 @error('name') border-red-400 @enderror">
                    @error('name') <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="email" class="mb-1.5 block text-sm font-medium text-heading">Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" required
                        class="w-full rounded-xl border border-heading/10 bg-page px-4 py-3 text-sm text-heading outline-none transition focus:border-primary focus:ring-2 focus:ring-primary/20 @error('email') border-red-400 @enderror">
                    @error('email') <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p> @enderror
                </div>

                <div class="border-t border-heading/10 pt-5">
                    <p class="mb-4 text-xs font-semibold uppercase tracking-wide text-body">Site Branding</p>

                    <div>
                        @if ($user->logoUrl())
                            <img src="{{ $user->logoUrl() }}" alt="Logo" class="mb-2 h-10 w-auto">
                        @endif
                        <label for="logo" class="mb-1.5 block text-sm font-medium text-heading">Header Logo</label>
                        <input type="file" id="logo" name="logo" accept="image/*"
                            class="w-full text-sm text-body file:mr-3 file:rounded-lg file:border-0 file:bg-primary/10 file:px-3 file:py-2 file:text-sm file:font-medium file:text-primary hover:file:bg-primary/20">
                        <p class="mt-1.5 text-xs text-body">Shown top-left in the site header. Leave blank to show your name as a text logo instead.</p>
                        @error('logo') <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p> @enderror
                    </div>
                </div>

                <div class="border-t border-heading/10 pt-5">
                    <p class="mb-4 text-xs font-semibold uppercase tracking-wide text-body">Public Hero Section</p>

                    <div class="space-y-5">
                        <div>
                            <label for="designation" class="mb-1.5 block text-sm font-medium text-heading">Designation</label>
                            <input type="text" id="designation" name="designation" value="{{ old('designation', $user->designation) }}"
                                placeholder="Web Developer and Designer"
                                class="w-full rounded-xl border border-heading/10 bg-page px-4 py-3 text-sm text-heading outline-none transition focus:border-primary focus:ring-2 focus:ring-primary/20 @error('designation') border-red-400 @enderror">
                            @error('designation') <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label for="bio" class="mb-1.5 block text-sm font-medium text-heading">Hero Description</label>
                            <textarea id="bio" name="bio" rows="3"
                                placeholder="A short intro shown under your name on the homepage"
                                class="w-full rounded-xl border border-heading/10 bg-page px-4 py-3 text-sm text-heading outline-none transition focus:border-primary focus:ring-2 focus:ring-primary/20 @error('bio') border-red-400 @enderror">{{ old('bio', $user->bio) }}</textarea>
                            @error('bio') <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label for="contact_link" class="mb-1.5 block text-sm font-medium text-heading">Contact Button Link</label>
                            <input type="text" id="contact_link" name="contact_link" value="{{ old('contact_link', $user->contact_link) }}"
                                placeholder="https://wa.me/8801xxxxxxxxx or mailto:you@example.com"
                                class="w-full rounded-xl border border-heading/10 bg-page px-4 py-3 text-sm text-heading outline-none transition focus:border-primary focus:ring-2 focus:ring-primary/20 @error('contact_link') border-red-400 @enderror">
                            <p class="mt-1.5 text-xs text-body">Leave blank to scroll to the on-page Contact section instead.</p>
                            @error('contact_link') <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label for="cv" class="mb-1.5 block text-sm font-medium text-heading">CV / Resume (PDF)</label>
                            @if ($user->cvUrl())
                                <a href="{{ $user->cvUrl() }}" target="_blank" rel="noopener" class="mb-2 inline-flex items-center gap-1.5 text-xs font-medium text-primary hover:underline">
                                    View current CV
                                </a>
                            @endif
                            <input type="file" id="cv" name="cv" accept="application/pdf"
                                class="w-full text-sm text-body file:mr-3 file:rounded-lg file:border-0 file:bg-primary/10 file:px-3 file:py-2 file:text-sm file:font-medium file:text-primary hover:file:bg-primary/20">
                            @error('cv') <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p> @enderror
                        </div>
                    </div>
                </div>

                <div class="border-t border-heading/10 pt-5">
                    <p class="mb-4 text-xs font-semibold uppercase tracking-wide text-body">About Section</p>

                    <div class="space-y-5">
                        <div>
                            <label for="about_bio" class="mb-1.5 block text-sm font-medium text-heading">Bio</label>
                            <textarea id="about_bio" name="about_bio" rows="8"
                                placeholder="The longer bio shown in the About &rarr; Bio tab">{{ old('about_bio', $user->about_bio) }}</textarea>
                            @error('about_bio') <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label for="about_highlights" class="mb-1.5 block text-sm font-medium text-heading">Bio Highlights</label>
                            <textarea id="about_highlights" name="about_highlights" rows="4"
                                placeholder="Clean Code&#10;Responsive Design&#10;On-time Delivery&#10;Clear Communication"
                                class="w-full rounded-xl border border-heading/10 bg-page px-4 py-3 text-sm text-heading outline-none transition focus:border-primary focus:ring-2 focus:ring-primary/20 @error('about_highlights') border-red-400 @enderror">{{ old('about_highlights', $user->about_highlights) }}</textarea>
                            <p class="mt-1.5 text-xs text-body">One short item per line — shown as a checklist under the bio.</p>
                            @error('about_highlights') <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p> @enderror
                        </div>

                        <p class="text-xs text-body">
                            Bio slider images are managed on the <a href="{{ route('admin.about-images.index') }}" class="font-medium text-primary hover:underline">Bio Slider Images</a> page,
                            and the Contact tab's cards on the <a href="{{ route('admin.contact-infos.index') }}" class="font-medium text-primary hover:underline">Contact Info</a> page.
                        </p>
                    </div>
                </div>

                <button type="submit" class="btn-primary">Save Changes</button>
            </form>
        </div>

        {{-- Password --}}
        <div class="card-surface p-6 sm:p-8">
            <h3 class="mb-6 text-lg font-bold text-heading">Change Password</h3>

            <form action="{{ route('profile.password') }}" method="POST" class="space-y-5">
                @csrf
                @method('PUT')

                <div>
                    <label for="current_password" class="mb-1.5 block text-sm font-medium text-heading">Current Password</label>
                    <input type="password" id="current_password" name="current_password" required
                        class="w-full rounded-xl border border-heading/10 bg-page px-4 py-3 text-sm text-heading outline-none transition focus:border-primary focus:ring-2 focus:ring-primary/20 @error('current_password') border-red-400 @enderror">
                    @error('current_password') <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="password" class="mb-1.5 block text-sm font-medium text-heading">New Password</label>
                    <input type="password" id="password" name="password" required
                        class="w-full rounded-xl border border-heading/10 bg-page px-4 py-3 text-sm text-heading outline-none transition focus:border-primary focus:ring-2 focus:ring-primary/20 @error('password') border-red-400 @enderror">
                    @error('password') <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="password_confirmation" class="mb-1.5 block text-sm font-medium text-heading">Confirm New Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" required
                        class="w-full rounded-xl border border-heading/10 bg-page px-4 py-3 text-sm text-heading outline-none transition focus:border-primary focus:ring-2 focus:ring-primary/20">
                </div>

                <button type="submit" class="btn-primary">Update Password</button>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#about_bio'), {
                toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', '|', 'blockQuote', 'undo', 'redo'],
            })
            .catch((error) => console.error(error));
    </script>
@endpush

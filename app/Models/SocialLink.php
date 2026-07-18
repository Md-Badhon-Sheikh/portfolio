<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SocialLink extends Model
{
    protected $fillable = ['platform', 'url', 'sort_order'];

    /**
     * Whitelisted platforms: each maps to a label, brand-color background
     * class, and inner SVG markup. Kept fixed (rather than free-text
     * icon/color input) so admins pick from a dropdown and no arbitrary
     * markup or class strings ever get stored/echoed.
     *
     * @return array<string, array{label: string, bg: string, svg: string}>
     */
    public static function platformMap(): array
    {
        return [
            'facebook' => [
                'label' => 'Facebook',
                'bg' => 'bg-blue-600',
                'svg' => '<path d="M13.5 21v-7.5h2.5l.5-3h-3V8.5c0-.87.24-1.46 1.49-1.46H16.5V4.36C16.18 4.32 15.06 4.23 13.77 4.23c-2.69 0-4.53 1.64-4.53 4.66V10.5H6.7v3h2.54V21h4.26z"/>',
            ],
            'linkedin' => [
                'label' => 'LinkedIn',
                'bg' => 'bg-sky-500',
                'svg' => '<path d="M20.45 20.45h-3.55v-5.57c0-1.33-.02-3.03-1.85-3.03-1.86 0-2.14 1.45-2.14 2.94v5.66H9.36V9h3.41v1.56h.05c.48-.9 1.64-1.85 3.38-1.85 3.61 0 4.28 2.38 4.28 5.47v6.27zM5.34 7.43a2.06 2.06 0 1 1 0-4.12 2.06 2.06 0 0 1 0 4.12zM7.11 20.45H3.56V9h3.55v11.45z"/>',
            ],
            'instagram' => [
                'label' => 'Instagram',
                'bg' => 'bg-gradient-to-tr from-yellow-400 via-pink-500 to-purple-600',
                'svg' => '<rect width="20" height="20" x="2" y="2" rx="5" ry="5" fill="none" stroke="currentColor" stroke-width="2"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z" fill="none" stroke="currentColor" stroke-width="2"/><line x1="17.5" x2="17.51" y1="6.5" y2="6.5" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>',
            ],
            'whatsapp' => [
                'label' => 'WhatsApp',
                'bg' => 'bg-green-500',
                'svg' => '<path d="M12.04 2.003c-5.5 0-9.96 4.46-9.96 9.96 0 1.76.46 3.48 1.34 4.99L2 22l5.2-1.36a9.9 9.9 0 0 0 4.84 1.24h.005c5.5 0 9.96-4.46 9.96-9.96 0-2.66-1.04-5.16-2.92-7.04a9.9 9.9 0 0 0-7.04-2.92zm5.83 14.19c-.25.7-1.24 1.29-1.99 1.44-.53.11-1.22.2-3.56-.76-2.99-1.24-4.92-4.25-5.07-4.45-.15-.2-1.21-1.61-1.21-3.07s.76-2.18 1.03-2.48c.27-.29.58-.36.78-.36.2 0 .39.002.56.01.18.008.42-.07.66.5.25.6.85 2.07.92 2.22.07.15.12.32.02.52-.1.2-.15.32-.3.5-.15.17-.3.38-.44.5-.14.13-.29.28-.13.55.16.27.72 1.19 1.55 1.93 1.06.95 1.96 1.24 2.24 1.38.28.13.44.11.6-.07.17-.18.71-.83.9-1.11.19-.29.38-.24.63-.14.26.1 1.63.77 1.91.91.28.14.46.2.53.32.07.11.07.68-.18 1.38z"/>',
            ],
            'github' => [
                'label' => 'GitHub',
                'bg' => 'bg-slate-900',
                'svg' => '<path d="M12 .5C5.73.5.5 5.73.5 12c0 5.08 3.29 9.39 7.86 10.91.57.1.79-.25.79-.55v-2.15c-3.2.7-3.87-1.36-3.87-1.36-.53-1.33-1.29-1.68-1.29-1.68-1.06-.72.08-.71.08-.71 1.17.08 1.78 1.2 1.78 1.2 1.04 1.77 2.72 1.26 3.38.96.1-.75.4-1.26.73-1.55-2.55-.29-5.24-1.28-5.24-5.68 0-1.25.45-2.28 1.18-3.08-.12-.29-.51-1.46.11-3.04 0 0 .96-.31 3.15 1.18a10.9 10.9 0 0 1 5.74 0c2.19-1.49 3.15-1.18 3.15-1.18.62 1.58.23 2.75.11 3.04.74.8 1.18 1.83 1.18 3.08 0 4.41-2.7 5.38-5.27 5.67.42.36.78 1.07.78 2.16v3.2c0 .3.21.66.79.55A10.51 10.51 0 0 0 23.5 12C23.5 5.73 18.27.5 12 .5z"/>',
            ],
            'dribbble' => [
                'label' => 'Dribbble',
                'bg' => 'bg-pink-500',
                'svg' => '<circle cx="12" cy="12" r="10" fill="none" stroke="currentColor" stroke-width="1.8"/><path d="M8.56 2.75c4.37 6.03 6.02 9.42 8.03 17.72m2.54-15.38c-3.72 4.35-8.94 5.66-16.88 5.85m19.5 1.9c-3.5-.93-6.63-.82-8.94 0-2.58.92-5.01 2.86-7.44 6.32" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>',
            ],
            'twitter' => [
                'label' => 'X (Twitter)',
                'bg' => 'bg-black',
                'svg' => '<path d="M18.9 2H22l-7.6 8.7L23 22h-6.9l-5.4-6.6L4.5 22H1.3l8.1-9.3L1 2h7l4.9 6.1L18.9 2zm-1.2 18h1.9L7.4 3.9H5.4L17.7 20z"/>',
            ],
            'youtube' => [
                'label' => 'YouTube',
                'bg' => 'bg-red-600',
                'svg' => '<path d="M21.8 8.001a2.75 2.75 0 0 0-1.94-1.94C18.25 5.6 12 5.6 12 5.6s-6.25 0-7.86.46A2.75 2.75 0 0 0 2.2 8.001 28.7 28.7 0 0 0 1.75 12a28.7 28.7 0 0 0 .45 4c.24.94.98 1.68 1.94 1.94C5.75 18.4 12 18.4 12 18.4s6.25 0 7.86-.46a2.75 2.75 0 0 0 1.94-1.94A28.7 28.7 0 0 0 22.25 12a28.7 28.7 0 0 0-.45-3.999zM9.75 15.02V8.98L15.5 12l-5.75 3.02z"/>',
            ],
        ];
    }

    /**
     * This link's label (falls back to a capitalized platform name).
     */
    public function label(): string
    {
        return self::platformMap()[$this->platform]['label'] ?? ucfirst($this->platform);
    }

    /**
     * This link's brand background class (falls back to a neutral gray).
     */
    public function bgClass(): string
    {
        return self::platformMap()[$this->platform]['bg'] ?? 'bg-slate-700';
    }

    /**
     * This link's inner SVG markup (falls back to a generic globe icon).
     */
    public function svgPaths(): string
    {
        return self::platformMap()[$this->platform]['svg']
            ?? '<circle cx="12" cy="12" r="10" fill="none" stroke="currentColor" stroke-width="2"/>';
    }
}

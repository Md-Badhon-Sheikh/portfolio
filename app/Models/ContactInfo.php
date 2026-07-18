<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactInfo extends Model
{
    protected $fillable = ['icon', 'title', 'details', 'sort_order'];

    /**
     * Whitelisted icons for contact info cards. Kept as a fixed map (rather
     * than letting admins paste raw SVG) to avoid storing/echoing arbitrary markup.
     *
     * @return array<string, string>
     */
    public static function iconMap(): array
    {
        return [
            'phone' => '<path d="M3 5a2 2 0 012-2h2.28a1 1 0 01.98.804l.716 3.578a1 1 0 01-.54 1.06l-1.548.774a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.06-.54l3.578.716a1 1 0 01.804.98V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>',
            'email' => '<path d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>',
            'location' => '<path d="M17.657 16.657L13.414 20.9a2 2 0 01-2.828 0l-4.243-4.243a8 8 0 1111.314 0z"/><path d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>',
            'clock' => '<circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/>',
            'globe' => '<circle cx="12" cy="12" r="10"/><path d="M12 2a14.5 14.5 0 0 0 0 20 14.5 14.5 0 0 0 0-20"/><path d="M2 12h20"/>',
            'chat' => '<path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"/>',
        ];
    }

    /**
     * Raw inner SVG markup for this entry's icon (falls back to "phone").
     */
    public function svgPaths(): string
    {
        return self::iconMap()[$this->icon] ?? self::iconMap()['phone'];
    }

    /**
     * A clickable href for this entry, based on icon type — "tel:" for phone,
     * "mailto:" for email, or null for a plain (non-linked) display.
     */
    public function href(): ?string
    {
        return match ($this->icon) {
            'phone' => 'tel:'.preg_replace('/\s+/', '', $this->details),
            'email' => 'mailto:'.$this->details,
            default => null,
        };
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = ['icon', 'color', 'title', 'description', 'sort_order'];

    /**
     * Whitelisted icons for service cards. Kept as a fixed map (rather than
     * letting admins paste raw SVG) to avoid storing/echoing arbitrary markup.
     *
     * @return array<string, string>
     */
    public static function iconMap(): array
    {
        return [
            'design' => '<path d="M5 5.5A3.5 3.5 0 0 1 8.5 2H12v7H8.5A3.5 3.5 0 0 1 5 5.5z"/><path d="M12 2h3.5a3.5 3.5 0 1 1 0 7H12V2z"/><path d="M12 12.5a3.5 3.5 0 1 1 7 0 3.5 3.5 0 1 1-7 0z"/><path d="M5 19.5A3.5 3.5 0 0 1 8.5 16H12v3.5a3.5 3.5 0 1 1-7 0z"/><path d="M5 12.5A3.5 3.5 0 0 1 8.5 9H12v7H8.5A3.5 3.5 0 0 1 5 12.5z"/>',
            'code' => '<path d="M12 12h.01"/><path d="M16 12h.01"/><path d="m17 7 5 5-5 5"/><path d="m7 7-5 5 5 5"/><path d="M8 12h.01"/>',
            'server' => '<rect width="20" height="8" x="2" y="2" rx="2" ry="2"/><rect width="20" height="8" x="2" y="14" rx="2" ry="2"/><line x1="6" x2="6.01" y1="6" y2="6"/><line x1="6" x2="6.01" y1="18" y2="18"/>',
            'api' => '<path d="M12 22v-5"/><path d="M9 8V2"/><path d="M15 8V2"/><path d="M18 8v5a4 4 0 0 1-4 4h-4a4 4 0 0 1-4-4V8Z"/>',
            'database' => '<ellipse cx="12" cy="5" rx="9" ry="3"/><path d="M3 5V19A9 3 0 0 0 21 19V5"/><path d="M3 12A9 3 0 0 0 21 12"/>',
            'device' => '<rect width="14" height="20" x="5" y="2" rx="2" ry="2"/><path d="M12 18h.01"/>',
            'globe' => '<circle cx="12" cy="12" r="10"/><path d="M12 2a14.5 14.5 0 0 0 0 20 14.5 14.5 0 0 0 0-20"/><path d="M2 12h20"/>',
            'shield' => '<path d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z"/>',
        ];
    }

    /**
     * Whitelisted Tailwind text-color utility classes for the icon accent.
     * Stored as the full class name (not just the color name) so Tailwind's
     * content scanner picks up the literal string and generates the class —
     * assembling it at render time (e.g. "text-" . $color) would not.
     *
     * @return array<int, string>
     */
    public static function colorOptions(): array
    {
        return ['text-orange-600', 'text-green-500', 'text-purple-500', 'text-blue-500', 'text-pink-500', 'text-cyan-500'];
    }

    /**
     * Raw inner SVG markup for this service's icon (falls back to "design").
     */
    public function svgPaths(): string
    {
        return self::iconMap()[$this->icon] ?? self::iconMap()['design'];
    }
}

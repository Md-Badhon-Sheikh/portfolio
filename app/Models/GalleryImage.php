<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GalleryImage extends Model
{
    protected $fillable = ['title', 'image', 'size', 'sort_order'];

    /**
     * Whitelisted card widths for the masonry layout. Kept as a fixed map
     * (rather than free-text CSS) so admins pick a size, not a class string.
     *
     * @return array<string, string>
     */
    public static function sizeMap(): array
    {
        return [
            'small' => 'w-60',
            'medium' => 'w-72',
            'large' => 'w-96',
            'wide' => 'w-[500px]',
        ];
    }

    /**
     * This image's Tailwind width class (falls back to "medium").
     */
    public function widthClass(): string
    {
        return self::sizeMap()[$this->size] ?? self::sizeMap()['medium'];
    }

    /**
     * Public URL for this image.
     */
    public function imageUrl(): string
    {
        return asset('storage/'.$this->image);
    }
}

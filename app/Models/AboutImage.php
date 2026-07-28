<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutImage extends Model
{
    public const TYPE_EDUCATION = 'education';
    public const TYPE_BIO = 'bio';

    protected $fillable = ['image', 'type', 'alt', 'sort_order'];

    /**
     * Public URL for this slide's image.
     */
    public function imageUrl(): string
    {
        return asset('storage/'.$this->image);
    }
}

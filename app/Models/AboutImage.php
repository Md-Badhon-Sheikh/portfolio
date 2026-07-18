<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutImage extends Model
{
    protected $fillable = ['image', 'alt', 'sort_order'];

    /**
     * Public URL for this slide's image.
     */
    public function imageUrl(): string
    {
        return asset('storage/'.$this->image);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Project extends Model
{
    protected $fillable = ['title', 'tags', 'image', 'url', 'sort_order'];

    /**
     * This project's tags as a clean list, e.g. "Laravel, Dashboard" → ['Laravel', 'Dashboard'].
     *
     * @return array<int, string>
     */
    public function tagList(): array
    {
        return array_values(array_filter(array_map('trim', explode(',', $this->tags))));
    }

    /**
     * The category badge shown on the card (its first tag).
     */
    public function primaryCategory(): ?string
    {
        return $this->tagList()[0] ?? null;
    }

    /**
     * Slugified tags, space-separated, matched against the portfolio filter
     * buttons' data-filter values (see HomeController / portfolio.blade.php).
     */
    public function filterSlugs(): string
    {
        return collect($this->tagList())->map(fn ($tag) => Str::slug($tag))->implode(' ');
    }

    /**
     * Public URL for this project's thumbnail, or null if none uploaded.
     */
    public function imageUrl(): ?string
    {
        return $this->image ? asset('storage/'.$this->image) : null;
    }
}

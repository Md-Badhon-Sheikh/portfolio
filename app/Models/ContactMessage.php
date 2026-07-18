<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactMessage extends Model
{
    protected $fillable = ['name', 'email', 'subject', 'message'];

    protected function casts(): array
    {
        return [
            'read_at' => 'datetime',
        ];
    }

    public function isUnread(): bool
    {
        return $this->read_at === null;
    }

    public function markAsRead(): void
    {
        if ($this->isUnread()) {
            // read_at is intentionally not mass-assignable (it's internal-only,
            // never user input), so it's set directly rather than via update().
            $this->forceFill(['read_at' => now()])->save();
        }
    }
}

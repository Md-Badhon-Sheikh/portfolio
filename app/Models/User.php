<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

#[Fillable(['name', 'email', 'password', 'avatar', 'designation', 'bio', 'cv', 'contact_link', 'about_bio', 'about_highlights'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Public URL for the user's avatar, or null if none uploaded.
     */
    public function avatarUrl(): ?string
    {
        return $this->avatar ? asset('storage/'.$this->avatar) : null;
    }

    /**
     * First letter of the user's name, used as an avatar fallback.
     */
    public function initial(): string
    {
        return mb_strtoupper(mb_substr($this->name, 0, 1));
    }

    /**
     * Public URL for the user's uploaded CV, or null if none uploaded.
     */
    public function cvUrl(): ?string
    {
        return $this->cv ? asset('storage/'.$this->cv) : null;
    }

    /**
     * The About → Bio tab's checklist items, one per line of `about_highlights`.
     *
     * @return array<int, string>
     */
    public function highlights(): array
    {
        if (! $this->about_highlights) {
            return [];
        }

        return array_values(array_filter(array_map(
            'trim',
            preg_split('/\r\n|\r|\n/', $this->about_highlights)
        )));
    }
}

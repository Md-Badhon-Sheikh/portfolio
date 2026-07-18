<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EducationEntry extends Model
{
    protected $fillable = ['title', 'details', 'image', 'sort_order'];

    /**
     * Public URL for this entry's image, or null if none uploaded.
     */
    public function imageUrl(): ?string
    {
        return $this->image ? asset('storage/'.$this->image) : null;
    }

    /**
     * Parse the "Label: value" lines in `details` into pairs for display.
     * Lines without a colon are shown as-is under a null label.
     *
     * @return array<int, array{label: ?string, value: string}>
     */
    public function lines(): array
    {
        $lines = [];

        foreach (preg_split('/\r\n|\r|\n/', trim($this->details)) as $line) {
            if ($line === '') {
                continue;
            }

            if (str_contains($line, ':')) {
                [$label, $value] = explode(':', $line, 2);
                $lines[] = ['label' => trim($label), 'value' => trim($value)];
            } else {
                $lines[] = ['label' => null, 'value' => trim($line)];
            }
        }

        return $lines;
    }
}

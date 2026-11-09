<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $guarded = [];

    protected $casts = [
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
    ];

    public function priceFormatted(): string
    {
        return 'Rp' . number_format($this->price, 0, ',', '.');
    }

    public function telegramUrl(): string
    {
        $text = "Halo, aku mau pesan reading \"{$this->name}\".";

        return 'https://t.me/' . config('tarot.telegram_username') . '?text=' . rawurlencode($text);
    }
}

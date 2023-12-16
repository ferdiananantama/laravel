<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Event extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = [
        'date' => 'date',
        'time_start' => 'datetime',
        'time_end' => 'datetime',
        'is_recommended' => 'boolean',
    ];

    protected static function booted(): void
    {
        static::creating(function (Event $event) {
            if (! $event->slug) {
                $event->slug = Str::slug("{$event->title} " . Str::random(8));
            }
        });
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function imageUrl(): Attribute
    {
        return Attribute::get(fn () => Str::startsWith($this->image_path, ['http', 'https'])
            ? $this->image_path
            : asset('storage/' . $this->image_path)
        );
    }

    public function ticketStartsFrom(): Attribute
    {
        return Attribute::get(fn () => $this->tickets->sortBy('price')->first()->price);
    }

    public function tickets(): HasMany
    {
        return $this->hasMany(Ticket::class);
    }
}

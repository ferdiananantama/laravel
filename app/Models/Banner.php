<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Banner extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function imageUrl(): Attribute
    {
        return Attribute::get(fn () => Str::startsWith($this->image_path, ['http', 'https'])
            ? $this->image_path
            : asset('storage/' . $this->image_path)
        );
    }
}

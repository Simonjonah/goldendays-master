<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Lessonnote extends Model
{
    use HasFactory;
    use Sluggable;

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}

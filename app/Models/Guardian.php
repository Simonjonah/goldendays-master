<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
// use Illuminate\Database\Eloquent\Relations\BelongsTo;
// use App\Models\Subject;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Guardian extends Authenticatable
{
    use HasFactory;

    public function users(): HasMany 
    {
        return $this->hasMany(User::class);
    }

    
}

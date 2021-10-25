<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Artist extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function movies(){
        return $this->belongsToMany(Movie::class, 'movie_artist');
    }
}

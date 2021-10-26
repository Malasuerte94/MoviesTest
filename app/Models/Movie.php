<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Movie extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function artists() {
        return $this->belongsToMany(Artist::class, 'movie_artist');
    }

    public function scopeStatus($query, $status = 1) {
        return $query->where('status', $status);
    }
    
    public function scopeRating($query, $rating = 0) {
        return $query->where('rating','>=', $rating);
    }

    public function scopeHasArtists($query) {
        return $query->with('artists');
    }
}

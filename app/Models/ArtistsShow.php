<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArtistsShow extends Model
{
    use HasFactory;

    protected $table ='artistsShows';

    protected $fillable = [
        'artist_id',
        'show_id',
    ];

    public function artist(){
        return $this->belongsTo(Artist::class);
    }
    
    public function show()
    {
    return $this->belongsTo(Show::class);
    }
}

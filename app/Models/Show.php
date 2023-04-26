<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Show extends Model
{
    use HasFactory;

    protected $table ='shows';

    protected $fillable = [
        'name',
        'photo',
        'description',
        'venue_id',
    ];

    public function artistsShow()
    {
        return $this->hasMany(ArtistsShow::class);
    }

    public function venue()
    {
        return $this->belongsTo(Venue::class);
    }
}

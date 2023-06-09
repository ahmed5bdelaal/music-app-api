<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venue extends Model
{
    use HasFactory;

    protected $table ='venues';

    protected $fillable = [
        'name',
        'description',
    ];


    public function show(){
        return $this->hasOne(Show::class, 'venue_id', 'id');
    }
}

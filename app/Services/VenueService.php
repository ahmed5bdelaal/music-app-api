<?php

namespace App\Services;

use App\Models\Venue;

class VenueService {
 
    public function store(array $venueData): Venue
    {
        $Venue = Venue::create($venueData);
  
        return $Venue;
    }
 
    public function update(array $venueData, Venue $venue)
    {
        $venue = $venue->update($venueData);
        
        return $venue;
    }

    public function show(Venue $venue)
    {
        return $venue;
    }

    public function index()
    {
        $venues = Venue::all();

        return $venues;
    }

    public function destroy($venue)
    {
        $ven = Venue::findOrfail($venue);


        if($ven->show)
        {
            $data = false;
        }else{
            
            $data = $ven->delete();
        }

        return $data;
    }

}
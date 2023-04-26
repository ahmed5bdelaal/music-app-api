<?php

namespace App\Services;

use App\Models\Artist;
use App\Models\Show;
use Exception;
use App\Http\Helpers\Helper;
use Illuminate\Support\Facades\File; 
use App\Models\Venue;
use App\Models\ArtistsShow;
use Illuminate\Http\Request;

class ShowService {
 
    public function store(array $artistsShow)
    {
        try { 
            if($artistsShow['photo']){
                $path='assets/uploads/shows';
                $filename=Helper::uplodePhoto($artistsShow['photo'],$path);
                $photo = $path.$filename;
            }         
            $show = Show::create([
                'name' => $artistsShow['name'],
                'description' => $artistsShow['description'],
                'venue_id' => $artistsShow['venue_id'],
                'photo' => $photo ,
            ]);
            foreach ($artistsShow['artist_id'] as $id) {
                ArtistsShow::create([
                    'show_id' => $show->id,
                    'artist_id' => $id,
                ]);
            }
            $fullShow=Show::with('artistsShow','venue')->findOrfail($show->id);
        } catch (Exception $e) {
            return $e->getMessage();
        }
       return $fullShow;
    }
 
    public function update(array $artistsShow)
    {
        $show = Show::findOrfail($artistsShow['show_id']);
        try {
            if(in_array('photo',$artistsShow)){
                $pathDelete = 'assets/uploads/shows/'.$show->photo;
                if(File::exists($pathDelete)){
                    File::delete($pathDelete);
                }
                $path='assets/uploads/artists';
                $filename=Helper::uplodePhoto($artistsShow['photo'],$path);
                $show->photo = $path.$filename;
            }
            $show->update([
                'name' => $artistsShow['name'],
                'description' => $artistsShow['description'],
                'venue_id' => $artistsShow['venue_id'],
                'photo' => $show->photo,
            ]);
            $fullShow=Show::with('artistsShow','venue')->findOrfail($show->id);
        } catch (Exception $e) {
            return $e->getMessage();
        }
       return $fullShow;
    }

    public function addArtist($artist_id,$show_id)
    {
        ArtistsShow::create([
            'show_id' => $show_id,
            'artist_id' => $artist_id,
        ]);

        return true;
    }

    public function changeVenue($show,$newVenue)
    {
        $show=Show::where('id',$show)->first();
        $show->venue_id = $newVenue;
        $show->save();

        return $show;
    }

    public function deleteArtist($artist_id,$show_id)
    {
        $artist=ArtistsShow::where('artist_id',$artist_id)->where('show_id',$show_id);
        $artist->delete();
        return true;
    }

    public function show(Show $show)
    {
        return $show->with('artistsShow','venue');
    }

    public function index()
    {
        $shows = Show::with('artistsShow','venue')->get();

        return $shows;
    }

    public function destroy($show)
    {
        $show = Show::findOrfail($show);
        try {
            if($show->photo){
                $path = 'assets/uploads/shows/'.$show->photo;
                if(File::exists($path)){
                    File::delete($path);
                }
            }
            foreach($show->artistsShow as $item){
                $item->delete();
            }
            $data=$show->delete();
        } catch (Exception $e) {
            return $e->getMessage();
        }
        return $data;
    }




}
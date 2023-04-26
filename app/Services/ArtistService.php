<?php

namespace App\Services;
use App\Http\Helpers\Helper;
use App\Models\Artist;
use Illuminate\Support\Facades\File; 

class ArtistService {
 
    public function store(array $artistData): Artist
    {
        if($artistData['photo']){
            $path='assets/uploads/artists';
            $filename=Helper::uplodePhoto($artistData['photo'],$path);
            $artistData['photo'] =$path.$filename;
        }
        
        $artist = Artist::create($artistData);
        
        return $artist;
    }
 
    public function update(array $artistData, Artist $artist)
    {
        if(in_array('photo',$artistData)){
            $pathDelete = 'assets/uploads/artists/'.$artist->photo;
            if(File::exists($pathDelete)){
                File::delete($pathDelete);
            }
            $path='assets/uploads/artists';
            $filename=Helper::uplodePhoto($artistData['photo'],$path);
            $artistData['photo'] = $path.$filename;
        }
        $artist = $artist->update($artistData);
        
        return $artist;
    }

    public function show(Artist $artist)
    {
        return $artist;
    }

    public function index()
    {
        $artists = Artist::all();

        return $artists;
    }

    public function destroy(Artist $artist)
    {
        if($artist->photo){
            $path = 'assets/uploads/artists/'.$artist->photo;
            if(File::exists($path)){
                File::delete($path);
            }
        }
        $data=$artist->delete();

        return $data;
    }

}
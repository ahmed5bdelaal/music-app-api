<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ArtistRequest;
use App\Http\Requests\ArtistUpdateRequest;
use App\Models\Artist;
use App\Services\ArtistService;

class ArtistController extends BaseController
{
    private ArtistService $artistService;
 
    public function __construct(ArtistService $artistService)
    {
        $this->artistService = $artistService;
    }

    public function store(ArtistRequest $request)
    {
       $data = $this->artistService->store($request->validated());

       return $this->sendResponse($data, 'true');
    }

    public function update(ArtistUpdateRequest $request,Artist $artist)
    {
       $data = $this->artistService->update($request->validated(),$artist);

       return $this->sendResponse($data, 'true');
    }

    public function index()
    {
       $data = $this->artistService->index();

       return $this->sendResponse($data, 'true');
    }

    public function show(Artist $artist)
    {
       $data = $this->artistService->show($artist);

       return $this->sendResponse($data, 'true');
    }

    public function destroy(Request $request)
    {
       $data = $this->artistService->destroy($request->artist_id);

       return $this->sendResponse($data, 'true');
    }
}

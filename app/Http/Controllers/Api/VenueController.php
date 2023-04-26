<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\VenueRequest;
use App\Models\Venue;
use App\Services\VenueService;
use Illuminate\Http\Request;

class VenueController extends BaseController
{
    private VenueService $VenueService;
 
    public function __construct(VenueService $VenueService)
    {
        $this->VenueService = $VenueService;
    }

    public function store(VenueRequest $request)
    {
       $data = $this->VenueService->store($request->validated());

       return $this->sendResponse($data, 'true');
    }

    public function update(VenueRequest $request,Venue $Venue)
    {
       $data = $this->VenueService->update($request->validated(),$Venue);

       return $this->sendResponse($data, 'true');
    }

    public function index()
    {
       $data = $this->VenueService->index();

       return $this->sendResponse($data, 'true');
    }

    public function show(Venue $Venue)
    {
       $data = $this->VenueService->show($Venue);

       return $this->sendResponse($data, 'true');
    }

    public function destroy(Request $request)
    {
       $data = $this->VenueService->destroy($request->venue_id);

       if(!$data)
       {
         return $this->sendError('you cannot delete venue if venue has show');
       }
       return $this->sendResponse($data, 'true');
    }
}

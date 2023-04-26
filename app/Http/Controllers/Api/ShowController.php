<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ShowRequest;
use App\Http\Requests\ShowUpdateRequest;
use App\Models\Show;
use App\Services\ShowService;
use Illuminate\Http\Request;

class ShowController extends BaseController
{
    private ShowService $showService;
 
    public function __construct(ShowService $showService)
    {
        $this->showService = $showService;
    }

    public function store(ShowRequest $request)
    {
       $data = $this->showService->store($request->validated());

       return $this->sendResponse($data, 'true');
    }

    public function update(ShowUpdateRequest $request,Show $show)
    {
       $data = $this->showService->update($request->validated(),$show);

       return $this->sendResponse($data, 'true');
    }

    public function index()
    {
       $data = $this->showService->index();

       return $this->sendResponse($data, 'true');
    }

    public function show(Show $show)
    {
       $data = $this->showService->show($show);

       return $this->sendResponse($data, 'true');
    }

    public function addArtist(Request $request)
    {
      $data = $this->showService->addArtist($request->artist_id,$request->show_id);

       return $this->sendResponse($data, 'true');
    }

    public function changeVenue(Request $request)
    {
      $data = $this->showService->changeVenue($request->show,$request->newVenue);

      return $this->sendResponse($data, 'true');
    }

    public function deleteArtist(Request $request)
    {
      $data = $this->showService->deleteArtist($request->artist_id,$request->show_id);

       return $this->sendResponse($data, 'true');
    }

    public function destroy($show)
    {
       $data = $this->showService->destroy($show);

       return $this->sendResponse($data, 'true');
    }
}

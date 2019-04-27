<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatepresencesAPIRequest;
use App\Http\Requests\API\UpdatepresencesAPIRequest;
use App\Models\presences;
use App\Repositories\presencesRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class presencesController
 * @package App\Http\Controllers\API
 */

class presencesAPIController extends AppBaseController
{
    /** @var  presencesRepository */
    private $presencesRepository;

    public function __construct(presencesRepository $presencesRepo)
    {
        $this->presencesRepository = $presencesRepo;
    }

    /**
     * Display a listing of the presences.
     * GET|HEAD /presences
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $presences = $this->presencesRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($presences->toArray(), 'Presences retrieved successfully');
    }

    /**
     * Store a newly created presences in storage.
     * POST /presences
     *
     * @param CreatepresencesAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatepresencesAPIRequest $request)
    {
        $input = $request->all();

        $presences = $this->presencesRepository->create($input);

        return $this->sendResponse($presences->toArray(), 'Presences saved successfully');
    }

    /**
     * Display the specified presences.
     * GET|HEAD /presences/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var presences $presences */
        $presences = $this->presencesRepository->find($id);

        if (empty($presences)) {
            return $this->sendError('Presences not found');
        }

        return $this->sendResponse($presences->toArray(), 'Presences retrieved successfully');
    }

    /**
     * Update the specified presences in storage.
     * PUT/PATCH /presences/{id}
     *
     * @param int $id
     * @param UpdatepresencesAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatepresencesAPIRequest $request)
    {
        $input = $request->all();

        /** @var presences $presences */
        $presences = $this->presencesRepository->find($id);

        if (empty($presences)) {
            return $this->sendError('Presences not found');
        }

        $presences = $this->presencesRepository->update($input, $id);

        return $this->sendResponse($presences->toArray(), 'presences updated successfully');
    }

    /**
     * Remove the specified presences from storage.
     * DELETE /presences/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var presences $presences */
        $presences = $this->presencesRepository->find($id);

        if (empty($presences)) {
            return $this->sendError('Presences not found');
        }

        $presences->delete();

        return $this->sendResponse($id, 'Presences deleted successfully');
    }
}

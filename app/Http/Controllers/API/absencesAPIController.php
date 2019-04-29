<?php

namespace NdaartuAPI\Http\Controllers\API;

use NdaartuAPI\Http\Requests\API\CreateabsencesAPIRequest;
use NdaartuAPI\Http\Requests\API\UpdateabsencesAPIRequest;
use NdaartuAPI\Models\absences;
use NdaartuAPI\Repositories\absencesRepository;
use Illuminate\Http\Request;
use NdaartuAPI\Http\Controllers\AppBaseController;
use Response;

/**
 * Class absencesController
 * @package NdaartuAPI\Http\Controllers\API
 */

class absencesAPIController extends AppBaseController
{
    /** @var  absencesRepository */
    private $absencesRepository;

    public function __construct(absencesRepository $absencesRepo)
    {
        $this->absencesRepository = $absencesRepo;
    }

    /**
     * Display a listing of the absences.
     * GET|HEAD /absences
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $absences = $this->absencesRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($absences->toArray(), 'Absences retrieved successfully');
    }

    /**
     * Store a newly created absences in storage.
     * POST /absences
     *
     * @param CreateabsencesAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateabsencesAPIRequest $request)
    {
        $input = $request->all();

        $absences = $this->absencesRepository->create($input);

        return $this->sendResponse($absences->toArray(), 'Absences saved successfully');
    }

    /**
     * Display the specified absences.
     * GET|HEAD /absences/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var absences $absences */
        $absences = $this->absencesRepository->find($id);

        if (empty($absences)) {
            return $this->sendError('Absences not found');
        }

        return $this->sendResponse($absences->toArray(), 'Absences retrieved successfully');
    }

    /**
     * Update the specified absences in storage.
     * PUT/PATCH /absences/{id}
     *
     * @param int $id
     * @param UpdateabsencesAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateabsencesAPIRequest $request)
    {
        $input = $request->all();

        /** @var absences $absences */
        $absences = $this->absencesRepository->find($id);

        if (empty($absences)) {
            return $this->sendError('Absences not found');
        }

        $absences = $this->absencesRepository->update($input, $id);

        return $this->sendResponse($absences->toArray(), 'absences updated successfully');
    }

    /**
     * Remove the specified absences from storage.
     * DELETE /absences/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var absences $absences */
        $absences = $this->absencesRepository->find($id);

        if (empty($absences)) {
            return $this->sendError('Absences not found');
        }

        $absences->delete();

        return $this->sendResponse($id, 'Absences deleted successfully');
    }
}

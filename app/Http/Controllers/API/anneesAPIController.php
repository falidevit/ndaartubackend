<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateanneesAPIRequest;
use App\Http\Requests\API\UpdateanneesAPIRequest;
use App\Models\annees;
use App\Repositories\anneesRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class anneesController
 * @package App\Http\Controllers\API
 */

class anneesAPIController extends AppBaseController
{
    /** @var  anneesRepository */
    private $anneesRepository;

    public function __construct(anneesRepository $anneesRepo)
    {
        $this->anneesRepository = $anneesRepo;
    }

    /**
     * Display a listing of the annees.
     * GET|HEAD /annees
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $annees = $this->anneesRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($annees->toArray(), 'Annees retrieved successfully');
    }

    /**
     * Store a newly created annees in storage.
     * POST /annees
     *
     * @param CreateanneesAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateanneesAPIRequest $request)
    {
        $input = $request->all();

        $annees = $this->anneesRepository->create($input);

        return $this->sendResponse($annees->toArray(), 'Annees saved successfully');
    }

    /**
     * Display the specified annees.
     * GET|HEAD /annees/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var annees $annees */
        $annees = $this->anneesRepository->find($id);

        if (empty($annees)) {
            return $this->sendError('Annees not found');
        }

        return $this->sendResponse($annees->toArray(), 'Annees retrieved successfully');
    }

    /**
     * Update the specified annees in storage.
     * PUT/PATCH /annees/{id}
     *
     * @param int $id
     * @param UpdateanneesAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateanneesAPIRequest $request)
    {
        $input = $request->all();

        /** @var annees $annees */
        $annees = $this->anneesRepository->find($id);

        if (empty($annees)) {
            return $this->sendError('Annees not found');
        }

        $annees = $this->anneesRepository->update($input, $id);

        return $this->sendResponse($annees->toArray(), 'annees updated successfully');
    }

    /**
     * Remove the specified annees from storage.
     * DELETE /annees/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var annees $annees */
        $annees = $this->anneesRepository->find($id);

        if (empty($annees)) {
            return $this->sendError('Annees not found');
        }

        $annees->delete();

        return $this->sendResponse($id, 'Annees deleted successfully');
    }
}

<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateetablissementsAPIRequest;
use App\Http\Requests\API\UpdateetablissementsAPIRequest;
use App\Models\etablissements;
use App\Repositories\etablissementsRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class etablissementsController
 * @package App\Http\Controllers\API
 */

class etablissementsAPIController extends AppBaseController
{
    /** @var  etablissementsRepository */
    private $etablissementsRepository;

    public function __construct(etablissementsRepository $etablissementsRepo)
    {
        $this->etablissementsRepository = $etablissementsRepo;
    }

    /**
     * Display a listing of the etablissements.
     * GET|HEAD /etablissements
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $etablissements = $this->etablissementsRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($etablissements->toArray(), 'Etablissements retrieved successfully');
    }

    /**
     * Store a newly created etablissements in storage.
     * POST /etablissements
     *
     * @param CreateetablissementsAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateetablissementsAPIRequest $request)
    {
        $input = $request->all();

        $etablissements = $this->etablissementsRepository->create($input);

        return $this->sendResponse($etablissements->toArray(), 'Etablissements saved successfully');
    }

    /**
     * Display the specified etablissements.
     * GET|HEAD /etablissements/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var etablissements $etablissements */
        $etablissements = $this->etablissementsRepository->find($id);

        if (empty($etablissements)) {
            return $this->sendError('Etablissements not found');
        }

        return $this->sendResponse($etablissements->toArray(), 'Etablissements retrieved successfully');
    }

    /**
     * Update the specified etablissements in storage.
     * PUT/PATCH /etablissements/{id}
     *
     * @param int $id
     * @param UpdateetablissementsAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateetablissementsAPIRequest $request)
    {
        $input = $request->all();

        /** @var etablissements $etablissements */
        $etablissements = $this->etablissementsRepository->find($id);

        if (empty($etablissements)) {
            return $this->sendError('Etablissements not found');
        }

        $etablissements = $this->etablissementsRepository->update($input, $id);

        return $this->sendResponse($etablissements->toArray(), 'etablissements updated successfully');
    }

    /**
     * Remove the specified etablissements from storage.
     * DELETE /etablissements/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var etablissements $etablissements */
        $etablissements = $this->etablissementsRepository->find($id);

        if (empty($etablissements)) {
            return $this->sendError('Etablissements not found');
        }

        $etablissements->delete();

        return $this->sendResponse($id, 'Etablissements deleted successfully');
    }
}

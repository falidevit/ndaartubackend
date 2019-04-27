<?php

namespace NdarrtuAPI\Http\Controllers\API;

use NdarrtuAPI\Http\Requests\API\CreatematieresAPIRequest;
use NdarrtuAPI\Http\Requests\API\UpdatematieresAPIRequest;
use NdarrtuAPI\Models\matieres;
use NdarrtuAPI\Repositories\matieresRepository;
use Illuminate\Http\Request;
use NdarrtuAPI\Http\Controllers\AppBaseController;
use Response;

/**
 * Class matieresController
 * @package NdarrtuAPI\Http\Controllers\API
 */

class matieresAPIController extends AppBaseController
{
    /** @var  matieresRepository */
    private $matieresRepository;

    public function __construct(matieresRepository $matieresRepo)
    {
        $this->matieresRepository = $matieresRepo;
    }

    /**
     * Display a listing of the matieres.
     * GET|HEAD /matieres
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $matieres = $this->matieresRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($matieres->toArray(), 'Matieres retrieved successfully');
    }

    /**
     * Store a newly created matieres in storage.
     * POST /matieres
     *
     * @param CreatematieresAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatematieresAPIRequest $request)
    {
        $input = $request->all();

        $matieres = $this->matieresRepository->create($input);

        return $this->sendResponse($matieres->toArray(), 'Matieres saved successfully');
    }

    /**
     * Display the specified matieres.
     * GET|HEAD /matieres/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var matieres $matieres */
        $matieres = $this->matieresRepository->find($id);

        if (empty($matieres)) {
            return $this->sendError('Matieres not found');
        }

        return $this->sendResponse($matieres->toArray(), 'Matieres retrieved successfully');
    }

    /**
     * Update the specified matieres in storage.
     * PUT/PATCH /matieres/{id}
     *
     * @param int $id
     * @param UpdatematieresAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatematieresAPIRequest $request)
    {
        $input = $request->all();

        /** @var matieres $matieres */
        $matieres = $this->matieresRepository->find($id);

        if (empty($matieres)) {
            return $this->sendError('Matieres not found');
        }

        $matieres = $this->matieresRepository->update($input, $id);

        return $this->sendResponse($matieres->toArray(), 'matieres updated successfully');
    }

    /**
     * Remove the specified matieres from storage.
     * DELETE /matieres/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var matieres $matieres */
        $matieres = $this->matieresRepository->find($id);

        if (empty($matieres)) {
            return $this->sendError('Matieres not found');
        }

        $matieres->delete();

        return $this->sendResponse($id, 'Matieres deleted successfully');
    }
}

<?php

namespace NdarrtuAPI\Http\Controllers\API;

use NdarrtuAPI\Http\Requests\API\CreatejustificationsAPIRequest;
use NdarrtuAPI\Http\Requests\API\UpdatejustificationsAPIRequest;
use NdarrtuAPI\Models\justifications;
use NdarrtuAPI\Repositories\justificationsRepository;
use Illuminate\Http\Request;
use NdarrtuAPI\Http\Controllers\AppBaseController;
use Response;

/**
 * Class justificationsController
 * @package NdarrtuAPI\Http\Controllers\API
 */

class justificationsAPIController extends AppBaseController
{
    /** @var  justificationsRepository */
    private $justificationsRepository;

    public function __construct(justificationsRepository $justificationsRepo)
    {
        $this->justificationsRepository = $justificationsRepo;
    }

    /**
     * Display a listing of the justifications.
     * GET|HEAD /justifications
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $justifications = $this->justificationsRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($justifications->toArray(), 'Justifications retrieved successfully');
    }

    /**
     * Store a newly created justifications in storage.
     * POST /justifications
     *
     * @param CreatejustificationsAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatejustificationsAPIRequest $request)
    {
        $input = $request->all();

        $justifications = $this->justificationsRepository->create($input);

        return $this->sendResponse($justifications->toArray(), 'Justifications saved successfully');
    }

    /**
     * Display the specified justifications.
     * GET|HEAD /justifications/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var justifications $justifications */
        $justifications = $this->justificationsRepository->find($id);

        if (empty($justifications)) {
            return $this->sendError('Justifications not found');
        }

        return $this->sendResponse($justifications->toArray(), 'Justifications retrieved successfully');
    }

    /**
     * Update the specified justifications in storage.
     * PUT/PATCH /justifications/{id}
     *
     * @param int $id
     * @param UpdatejustificationsAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatejustificationsAPIRequest $request)
    {
        $input = $request->all();

        /** @var justifications $justifications */
        $justifications = $this->justificationsRepository->find($id);

        if (empty($justifications)) {
            return $this->sendError('Justifications not found');
        }

        $justifications = $this->justificationsRepository->update($input, $id);

        return $this->sendResponse($justifications->toArray(), 'justifications updated successfully');
    }

    /**
     * Remove the specified justifications from storage.
     * DELETE /justifications/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var justifications $justifications */
        $justifications = $this->justificationsRepository->find($id);

        if (empty($justifications)) {
            return $this->sendError('Justifications not found');
        }

        $justifications->delete();

        return $this->sendResponse($id, 'Justifications deleted successfully');
    }
}

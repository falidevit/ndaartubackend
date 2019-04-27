<?php

namespace NdarrtuAPI\Http\Controllers\API;

use NdarrtuAPI\Http\Requests\API\Createusers_matieresAPIRequest;
use NdarrtuAPI\Http\Requests\API\Updateusers_matieresAPIRequest;
use NdarrtuAPI\Models\users_matieres;
use NdarrtuAPI\Repositories\users_matieresRepository;
use Illuminate\Http\Request;
use NdarrtuAPI\Http\Controllers\AppBaseController;
use Response;

/**
 * Class users_matieresController
 * @package NdarrtuAPI\Http\Controllers\API
 */

class users_matieresAPIController extends AppBaseController
{
    /** @var  users_matieresRepository */
    private $usersMatieresRepository;

    public function __construct(users_matieresRepository $usersMatieresRepo)
    {
        $this->usersMatieresRepository = $usersMatieresRepo;
    }

    /**
     * Display a listing of the users_matieres.
     * GET|HEAD /usersMatieres
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $usersMatieres = $this->usersMatieresRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($usersMatieres->toArray(), 'Users Matieres retrieved successfully');
    }

    /**
     * Store a newly created users_matieres in storage.
     * POST /usersMatieres
     *
     * @param Createusers_matieresAPIRequest $request
     *
     * @return Response
     */
    public function store(Createusers_matieresAPIRequest $request)
    {
        $input = $request->all();

        $usersMatieres = $this->usersMatieresRepository->create($input);

        return $this->sendResponse($usersMatieres->toArray(), 'Users Matieres saved successfully');
    }

    /**
     * Display the specified users_matieres.
     * GET|HEAD /usersMatieres/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var users_matieres $usersMatieres */
        $usersMatieres = $this->usersMatieresRepository->find($id);

        if (empty($usersMatieres)) {
            return $this->sendError('Users Matieres not found');
        }

        return $this->sendResponse($usersMatieres->toArray(), 'Users Matieres retrieved successfully');
    }

    /**
     * Update the specified users_matieres in storage.
     * PUT/PATCH /usersMatieres/{id}
     *
     * @param int $id
     * @param Updateusers_matieresAPIRequest $request
     *
     * @return Response
     */
    public function update($id, Updateusers_matieresAPIRequest $request)
    {
        $input = $request->all();

        /** @var users_matieres $usersMatieres */
        $usersMatieres = $this->usersMatieresRepository->find($id);

        if (empty($usersMatieres)) {
            return $this->sendError('Users Matieres not found');
        }

        $usersMatieres = $this->usersMatieresRepository->update($input, $id);

        return $this->sendResponse($usersMatieres->toArray(), 'users_matieres updated successfully');
    }

    /**
     * Remove the specified users_matieres from storage.
     * DELETE /usersMatieres/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var users_matieres $usersMatieres */
        $usersMatieres = $this->usersMatieresRepository->find($id);

        if (empty($usersMatieres)) {
            return $this->sendError('Users Matieres not found');
        }

        $usersMatieres->delete();

        return $this->sendResponse($id, 'Users Matieres deleted successfully');
    }
}

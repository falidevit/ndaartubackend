<?php

namespace NdarrtuAPI\Http\Controllers;

use NdarrtuAPI\Http\Requests\Createusers_matieresRequest;
use NdarrtuAPI\Http\Requests\Updateusers_matieresRequest;
use NdarrtuAPI\Repositories\users_matieresRepository;
use NdarrtuAPI\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class users_matieresController extends AppBaseController
{
    /** @var  users_matieresRepository */
    private $usersMatieresRepository;

    public function __construct(users_matieresRepository $usersMatieresRepo)
    {
        $this->usersMatieresRepository = $usersMatieresRepo;
    }

    /**
     * Display a listing of the users_matieres.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $usersMatieres = $this->usersMatieresRepository->all();

        return view('users_matieres.index')
            ->with('usersMatieres', $usersMatieres);
    }

    /**
     * Show the form for creating a new users_matieres.
     *
     * @return Response
     */
    public function create()
    {
        return view('users_matieres.create');
    }

    /**
     * Store a newly created users_matieres in storage.
     *
     * @param Createusers_matieresRequest $request
     *
     * @return Response
     */
    public function store(Createusers_matieresRequest $request)
    {
        $input = $request->all();

        $usersMatieres = $this->usersMatieresRepository->create($input);

        Flash::success('Users Matieres saved successfully.');

        return redirect(route('usersMatieres.index'));
    }

    /**
     * Display the specified users_matieres.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $usersMatieres = $this->usersMatieresRepository->find($id);

        if (empty($usersMatieres)) {
            Flash::error('Users Matieres not found');

            return redirect(route('usersMatieres.index'));
        }

        return view('users_matieres.show')->with('usersMatieres', $usersMatieres);
    }

    /**
     * Show the form for editing the specified users_matieres.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $usersMatieres = $this->usersMatieresRepository->find($id);

        if (empty($usersMatieres)) {
            Flash::error('Users Matieres not found');

            return redirect(route('usersMatieres.index'));
        }

        return view('users_matieres.edit')->with('usersMatieres', $usersMatieres);
    }

    /**
     * Update the specified users_matieres in storage.
     *
     * @param int $id
     * @param Updateusers_matieresRequest $request
     *
     * @return Response
     */
    public function update($id, Updateusers_matieresRequest $request)
    {
        $usersMatieres = $this->usersMatieresRepository->find($id);

        if (empty($usersMatieres)) {
            Flash::error('Users Matieres not found');

            return redirect(route('usersMatieres.index'));
        }

        $usersMatieres = $this->usersMatieresRepository->update($request->all(), $id);

        Flash::success('Users Matieres updated successfully.');

        return redirect(route('usersMatieres.index'));
    }

    /**
     * Remove the specified users_matieres from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $usersMatieres = $this->usersMatieresRepository->find($id);

        if (empty($usersMatieres)) {
            Flash::error('Users Matieres not found');

            return redirect(route('usersMatieres.index'));
        }

        $this->usersMatieresRepository->delete($id);

        Flash::success('Users Matieres deleted successfully.');

        return redirect(route('usersMatieres.index'));
    }
}

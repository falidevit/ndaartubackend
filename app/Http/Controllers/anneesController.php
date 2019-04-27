<?php

namespace NdarrtuAPI\Http\Controllers;

use NdarrtuAPI\Http\Requests\CreateanneesRequest;
use NdarrtuAPI\Http\Requests\UpdateanneesRequest;
use NdarrtuAPI\Repositories\anneesRepository;
use NdarrtuAPI\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class anneesController extends AppBaseController
{
    /** @var  anneesRepository */
    private $anneesRepository;

    public function __construct(anneesRepository $anneesRepo)
    {
        $this->anneesRepository = $anneesRepo;
    }

    /**
     * Display a listing of the annees.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $annees = $this->anneesRepository->all();

        return view('annees.index')
            ->with('annees', $annees);
    }

    /**
     * Show the form for creating a new annees.
     *
     * @return Response
     */
    public function create()
    {
        return view('annees.create');
    }

    /**
     * Store a newly created annees in storage.
     *
     * @param CreateanneesRequest $request
     *
     * @return Response
     */
    public function store(CreateanneesRequest $request)
    {
        $input = $request->all();

        $annees = $this->anneesRepository->create($input);

        Flash::success('Annees saved successfully.');

        return redirect(route('annees.index'));
    }

    /**
     * Display the specified annees.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $annees = $this->anneesRepository->find($id);

        if (empty($annees)) {
            Flash::error('Annees not found');

            return redirect(route('annees.index'));
        }

        return view('annees.show')->with('annees', $annees);
    }

    /**
     * Show the form for editing the specified annees.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $annees = $this->anneesRepository->find($id);

        if (empty($annees)) {
            Flash::error('Annees not found');

            return redirect(route('annees.index'));
        }

        return view('annees.edit')->with('annees', $annees);
    }

    /**
     * Update the specified annees in storage.
     *
     * @param int $id
     * @param UpdateanneesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateanneesRequest $request)
    {
        $annees = $this->anneesRepository->find($id);

        if (empty($annees)) {
            Flash::error('Annees not found');

            return redirect(route('annees.index'));
        }

        $annees = $this->anneesRepository->update($request->all(), $id);

        Flash::success('Annees updated successfully.');

        return redirect(route('annees.index'));
    }

    /**
     * Remove the specified annees from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $annees = $this->anneesRepository->find($id);

        if (empty($annees)) {
            Flash::error('Annees not found');

            return redirect(route('annees.index'));
        }

        $this->anneesRepository->delete($id);

        Flash::success('Annees deleted successfully.');

        return redirect(route('annees.index'));
    }
}

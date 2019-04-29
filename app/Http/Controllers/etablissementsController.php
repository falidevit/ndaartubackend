<?php

namespace NdaartuAPI\Http\Controllers;

use NdaartuAPI\Http\Requests\CreateetablissementsRequest;
use NdaartuAPI\Http\Requests\UpdateetablissementsRequest;
use NdaartuAPI\Repositories\etablissementsRepository;
use NdaartuAPI\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class etablissementsController extends AppBaseController
{
    /** @var  etablissementsRepository */
    private $etablissementsRepository;

    public function __construct(etablissementsRepository $etablissementsRepo)
    {
        $this->etablissementsRepository = $etablissementsRepo;
    }

    /**
     * Display a listing of the etablissements.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $etablissements = $this->etablissementsRepository->all();

        return view('etablissements.index')
            ->with('etablissements', $etablissements);
    }

    /**
     * Show the form for creating a new etablissements.
     *
     * @return Response
     */
    public function create()
    {
        return view('etablissements.create');
    }

    /**
     * Store a newly created etablissements in storage.
     *
     * @param CreateetablissementsRequest $request
     *
     * @return Response
     */
    public function store(CreateetablissementsRequest $request)
    {
        $input = $request->all();

        $etablissements = $this->etablissementsRepository->create($input);

        Flash::success('Etablissements saved successfully.');

        return redirect(route('etablissements.index'));
    }

    /**
     * Display the specified etablissements.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $etablissements = $this->etablissementsRepository->find($id);

        if (empty($etablissements)) {
            Flash::error('Etablissements not found');

            return redirect(route('etablissements.index'));
        }

        return view('etablissements.show')->with('etablissements', $etablissements);
    }

    /**
     * Show the form for editing the specified etablissements.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $etablissements = $this->etablissementsRepository->find($id);

        if (empty($etablissements)) {
            Flash::error('Etablissements not found');

            return redirect(route('etablissements.index'));
        }

        return view('etablissements.edit')->with('etablissements', $etablissements);
    }

    /**
     * Update the specified etablissements in storage.
     *
     * @param int $id
     * @param UpdateetablissementsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateetablissementsRequest $request)
    {
        $etablissements = $this->etablissementsRepository->find($id);

        if (empty($etablissements)) {
            Flash::error('Etablissements not found');

            return redirect(route('etablissements.index'));
        }

        $etablissements = $this->etablissementsRepository->update($request->all(), $id);

        Flash::success('Etablissements updated successfully.');

        return redirect(route('etablissements.index'));
    }

    /**
     * Remove the specified etablissements from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $etablissements = $this->etablissementsRepository->find($id);

        if (empty($etablissements)) {
            Flash::error('Etablissements not found');

            return redirect(route('etablissements.index'));
        }

        $this->etablissementsRepository->delete($id);

        Flash::success('Etablissements deleted successfully.');

        return redirect(route('etablissements.index'));
    }
}

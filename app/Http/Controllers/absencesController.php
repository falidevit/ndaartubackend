<?php

namespace NdaartuAPI\Http\Controllers;

use NdaartuAPI\Http\Requests\CreateabsencesRequest;
use NdaartuAPI\Http\Requests\UpdateabsencesRequest;
use NdaartuAPI\Repositories\absencesRepository;
use NdaartuAPI\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class absencesController extends AppBaseController
{
    /** @var  absencesRepository */
    private $absencesRepository;

    public function __construct(absencesRepository $absencesRepo)
    {
        $this->absencesRepository = $absencesRepo;
    }

    /**
     * Display a listing of the absences.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $absences = $this->absencesRepository->all();

        return view('absences.index')
            ->with('absences', $absences);
    }

    /**
     * Show the form for creating a new absences.
     *
     * @return Response
     */
    public function create()
    {
        return view('absences.create');
    }

    /**
     * Store a newly created absences in storage.
     *
     * @param CreateabsencesRequest $request
     *
     * @return Response
     */
    public function store(CreateabsencesRequest $request)
    {
        $input = $request->all();

        $absences = $this->absencesRepository->create($input);

        Flash::success('Absences saved successfully.');

        return redirect(route('absences.index'));
    }

    /**
     * Display the specified absences.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $absences = $this->absencesRepository->find($id);

        if (empty($absences)) {
            Flash::error('Absences not found');

            return redirect(route('absences.index'));
        }

        return view('absences.show')->with('absences', $absences);
    }

    /**
     * Show the form for editing the specified absences.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $absences = $this->absencesRepository->find($id);

        if (empty($absences)) {
            Flash::error('Absences not found');

            return redirect(route('absences.index'));
        }

        return view('absences.edit')->with('absences', $absences);
    }

    /**
     * Update the specified absences in storage.
     *
     * @param int $id
     * @param UpdateabsencesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateabsencesRequest $request)
    {
        $absences = $this->absencesRepository->find($id);

        if (empty($absences)) {
            Flash::error('Absences not found');

            return redirect(route('absences.index'));
        }

        $absences = $this->absencesRepository->update($request->all(), $id);

        Flash::success('Absences updated successfully.');

        return redirect(route('absences.index'));
    }

    /**
     * Remove the specified absences from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $absences = $this->absencesRepository->find($id);

        if (empty($absences)) {
            Flash::error('Absences not found');

            return redirect(route('absences.index'));
        }

        $this->absencesRepository->delete($id);

        Flash::success('Absences deleted successfully.');

        return redirect(route('absences.index'));
    }
}

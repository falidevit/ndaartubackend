<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatepresencesRequest;
use App\Http\Requests\UpdatepresencesRequest;
use App\Repositories\presencesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class presencesController extends AppBaseController
{
    /** @var  presencesRepository */
    private $presencesRepository;

    public function __construct(presencesRepository $presencesRepo)
    {
        $this->presencesRepository = $presencesRepo;
    }

    /**
     * Display a listing of the presences.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $presences = $this->presencesRepository->all();

        return view('presences.index')
            ->with('presences', $presences);
    }

    /**
     * Show the form for creating a new presences.
     *
     * @return Response
     */
    public function create()
    {
        return view('presences.create');
    }

    /**
     * Store a newly created presences in storage.
     *
     * @param CreatepresencesRequest $request
     *
     * @return Response
     */
    public function store(CreatepresencesRequest $request)
    {
        $input = $request->all();

        $presences = $this->presencesRepository->create($input);

        Flash::success('Presences saved successfully.');

        return redirect(route('presences.index'));
    }

    /**
     * Display the specified presences.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $presences = $this->presencesRepository->find($id);

        if (empty($presences)) {
            Flash::error('Presences not found');

            return redirect(route('presences.index'));
        }

        return view('presences.show')->with('presences', $presences);
    }

    /**
     * Show the form for editing the specified presences.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $presences = $this->presencesRepository->find($id);

        if (empty($presences)) {
            Flash::error('Presences not found');

            return redirect(route('presences.index'));
        }

        return view('presences.edit')->with('presences', $presences);
    }

    /**
     * Update the specified presences in storage.
     *
     * @param int $id
     * @param UpdatepresencesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatepresencesRequest $request)
    {
        $presences = $this->presencesRepository->find($id);

        if (empty($presences)) {
            Flash::error('Presences not found');

            return redirect(route('presences.index'));
        }

        $presences = $this->presencesRepository->update($request->all(), $id);

        Flash::success('Presences updated successfully.');

        return redirect(route('presences.index'));
    }

    /**
     * Remove the specified presences from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $presences = $this->presencesRepository->find($id);

        if (empty($presences)) {
            Flash::error('Presences not found');

            return redirect(route('presences.index'));
        }

        $this->presencesRepository->delete($id);

        Flash::success('Presences deleted successfully.');

        return redirect(route('presences.index'));
    }
}

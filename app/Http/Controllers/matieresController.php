<?php

namespace NdarrtuAPI\Http\Controllers;

use NdarrtuAPI\Http\Requests\CreatematieresRequest;
use NdarrtuAPI\Http\Requests\UpdatematieresRequest;
use NdarrtuAPI\Repositories\matieresRepository;
use NdarrtuAPI\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class matieresController extends AppBaseController
{
    /** @var  matieresRepository */
    private $matieresRepository;

    public function __construct(matieresRepository $matieresRepo)
    {
        $this->matieresRepository = $matieresRepo;
    }

    /**
     * Display a listing of the matieres.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $matieres = $this->matieresRepository->all();

        return view('matieres.index')
            ->with('matieres', $matieres);
    }

    /**
     * Show the form for creating a new matieres.
     *
     * @return Response
     */
    public function create()
    {
        return view('matieres.create');
    }

    /**
     * Store a newly created matieres in storage.
     *
     * @param CreatematieresRequest $request
     *
     * @return Response
     */
    public function store(CreatematieresRequest $request)
    {
        $input = $request->all();

        $matieres = $this->matieresRepository->create($input);

        Flash::success('Matieres saved successfully.');

        return redirect(route('matieres.index'));
    }

    /**
     * Display the specified matieres.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $matieres = $this->matieresRepository->find($id);

        if (empty($matieres)) {
            Flash::error('Matieres not found');

            return redirect(route('matieres.index'));
        }

        return view('matieres.show')->with('matieres', $matieres);
    }

    /**
     * Show the form for editing the specified matieres.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $matieres = $this->matieresRepository->find($id);

        if (empty($matieres)) {
            Flash::error('Matieres not found');

            return redirect(route('matieres.index'));
        }

        return view('matieres.edit')->with('matieres', $matieres);
    }

    /**
     * Update the specified matieres in storage.
     *
     * @param int $id
     * @param UpdatematieresRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatematieresRequest $request)
    {
        $matieres = $this->matieresRepository->find($id);

        if (empty($matieres)) {
            Flash::error('Matieres not found');

            return redirect(route('matieres.index'));
        }

        $matieres = $this->matieresRepository->update($request->all(), $id);

        Flash::success('Matieres updated successfully.');

        return redirect(route('matieres.index'));
    }

    /**
     * Remove the specified matieres from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $matieres = $this->matieresRepository->find($id);

        if (empty($matieres)) {
            Flash::error('Matieres not found');

            return redirect(route('matieres.index'));
        }

        $this->matieresRepository->delete($id);

        Flash::success('Matieres deleted successfully.');

        return redirect(route('matieres.index'));
    }
}

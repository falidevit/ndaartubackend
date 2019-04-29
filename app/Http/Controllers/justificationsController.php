<?php

namespace NdaartuAPI\Http\Controllers;

use NdaartuAPI\Http\Requests\CreatejustificationsRequest;
use NdaartuAPI\Http\Requests\UpdatejustificationsRequest;
use NdaartuAPI\Repositories\justificationsRepository;
use NdaartuAPI\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class justificationsController extends AppBaseController
{
    /** @var  justificationsRepository */
    private $justificationsRepository;

    public function __construct(justificationsRepository $justificationsRepo)
    {
        $this->justificationsRepository = $justificationsRepo;
    }

    /**
     * Display a listing of the justifications.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $justifications = $this->justificationsRepository->all();

        return view('justifications.index')
            ->with('justifications', $justifications);
    }

    /**
     * Show the form for creating a new justifications.
     *
     * @return Response
     */
    public function create()
    {
        return view('justifications.create');
    }

    /**
     * Store a newly created justifications in storage.
     *
     * @param CreatejustificationsRequest $request
     *
     * @return Response
     */
    public function store(CreatejustificationsRequest $request)
    {
        $input = $request->all();

        $justifications = $this->justificationsRepository->create($input);

        Flash::success('Justifications saved successfully.');

        return redirect(route('justifications.index'));
    }

    /**
     * Display the specified justifications.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $justifications = $this->justificationsRepository->find($id);

        if (empty($justifications)) {
            Flash::error('Justifications not found');

            return redirect(route('justifications.index'));
        }

        return view('justifications.show')->with('justifications', $justifications);
    }

    /**
     * Show the form for editing the specified justifications.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $justifications = $this->justificationsRepository->find($id);

        if (empty($justifications)) {
            Flash::error('Justifications not found');

            return redirect(route('justifications.index'));
        }

        return view('justifications.edit')->with('justifications', $justifications);
    }

    /**
     * Update the specified justifications in storage.
     *
     * @param int $id
     * @param UpdatejustificationsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatejustificationsRequest $request)
    {
        $justifications = $this->justificationsRepository->find($id);

        if (empty($justifications)) {
            Flash::error('Justifications not found');

            return redirect(route('justifications.index'));
        }

        $justifications = $this->justificationsRepository->update($request->all(), $id);

        Flash::success('Justifications updated successfully.');

        return redirect(route('justifications.index'));
    }

    /**
     * Remove the specified justifications from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $justifications = $this->justificationsRepository->find($id);

        if (empty($justifications)) {
            Flash::error('Justifications not found');

            return redirect(route('justifications.index'));
        }

        $this->justificationsRepository->delete($id);

        Flash::success('Justifications deleted successfully.');

        return redirect(route('justifications.index'));
    }
}

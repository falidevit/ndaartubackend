<?php

namespace NdarrtuAPI\Http\Controllers\API;

use NdarrtuAPI\Http\Requests\API\CreateclassesAPIRequest;
use NdarrtuAPI\Http\Requests\API\UpdateclassesAPIRequest;
use NdarrtuAPI\Models\classes;
use NdarrtuAPI\Repositories\classesRepository;
use Illuminate\Http\Request;
use NdarrtuAPI\Http\Controllers\AppBaseController;
use Response;

/**
 * Class classesController
 * @package NdarrtuAPI\Http\Controllers\API
 */

class classesAPIController extends AppBaseController
{
    /** @var  classesRepository */
    private $classesRepository;

    public function __construct(classesRepository $classesRepo)
    {
        $this->classesRepository = $classesRepo;
    }

    /**
     * Display a listing of the classes.
     * GET|HEAD /classes
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $classes = $this->classesRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($classes->toArray(), 'Classes retrieved successfully');
    }

    /**
     * Store a newly created classes in storage.
     * POST /classes
     *
     * @param CreateclassesAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateclassesAPIRequest $request)
    {
        $input = $request->all();

        $classes = $this->classesRepository->create($input);

        return $this->sendResponse($classes->toArray(), 'Classes saved successfully');
    }

    /**
     * Display the specified classes.
     * GET|HEAD /classes/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var classes $classes */
        $classes = $this->classesRepository->find($id);

        if (empty($classes)) {
            return $this->sendError('Classes not found');
        }

        return $this->sendResponse($classes->toArray(), 'Classes retrieved successfully');
    }

    /**
     * Update the specified classes in storage.
     * PUT/PATCH /classes/{id}
     *
     * @param int $id
     * @param UpdateclassesAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateclassesAPIRequest $request)
    {
        $input = $request->all();

        /** @var classes $classes */
        $classes = $this->classesRepository->find($id);

        if (empty($classes)) {
            return $this->sendError('Classes not found');
        }

        $classes = $this->classesRepository->update($input, $id);

        return $this->sendResponse($classes->toArray(), 'classes updated successfully');
    }

    /**
     * Remove the specified classes from storage.
     * DELETE /classes/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var classes $classes */
        $classes = $this->classesRepository->find($id);

        if (empty($classes)) {
            return $this->sendError('Classes not found');
        }

        $classes->delete();

        return $this->sendResponse($id, 'Classes deleted successfully');
    }
}

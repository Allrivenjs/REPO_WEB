<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateavionsAPIRequest;
use App\Http\Requests\API\UpdateavionsAPIRequest;
use App\Models\avions;
use App\Repositories\avionsRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class avionsController
 * @package App\Http\Controllers\API
 */

class avionsAPIController extends AppBaseController
{
    /** @var  avionsRepository */
    private $avionsRepository;

    public function __construct(avionsRepository $avionsRepo)
    {
        $this->avionsRepository = $avionsRepo;
    }

    /**
     * Display a listing of the avions.
     * GET|HEAD /avions
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $avions = $this->avionsRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($avions->toArray(), 'Avions retrieved successfully');
    }

    /**
     * Store a newly created avions in storage.
     * POST /avions
     *
     * @param CreateavionsAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateavionsAPIRequest $request)
    {
        $input = $request->all();

        $avions = $this->avionsRepository->create($input);

        return $this->sendResponse($avions->toArray(), 'Avions saved successfully');
    }

    /**
     * Display the specified avions.
     * GET|HEAD /avions/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var avions $avions */
        $avions = $this->avionsRepository->find($id);

        if (empty($avions)) {
            return $this->sendError('Avions not found');
        }

        return $this->sendResponse($avions->toArray(), 'Avions retrieved successfully');
    }

    /**
     * Update the specified avions in storage.
     * PUT/PATCH /avions/{id}
     *
     * @param int $id
     * @param UpdateavionsAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateavionsAPIRequest $request)
    {
        $input = $request->all();

        /** @var avions $avions */
        $avions = $this->avionsRepository->find($id);

        if (empty($avions)) {
            return $this->sendError('Avions not found');
        }

        $avions = $this->avionsRepository->update($input, $id);

        return $this->sendResponse($avions->toArray(), 'avions updated successfully');
    }

    /**
     * Remove the specified avions from storage.
     * DELETE /avions/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var avions $avions */
        $avions = $this->avionsRepository->find($id);

        if (empty($avions)) {
            return $this->sendError('Avions not found');
        }

        $avions->delete();

        return $this->sendSuccess('Avions deleted successfully');
    }
}

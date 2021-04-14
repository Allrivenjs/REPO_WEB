<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatevuelosAPIRequest;
use App\Http\Requests\API\UpdatevuelosAPIRequest;
use App\Models\vuelos;
use App\Repositories\vuelosRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class vuelosController
 * @package App\Http\Controllers\API
 */

class vuelosAPIController extends AppBaseController
{
    /** @var  vuelosRepository */
    private $vuelosRepository;

    public function __construct(vuelosRepository $vuelosRepo)
    {
        $this->vuelosRepository = $vuelosRepo;
    }

    /**
     * Display a listing of the vuelos.
     * GET|HEAD /vuelos
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $vuelos = $this->vuelosRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($vuelos->toArray(), 'Vuelos retrieved successfully');
    }

    /**
     * Store a newly created vuelos in storage.
     * POST /vuelos
     *
     * @param CreatevuelosAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatevuelosAPIRequest $request)
    {
        $input = $request->all();

        $vuelos = $this->vuelosRepository->create($input);

        return $this->sendResponse($vuelos->toArray(), 'Vuelos saved successfully');
    }

    /**
     * Display the specified vuelos.
     * GET|HEAD /vuelos/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var vuelos $vuelos */
        $vuelos = $this->vuelosRepository->find($id);

        if (empty($vuelos)) {
            return $this->sendError('Vuelos not found');
        }

        return $this->sendResponse($vuelos->toArray(), 'Vuelos retrieved successfully');
    }

    /**
     * Update the specified vuelos in storage.
     * PUT/PATCH /vuelos/{id}
     *
     * @param int $id
     * @param UpdatevuelosAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatevuelosAPIRequest $request)
    {
        $input = $request->all();

        /** @var vuelos $vuelos */
        $vuelos = $this->vuelosRepository->find($id);

        if (empty($vuelos)) {
            return $this->sendError('Vuelos not found');
        }

        $vuelos = $this->vuelosRepository->update($input, $id);

        return $this->sendResponse($vuelos->toArray(), 'vuelos updated successfully');
    }

    /**
     * Remove the specified vuelos from storage.
     * DELETE /vuelos/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var vuelos $vuelos */
        $vuelos = $this->vuelosRepository->find($id);

        if (empty($vuelos)) {
            return $this->sendError('Vuelos not found');
        }

        $vuelos->delete();

        return $this->sendSuccess('Vuelos deleted successfully');
    }
}

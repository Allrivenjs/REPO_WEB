<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateavionesAPIRequest;
use App\Http\Requests\API\UpdateavionesAPIRequest;
use App\Models\aviones;
use App\Repositories\avionesRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class avionesController
 * @package App\Http\Controllers\API
 */

class avionesAPIController extends AppBaseController
{
    /** @var  avionesRepository */
    private $avionesRepository;

    public function __construct(avionesRepository $avionesRepo)
    {
        $this->avionesRepository = $avionesRepo;
    }

    /**
     * Display a listing of the aviones.
     * GET|HEAD /aviones
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $aviones = $this->avionesRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($aviones->toArray(), 'Aviones retrieved successfully');
    }

    /**
     * Store a newly created aviones in storage.
     * POST /aviones
     *
     * @param CreateavionesAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateavionesAPIRequest $request)
    {
        $input = $request->all();

        $aviones = $this->avionesRepository->create($input);

        return $this->sendResponse($aviones->toArray(), 'Aviones saved successfully');
    }

    /**
     * Display the specified aviones.
     * GET|HEAD /aviones/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var aviones $aviones */
        $aviones = $this->avionesRepository->find($id);

        if (empty($aviones)) {
            return $this->sendError('Aviones not found');
        }

        return $this->sendResponse($aviones->toArray(), 'Aviones retrieved successfully');
    }

    /**
     * Update the specified aviones in storage.
     * PUT/PATCH /aviones/{id}
     *
     * @param int $id
     * @param UpdateavionesAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateavionesAPIRequest $request)
    {
        $input = $request->all();

        /** @var aviones $aviones */
        $aviones = $this->avionesRepository->find($id);

        if (empty($aviones)) {
            return $this->sendError('Aviones not found');
        }

        $aviones = $this->avionesRepository->update($input, $id);

        return $this->sendResponse($aviones->toArray(), 'aviones updated successfully');
    }

    /**
     * Remove the specified aviones from storage.
     * DELETE /aviones/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var aviones $aviones */
        $aviones = $this->avionesRepository->find($id);

        if (empty($aviones)) {
            return $this->sendError('Aviones not found');
        }

        $aviones->delete();

        return $this->sendSuccess('Aviones deleted successfully');
    }
}

<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatetipoReservaAPIRequest;
use App\Http\Requests\API\UpdatetipoReservaAPIRequest;
use App\Models\tipoReserva;
use App\Repositories\tipoReservaRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class tipoReservaController
 * @package App\Http\Controllers\API
 */

class tipoReservaAPIController extends AppBaseController
{
    /** @var  tipoReservaRepository */
    private $tipoReservaRepository;

    public function __construct(tipoReservaRepository $tipoReservaRepo)
    {
        $this->tipoReservaRepository = $tipoReservaRepo;
    }

    /**
     * Display a listing of the tipoReserva.
     * GET|HEAD /tipoReservas
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $tipoReservas = $this->tipoReservaRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($tipoReservas->toArray(), 'Tipo Reservas retrieved successfully');
    }

    /**
     * Store a newly created tipoReserva in storage.
     * POST /tipoReservas
     *
     * @param CreatetipoReservaAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatetipoReservaAPIRequest $request)
    {
        $input = $request->all();

        $tipoReserva = $this->tipoReservaRepository->create($input);

        return $this->sendResponse($tipoReserva->toArray(), 'Tipo Reserva saved successfully');
    }

    /**
     * Display the specified tipoReserva.
     * GET|HEAD /tipoReservas/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var tipoReserva $tipoReserva */
        $tipoReserva = $this->tipoReservaRepository->find($id);

        if (empty($tipoReserva)) {
            return $this->sendError('Tipo Reserva not found');
        }

        return $this->sendResponse($tipoReserva->toArray(), 'Tipo Reserva retrieved successfully');
    }

    /**
     * Update the specified tipoReserva in storage.
     * PUT/PATCH /tipoReservas/{id}
     *
     * @param int $id
     * @param UpdatetipoReservaAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatetipoReservaAPIRequest $request)
    {
        $input = $request->all();

        /** @var tipoReserva $tipoReserva */
        $tipoReserva = $this->tipoReservaRepository->find($id);

        if (empty($tipoReserva)) {
            return $this->sendError('Tipo Reserva not found');
        }

        $tipoReserva = $this->tipoReservaRepository->update($input, $id);

        return $this->sendResponse($tipoReserva->toArray(), 'tipoReserva updated successfully');
    }

    /**
     * Remove the specified tipoReserva from storage.
     * DELETE /tipoReservas/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var tipoReserva $tipoReserva */
        $tipoReserva = $this->tipoReservaRepository->find($id);

        if (empty($tipoReserva)) {
            return $this->sendError('Tipo Reserva not found');
        }

        $tipoReserva->delete();

        return $this->sendSuccess('Tipo Reserva deleted successfully');
    }
}

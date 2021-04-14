<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatereservasAPIRequest;
use App\Http\Requests\API\UpdatereservasAPIRequest;
use App\Models\reservas;
use App\Repositories\reservasRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class reservasController
 * @package App\Http\Controllers\API
 */

class reservasAPIController extends AppBaseController
{
    /** @var  reservasRepository */
    private $reservasRepository;

    public function __construct(reservasRepository $reservasRepo)
    {
        $this->reservasRepository = $reservasRepo;
    }

    /**
     * Display a listing of the reservas.
     * GET|HEAD /reservas
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $reservas = $this->reservasRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($reservas->toArray(), 'Reservas retrieved successfully');
    }

    /**
     * Store a newly created reservas in storage.
     * POST /reservas
     *
     * @param CreatereservasAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatereservasAPIRequest $request)
    {
        $input = $request->all();

        $reservas = $this->reservasRepository->create($input);

        return $this->sendResponse($reservas->toArray(), 'Reservas saved successfully');
    }

    /**
     * Display the specified reservas.
     * GET|HEAD /reservas/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var reservas $reservas */
        $reservas = $this->reservasRepository->find($id);

        if (empty($reservas)) {
            return $this->sendError('Reservas not found');
        }

        return $this->sendResponse($reservas->toArray(), 'Reservas retrieved successfully');
    }

    /**
     * Update the specified reservas in storage.
     * PUT/PATCH /reservas/{id}
     *
     * @param int $id
     * @param UpdatereservasAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatereservasAPIRequest $request)
    {
        $input = $request->all();

        /** @var reservas $reservas */
        $reservas = $this->reservasRepository->find($id);

        if (empty($reservas)) {
            return $this->sendError('Reservas not found');
        }

        $reservas = $this->reservasRepository->update($input, $id);

        return $this->sendResponse($reservas->toArray(), 'reservas updated successfully');
    }

    /**
     * Remove the specified reservas from storage.
     * DELETE /reservas/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var reservas $reservas */
        $reservas = $this->reservasRepository->find($id);

        if (empty($reservas)) {
            return $this->sendError('Reservas not found');
        }

        $reservas->delete();

        return $this->sendSuccess('Reservas deleted successfully');
    }
}

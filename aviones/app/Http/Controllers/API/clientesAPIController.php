<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateclientesAPIRequest;
use App\Http\Requests\API\UpdateclientesAPIRequest;
use App\Models\clientes;
use App\Repositories\clientesRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class clientesController
 * @package App\Http\Controllers\API
 */

class clientesAPIController extends AppBaseController
{
    /** @var  clientesRepository */
    private $clientesRepository;

    public function __construct(clientesRepository $clientesRepo)
    {
        $this->clientesRepository = $clientesRepo;
    }

    /**
     * Display a listing of the clientes.
     * GET|HEAD /clientes
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $clientes = $this->clientesRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($clientes->toArray(), 'Clientes retrieved successfully');
    }

    /**
     * Store a newly created clientes in storage.
     * POST /clientes
     *
     * @param CreateclientesAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateclientesAPIRequest $request)
    {
        $input = $request->all();

        $clientes = $this->clientesRepository->create($input);

        return $this->sendResponse($clientes->toArray(), 'Clientes saved successfully');
    }

    /**
     * Display the specified clientes.
     * GET|HEAD /clientes/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var clientes $clientes */
        $clientes = $this->clientesRepository->find($id);

        if (empty($clientes)) {
            return $this->sendError('Clientes not found');
        }

        return $this->sendResponse($clientes->toArray(), 'Clientes retrieved successfully');
    }

    /**
     * Update the specified clientes in storage.
     * PUT/PATCH /clientes/{id}
     *
     * @param int $id
     * @param UpdateclientesAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateclientesAPIRequest $request)
    {
        $input = $request->all();

        /** @var clientes $clientes */
        $clientes = $this->clientesRepository->find($id);

        if (empty($clientes)) {
            return $this->sendError('Clientes not found');
        }

        $clientes = $this->clientesRepository->update($input, $id);

        return $this->sendResponse($clientes->toArray(), 'clientes updated successfully');
    }

    /**
     * Remove the specified clientes from storage.
     * DELETE /clientes/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var clientes $clientes */
        $clientes = $this->clientesRepository->find($id);

        if (empty($clientes)) {
            return $this->sendError('Clientes not found');
        }

        $clientes->delete();

        return $this->sendSuccess('Clientes deleted successfully');
    }
}

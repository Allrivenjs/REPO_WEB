<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatetarifasAPIRequest;
use App\Http\Requests\API\UpdatetarifasAPIRequest;
use App\Models\tarifas;
use App\Repositories\tarifasRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class tarifasController
 * @package App\Http\Controllers\API
 */

class tarifasAPIController extends AppBaseController
{
    /** @var  tarifasRepository */
    private $tarifasRepository;

    public function __construct(tarifasRepository $tarifasRepo)
    {
        $this->tarifasRepository = $tarifasRepo;
    }

    /**
     * Display a listing of the tarifas.
     * GET|HEAD /tarifas
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $tarifas = $this->tarifasRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($tarifas->toArray(), 'Tarifas retrieved successfully');
    }

    /**
     * Store a newly created tarifas in storage.
     * POST /tarifas
     *
     * @param CreatetarifasAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatetarifasAPIRequest $request)
    {
        $input = $request->all();

        $tarifas = $this->tarifasRepository->create($input);

        return $this->sendResponse($tarifas->toArray(), 'Tarifas saved successfully');
    }

    /**
     * Display the specified tarifas.
     * GET|HEAD /tarifas/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var tarifas $tarifas */
        $tarifas = $this->tarifasRepository->find($id);

        if (empty($tarifas)) {
            return $this->sendError('Tarifas not found');
        }

        return $this->sendResponse($tarifas->toArray(), 'Tarifas retrieved successfully');
    }

    /**
     * Update the specified tarifas in storage.
     * PUT/PATCH /tarifas/{id}
     *
     * @param int $id
     * @param UpdatetarifasAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatetarifasAPIRequest $request)
    {
        $input = $request->all();

        /** @var tarifas $tarifas */
        $tarifas = $this->tarifasRepository->find($id);

        if (empty($tarifas)) {
            return $this->sendError('Tarifas not found');
        }

        $tarifas = $this->tarifasRepository->update($input, $id);

        return $this->sendResponse($tarifas->toArray(), 'tarifas updated successfully');
    }

    /**
     * Remove the specified tarifas from storage.
     * DELETE /tarifas/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var tarifas $tarifas */
        $tarifas = $this->tarifasRepository->find($id);

        if (empty($tarifas)) {
            return $this->sendError('Tarifas not found');
        }

        $tarifas->delete();

        return $this->sendSuccess('Tarifas deleted successfully');
    }
}

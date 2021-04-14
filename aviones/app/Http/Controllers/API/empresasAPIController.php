<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateempresasAPIRequest;
use App\Http\Requests\API\UpdateempresasAPIRequest;
use App\Models\empresas;
use App\Repositories\empresasRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class empresasController
 * @package App\Http\Controllers\API
 */

class empresasAPIController extends AppBaseController
{
    /** @var  empresasRepository */
    private $empresasRepository;

    public function __construct(empresasRepository $empresasRepo)
    {
        $this->empresasRepository = $empresasRepo;
    }

    /**
     * Display a listing of the empresas.
     * GET|HEAD /empresas
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $empresas = $this->empresasRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($empresas->toArray(), 'Empresas retrieved successfully');
    }

    /**
     * Store a newly created empresas in storage.
     * POST /empresas
     *
     * @param CreateempresasAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateempresasAPIRequest $request)
    {
        $input = $request->all();

        $empresas = $this->empresasRepository->create($input);

        return $this->sendResponse($empresas->toArray(), 'Empresas saved successfully');
    }

    /**
     * Display the specified empresas.
     * GET|HEAD /empresas/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var empresas $empresas */
        $empresas = $this->empresasRepository->find($id);

        if (empty($empresas)) {
            return $this->sendError('Empresas not found');
        }

        return $this->sendResponse($empresas->toArray(), 'Empresas retrieved successfully');
    }

    /**
     * Update the specified empresas in storage.
     * PUT/PATCH /empresas/{id}
     *
     * @param int $id
     * @param UpdateempresasAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateempresasAPIRequest $request)
    {
        $input = $request->all();

        /** @var empresas $empresas */
        $empresas = $this->empresasRepository->find($id);

        if (empty($empresas)) {
            return $this->sendError('Empresas not found');
        }

        $empresas = $this->empresasRepository->update($input, $id);

        return $this->sendResponse($empresas->toArray(), 'empresas updated successfully');
    }

    /**
     * Remove the specified empresas from storage.
     * DELETE /empresas/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var empresas $empresas */
        $empresas = $this->empresasRepository->find($id);

        if (empty($empresas)) {
            return $this->sendError('Empresas not found');
        }

        $empresas->delete();

        return $this->sendSuccess('Empresas deleted successfully');
    }
}

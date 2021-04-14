<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatetarifasRequest;
use App\Http\Requests\UpdatetarifasRequest;
use App\Repositories\tarifasRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class tarifasController extends AppBaseController
{
    /** @var  tarifasRepository */
    private $tarifasRepository;

    public function __construct(tarifasRepository $tarifasRepo)
    {
        $this->tarifasRepository = $tarifasRepo;
    }

    /**
     * Display a listing of the tarifas.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $tarifas = $this->tarifasRepository->all();

        return view('tarifas.index')
            ->with('tarifas', $tarifas);
    }

    /**
     * Show the form for creating a new tarifas.
     *
     * @return Response
     */
    public function create()
    {
        return view('tarifas.create');
    }

    /**
     * Store a newly created tarifas in storage.
     *
     * @param CreatetarifasRequest $request
     *
     * @return Response
     */
    public function store(CreatetarifasRequest $request)
    {
        $input = $request->all();

        $tarifas = $this->tarifasRepository->create($input);

        Flash::success('Tarifas saved successfully.');

        return redirect(route('tarifas.index'));
    }

    /**
     * Display the specified tarifas.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tarifas = $this->tarifasRepository->find($id);

        if (empty($tarifas)) {
            Flash::error('Tarifas not found');

            return redirect(route('tarifas.index'));
        }

        return view('tarifas.show')->with('tarifas', $tarifas);
    }

    /**
     * Show the form for editing the specified tarifas.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tarifas = $this->tarifasRepository->find($id);

        if (empty($tarifas)) {
            Flash::error('Tarifas not found');

            return redirect(route('tarifas.index'));
        }

        return view('tarifas.edit')->with('tarifas', $tarifas);
    }

    /**
     * Update the specified tarifas in storage.
     *
     * @param int $id
     * @param UpdatetarifasRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatetarifasRequest $request)
    {
        $tarifas = $this->tarifasRepository->find($id);

        if (empty($tarifas)) {
            Flash::error('Tarifas not found');

            return redirect(route('tarifas.index'));
        }

        $tarifas = $this->tarifasRepository->update($request->all(), $id);

        Flash::success('Tarifas updated successfully.');

        return redirect(route('tarifas.index'));
    }

    /**
     * Remove the specified tarifas from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tarifas = $this->tarifasRepository->find($id);

        if (empty($tarifas)) {
            Flash::error('Tarifas not found');

            return redirect(route('tarifas.index'));
        }

        $this->tarifasRepository->delete($id);

        Flash::success('Tarifas deleted successfully.');

        return redirect(route('tarifas.index'));
    }
}

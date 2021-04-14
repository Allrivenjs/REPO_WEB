<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatevuelosRequest;
use App\Http\Requests\UpdatevuelosRequest;
use App\Repositories\vuelosRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class vuelosController extends AppBaseController
{
    /** @var  vuelosRepository */
    private $vuelosRepository;

    public function __construct(vuelosRepository $vuelosRepo)
    {
        $this->vuelosRepository = $vuelosRepo;
    }

    /**
     * Display a listing of the vuelos.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $vuelos = $this->vuelosRepository->all();

        return view('vuelos.index')
            ->with('vuelos', $vuelos);
    }

    /**
     * Show the form for creating a new vuelos.
     *
     * @return Response
     */
    public function create()
    {
        return view('vuelos.create');
    }

    /**
     * Store a newly created vuelos in storage.
     *
     * @param CreatevuelosRequest $request
     *
     * @return Response
     */
    public function store(CreatevuelosRequest $request)
    {
        $input = $request->all();

        $vuelos = $this->vuelosRepository->create($input);

        Flash::success('Vuelos saved successfully.');

        return redirect(route('vuelos.index'));
    }

    /**
     * Display the specified vuelos.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $vuelos = $this->vuelosRepository->find($id);

        if (empty($vuelos)) {
            Flash::error('Vuelos not found');

            return redirect(route('vuelos.index'));
        }

        return view('vuelos.show')->with('vuelos', $vuelos);
    }

    /**
     * Show the form for editing the specified vuelos.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $vuelos = $this->vuelosRepository->find($id);

        if (empty($vuelos)) {
            Flash::error('Vuelos not found');

            return redirect(route('vuelos.index'));
        }

        return view('vuelos.edit')->with('vuelos', $vuelos);
    }

    /**
     * Update the specified vuelos in storage.
     *
     * @param int $id
     * @param UpdatevuelosRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatevuelosRequest $request)
    {
        $vuelos = $this->vuelosRepository->find($id);

        if (empty($vuelos)) {
            Flash::error('Vuelos not found');

            return redirect(route('vuelos.index'));
        }

        $vuelos = $this->vuelosRepository->update($request->all(), $id);

        Flash::success('Vuelos updated successfully.');

        return redirect(route('vuelos.index'));
    }

    /**
     * Remove the specified vuelos from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $vuelos = $this->vuelosRepository->find($id);

        if (empty($vuelos)) {
            Flash::error('Vuelos not found');

            return redirect(route('vuelos.index'));
        }

        $this->vuelosRepository->delete($id);

        Flash::success('Vuelos deleted successfully.');

        return redirect(route('vuelos.index'));
    }
}

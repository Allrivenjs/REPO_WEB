<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateavionesRequest;
use App\Http\Requests\UpdateavionesRequest;
use App\Repositories\avionesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use Illuminate\Support\Facades\DB;
class avionesController extends AppBaseController
{
    /** @var  avionesRepository */
    private $avionesRepository;

    public function __construct(avionesRepository $avionesRepo)
    {
        $this->avionesRepository = $avionesRepo;
    }

    /**
     * Display a listing of the aviones.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $aviones = DB::table('aviones')
                ->join('empresas', 'empresas.id', '=', 'aviones.empresa_id')
                ->select('aviones.*', 'empresas.companie')
                ->get();
        // $aviones = $this->avionesRepository->all();

        return view('aviones.index')
            ->with('aviones', $aviones);
    }

    /**
     * Show the form for creating a new aviones.
     *
     * @return Response
     */
    public function create()
    {
        return view('aviones.create');
    }

    /**
     * Store a newly created aviones in storage.
     *
     * @param CreateavionesRequest $request
     *
     * @return Response
     */
    public function store(CreateavionesRequest $request)
    {
        $input = $request->all();

        $aviones = $this->avionesRepository->create($input);

        Flash::success('Aviones saved successfully.');

        return redirect(route('aviones.index'));
    }

    /**
     * Display the specified aviones.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $aviones = $this->avionesRepository->find($id);

        if (empty($aviones)) {
            Flash::error('Aviones not found');

            return redirect(route('aviones.index'));
        }

        return view('aviones.show')->with('aviones', $aviones);
    }

    /**
     * Show the form for editing the specified aviones.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $aviones = $this->avionesRepository->find($id);

        if (empty($aviones)) {
            Flash::error('Aviones not found');

            return redirect(route('aviones.index'));
        }

        return view('aviones.edit')->with('aviones', $aviones);
    }

    /**
     * Update the specified aviones in storage.
     *
     * @param int $id
     * @param UpdateavionesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateavionesRequest $request)
    {
        $aviones = $this->avionesRepository->find($id);

        if (empty($aviones)) {
            Flash::error('Aviones not found');

            return redirect(route('aviones.index'));
        }

        $aviones = $this->avionesRepository->update($request->all(), $id);

        Flash::success('Aviones updated successfully.');

        return redirect(route('aviones.index'));
    }

    /**
     * Remove the specified aviones from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $aviones = $this->avionesRepository->find($id);

        if (empty($aviones)) {
            Flash::error('Aviones not found');

            return redirect(route('aviones.index'));
        }

        $this->avionesRepository->delete($id);

        Flash::success('Aviones deleted successfully.');

        return redirect(route('aviones.index'));
    }
}

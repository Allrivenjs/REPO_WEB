<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatetipoReservaRequest;
use App\Http\Requests\UpdatetipoReservaRequest;
use App\Repositories\tipoReservaRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class tipoReservaController extends AppBaseController
{
    /** @var  tipoReservaRepository */
    private $tipoReservaRepository;

    public function __construct(tipoReservaRepository $tipoReservaRepo)
    {
        $this->tipoReservaRepository = $tipoReservaRepo;
    }

    /**
     * Display a listing of the tipoReserva.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $tipoReservas = $this->tipoReservaRepository->all();

        return view('tipo_reservas.index')
            ->with('tipoReservas', $tipoReservas);
    }

    /**
     * Show the form for creating a new tipoReserva.
     *
     * @return Response
     */
    public function create()
    {
        return view('tipo_reservas.create');
    }

    /**
     * Store a newly created tipoReserva in storage.
     *
     * @param CreatetipoReservaRequest $request
     *
     * @return Response
     */
    public function store(CreatetipoReservaRequest $request)
    {
        $input = $request->all();

        $tipoReserva = $this->tipoReservaRepository->create($input);

        Flash::success('Tipo Reserva saved successfully.');

        return redirect(route('tipoReservas.index'));
    }

    /**
     * Display the specified tipoReserva.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tipoReserva = $this->tipoReservaRepository->find($id);

        if (empty($tipoReserva)) {
            Flash::error('Tipo Reserva not found');

            return redirect(route('tipoReservas.index'));
        }

        return view('tipo_reservas.show')->with('tipoReserva', $tipoReserva);
    }

    /**
     * Show the form for editing the specified tipoReserva.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tipoReserva = $this->tipoReservaRepository->find($id);

        if (empty($tipoReserva)) {
            Flash::error('Tipo Reserva not found');

            return redirect(route('tipoReservas.index'));
        }

        return view('tipo_reservas.edit')->with('tipoReserva', $tipoReserva);
    }

    /**
     * Update the specified tipoReserva in storage.
     *
     * @param int $id
     * @param UpdatetipoReservaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatetipoReservaRequest $request)
    {
        $tipoReserva = $this->tipoReservaRepository->find($id);

        if (empty($tipoReserva)) {
            Flash::error('Tipo Reserva not found');

            return redirect(route('tipoReservas.index'));
        }

        $tipoReserva = $this->tipoReservaRepository->update($request->all(), $id);

        Flash::success('Tipo Reserva updated successfully.');

        return redirect(route('tipoReservas.index'));
    }

    /**
     * Remove the specified tipoReserva from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tipoReserva = $this->tipoReservaRepository->find($id);

        if (empty($tipoReserva)) {
            Flash::error('Tipo Reserva not found');

            return redirect(route('tipoReservas.index'));
        }

        $this->tipoReservaRepository->delete($id);

        Flash::success('Tipo Reserva deleted successfully.');

        return redirect(route('tipoReservas.index'));
    }
}

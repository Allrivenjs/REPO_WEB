<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateavionsRequest;
use App\Http\Requests\UpdateavionsRequest;
use App\Repositories\avionsRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class avionsController extends AppBaseController
{
    /** @var  avionsRepository */
    private $avionsRepository;

    public function __construct(avionsRepository $avionsRepo)
    {
        $this->avionsRepository = $avionsRepo;
    }

    /**
     * Display a listing of the avions.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $avions = $this->avionsRepository->all();

        return view('avions.index')
            ->with('avions', $avions);
    }

    /**
     * Show the form for creating a new avions.
     *
     * @return Response
     */
    public function create()
    {
        return view('avions.create');
    }

    /**
     * Store a newly created avions in storage.
     *
     * @param CreateavionsRequest $request
     *
     * @return Response
     */
    public function store(CreateavionsRequest $request)
    {
        $input = $request->all();

        $avions = $this->avionsRepository->create($input);

        Flash::success('Avions saved successfully.');

        return redirect(route('avions.index'));
    }

    /**
     * Display the specified avions.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $avions = $this->avionsRepository->find($id);

        if (empty($avions)) {
            Flash::error('Avions not found');

            return redirect(route('avions.index'));
        }

        return view('avions.show')->with('avions', $avions);
    }

    /**
     * Show the form for editing the specified avions.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $avions = $this->avionsRepository->find($id);

        if (empty($avions)) {
            Flash::error('Avions not found');

            return redirect(route('avions.index'));
        }

        return view('avions.edit')->with('avions', $avions);
    }

    /**
     * Update the specified avions in storage.
     *
     * @param int $id
     * @param UpdateavionsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateavionsRequest $request)
    {
        $avions = $this->avionsRepository->find($id);

        if (empty($avions)) {
            Flash::error('Avions not found');

            return redirect(route('avions.index'));
        }

        $avions = $this->avionsRepository->update($request->all(), $id);

        Flash::success('Avions updated successfully.');

        return redirect(route('avions.index'));
    }

    /**
     * Remove the specified avions from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $avions = $this->avionsRepository->find($id);

        if (empty($avions)) {
            Flash::error('Avions not found');

            return redirect(route('avions.index'));
        }

        $this->avionsRepository->delete($id);

        Flash::success('Avions deleted successfully.');

        return redirect(route('avions.index'));
    }
}

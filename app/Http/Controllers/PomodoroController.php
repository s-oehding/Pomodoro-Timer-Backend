<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePomodoroRequest;
use App\Http\Requests\UpdatePomodoroRequest;
use App\Repositories\PomodoroRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class PomodoroController extends AppBaseController
{
    /** @var  PomodoroRepository */
    private $pomodoroRepository;

    public function __construct(PomodoroRepository $pomodoroRepo)
    {
        $this->pomodoroRepository = $pomodoroRepo;
    }

    /**
     * Display a listing of the Pomodoro.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->pomodoroRepository->pushCriteria(new RequestCriteria($request));
        $pomodoros = $this->pomodoroRepository->all();

        return view('pomodoros.index')
            ->with('pomodoros', $pomodoros);
    }

    /**
     * Show the form for creating a new Pomodoro.
     *
     * @return Response
     */
    public function create()
    {
        return view('pomodoros.create');
    }

    /**
     * Store a newly created Pomodoro in storage.
     *
     * @param CreatePomodoroRequest $request
     *
     * @return Response
     */
    public function store(CreatePomodoroRequest $request)
    {
        $input = $request->all();

        $pomodoro = $this->pomodoroRepository->create($input);

        Flash::success('Pomodoro saved successfully.');

        return redirect(route('pomodoros.index'));
    }

    /**
     * Display the specified Pomodoro.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $pomodoro = $this->pomodoroRepository->findWithoutFail($id);

        if (empty($pomodoro)) {
            Flash::error('Pomodoro not found');

            return redirect(route('pomodoros.index'));
        }

        return view('pomodoros.show')->with('pomodoro', $pomodoro);
    }

    /**
     * Show the form for editing the specified Pomodoro.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $pomodoro = $this->pomodoroRepository->findWithoutFail($id);

        if (empty($pomodoro)) {
            Flash::error('Pomodoro not found');

            return redirect(route('pomodoros.index'));
        }

        return view('pomodoros.edit')->with('pomodoro', $pomodoro);
    }

    /**
     * Update the specified Pomodoro in storage.
     *
     * @param  int              $id
     * @param UpdatePomodoroRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePomodoroRequest $request)
    {
        $pomodoro = $this->pomodoroRepository->findWithoutFail($id);

        if (empty($pomodoro)) {
            Flash::error('Pomodoro not found');

            return redirect(route('pomodoros.index'));
        }

        $pomodoro = $this->pomodoroRepository->update($request->all(), $id);

        Flash::success('Pomodoro updated successfully.');

        return redirect(route('pomodoros.index'));
    }

    /**
     * Remove the specified Pomodoro from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $pomodoro = $this->pomodoroRepository->findWithoutFail($id);

        if (empty($pomodoro)) {
            Flash::error('Pomodoro not found');

            return redirect(route('pomodoros.index'));
        }

        $this->pomodoroRepository->delete($id);

        Flash::success('Pomodoro deleted successfully.');

        return redirect(route('pomodoros.index'));
    }
}

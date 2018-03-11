<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatePomodoroAPIRequest;
use App\Http\Requests\API\UpdatePomodoroAPIRequest;
use App\Models\Pomodoro;
use App\Repositories\PomodoroRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class PomodoroController
 * @package App\Http\Controllers\API
 */

class PomodoroAPIController extends AppBaseController
{
    /** @var  PomodoroRepository */
    private $pomodoroRepository;

    public function __construct(PomodoroRepository $pomodoroRepo)
    {
        $this->pomodoroRepository = $pomodoroRepo;
    }

    /**
     * Display a listing of the Pomodoro.
     * GET|HEAD /pomodoros
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->pomodoroRepository->pushCriteria(new RequestCriteria($request));
        $this->pomodoroRepository->pushCriteria(new LimitOffsetCriteria($request));
        $pomodoros = $this->pomodoroRepository->all();

        return $this->sendResponse($pomodoros->toArray(), 'Pomodoros retrieved successfully');
    }

    /**
     * Store a newly created Pomodoro in storage.
     * POST /pomodoros
     *
     * @param CreatePomodoroAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatePomodoroAPIRequest $request)
    {
        $input = $request->all();

        $pomodoros = $this->pomodoroRepository->create($input);

        return $this->sendResponse($pomodoros->toArray(), 'Pomodoro saved successfully');
    }

    /**
     * Display the specified Pomodoro.
     * GET|HEAD /pomodoros/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Pomodoro $pomodoro */
        $pomodoro = $this->pomodoroRepository->findWithoutFail($id);

        if (empty($pomodoro)) {
            return $this->sendError('Pomodoro not found');
        }

        return $this->sendResponse($pomodoro->toArray(), 'Pomodoro retrieved successfully');
    }

    /**
     * Update the specified Pomodoro in storage.
     * PUT/PATCH /pomodoros/{id}
     *
     * @param  int $id
     * @param UpdatePomodoroAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePomodoroAPIRequest $request)
    {
        $input = $request->all();

        /** @var Pomodoro $pomodoro */
        $pomodoro = $this->pomodoroRepository->findWithoutFail($id);

        if (empty($pomodoro)) {
            return $this->sendError('Pomodoro not found');
        }

        $pomodoro = $this->pomodoroRepository->update($input, $id);

        return $this->sendResponse($pomodoro->toArray(), 'Pomodoro updated successfully');
    }

    /**
     * Remove the specified Pomodoro from storage.
     * DELETE /pomodoros/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Pomodoro $pomodoro */
        $pomodoro = $this->pomodoroRepository->findWithoutFail($id);

        if (empty($pomodoro)) {
            return $this->sendError('Pomodoro not found');
        }

        $pomodoro->delete();

        return $this->sendResponse($id, 'Pomodoro deleted successfully');
    }
}

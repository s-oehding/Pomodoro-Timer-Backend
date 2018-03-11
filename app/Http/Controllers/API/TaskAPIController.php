<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateTaskAPIRequest;
use App\Http\Requests\API\UpdateTaskAPIRequest;
use App\Models\Task;
use App\Repositories\TaskRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class TaskController
 * @package App\Http\Controllers\API
 */

class TaskAPIController extends AppBaseController
{
    /** @var  TaskRepository */
    private $taskRepository;

    public function __construct(TaskRepository $taskRepo)
    {
        $this->taskRepository = $taskRepo;
    }

    /**
     * Display a listing of the Task.
     * GET|HEAD /tasks
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->taskRepository->pushCriteria(new RequestCriteria($request));
        $this->taskRepository->pushCriteria(new LimitOffsetCriteria($request));
        $tasks = $this->taskRepository->all();

        return $this->sendResponse($tasks->toArray(), 'Tasks retrieved successfully');
    }

    /**
     * Store a newly created Task in storage.
     * POST /tasks
     *
     * @param CreateTaskAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateTaskAPIRequest $request)
    {
        $input = $request->all();

        $tasks = $this->taskRepository->create($input);

        return $this->sendResponse($tasks->toArray(), 'Task saved successfully');
    }

    /**
     * Display the specified Task.
     * GET|HEAD /tasks/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Task $task */
        $task = $this->taskRepository->findWithoutFail($id);

        if (empty($task)) {
            return $this->sendError('Task not found');
        }

        return $this->sendResponse($task->toArray(), 'Task retrieved successfully');
    }

    /**
     * Update the specified Task in storage.
     * PUT/PATCH /tasks/{id}
     *
     * @param  int $id
     * @param UpdateTaskAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTaskAPIRequest $request)
    {
        $input = $request->all();

        /** @var Task $task */
        $task = $this->taskRepository->findWithoutFail($id);

        if (empty($task)) {
            return $this->sendError('Task not found');
        }

        $task = $this->taskRepository->update($input, $id);

        return $this->sendResponse($task->toArray(), 'Task updated successfully');
    }

    /**
     * Remove the specified Task from storage.
     * DELETE /tasks/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Task $task */
        $task = $this->taskRepository->findWithoutFail($id);

        if (empty($task)) {
            return $this->sendError('Task not found');
        }

        $task->delete();

        return $this->sendResponse($id, 'Task deleted successfully');
    }
}

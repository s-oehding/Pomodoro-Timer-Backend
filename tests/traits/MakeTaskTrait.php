<?php

use Faker\Factory as Faker;
use App\Models\Task;
use App\Repositories\TaskRepository;

trait MakeTaskTrait
{
    /**
     * Create fake instance of Task and save it in database
     *
     * @param array $taskFields
     * @return Task
     */
    public function makeTask($taskFields = [])
    {
        /** @var TaskRepository $taskRepo */
        $taskRepo = App::make(TaskRepository::class);
        $theme = $this->fakeTaskData($taskFields);
        return $taskRepo->create($theme);
    }

    /**
     * Get fake instance of Task
     *
     * @param array $taskFields
     * @return Task
     */
    public function fakeTask($taskFields = [])
    {
        return new Task($this->fakeTaskData($taskFields));
    }

    /**
     * Get fake data of Task
     *
     * @param array $postFields
     * @return array
     */
    public function fakeTaskData($taskFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'name' => $fake->word,
            'description' => $fake->text,
            'note' => $fake->word,
            'status_id' => $fake->randomDigitNotNull,
            'user_id' => $fake->randomDigitNotNull,
            'project_id' => $fake->randomDigitNotNull,
            'start_date' => $fake->date('Y-m-d H:i:s'),
            'end_date' => $fake->date('Y-m-d H:i:s'),
            'completed_on' => $fake->date('Y-m-d H:i:s'),
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_by' => $fake->randomDigitNotNull
        ], $taskFields);
    }
}

<?php

use Faker\Factory as Faker;
use App\Models\Pomodoro;
use App\Repositories\PomodoroRepository;

trait MakePomodoroTrait
{
    /**
     * Create fake instance of Pomodoro and save it in database
     *
     * @param array $pomodoroFields
     * @return Pomodoro
     */
    public function makePomodoro($pomodoroFields = [])
    {
        /** @var PomodoroRepository $pomodoroRepo */
        $pomodoroRepo = App::make(PomodoroRepository::class);
        $theme = $this->fakePomodoroData($pomodoroFields);
        return $pomodoroRepo->create($theme);
    }

    /**
     * Get fake instance of Pomodoro
     *
     * @param array $pomodoroFields
     * @return Pomodoro
     */
    public function fakePomodoro($pomodoroFields = [])
    {
        return new Pomodoro($this->fakePomodoroData($pomodoroFields));
    }

    /**
     * Get fake data of Pomodoro
     *
     * @param array $postFields
     * @return array
     */
    public function fakePomodoroData($pomodoroFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'status_id' => $fake->randomDigitNotNull,
            'task_id' => $fake->randomDigitNotNull,
            'user_id' => $fake->randomDigitNotNull,
            'project_id' => $fake->randomDigitNotNull,
            'start' => $fake->date('Y-m-d H:i:s'),
            'end' => $fake->date('Y-m-d H:i:s'),
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_by' => $fake->randomDigitNotNull
        ], $pomodoroFields);
    }
}

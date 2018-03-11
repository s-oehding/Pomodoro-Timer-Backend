<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PomodoroApiTest extends TestCase
{
    use MakePomodoroTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreatePomodoro()
    {
        $pomodoro = $this->fakePomodoroData();
        $this->json('POST', '/api/v1/pomodoros', $pomodoro);

        $this->assertApiResponse($pomodoro);
    }

    /**
     * @test
     */
    public function testReadPomodoro()
    {
        $pomodoro = $this->makePomodoro();
        $this->json('GET', '/api/v1/pomodoros/'.$pomodoro->id);

        $this->assertApiResponse($pomodoro->toArray());
    }

    /**
     * @test
     */
    public function testUpdatePomodoro()
    {
        $pomodoro = $this->makePomodoro();
        $editedPomodoro = $this->fakePomodoroData();

        $this->json('PUT', '/api/v1/pomodoros/'.$pomodoro->id, $editedPomodoro);

        $this->assertApiResponse($editedPomodoro);
    }

    /**
     * @test
     */
    public function testDeletePomodoro()
    {
        $pomodoro = $this->makePomodoro();
        $this->json('DELETE', '/api/v1/pomodoros/'.$pomodoro->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/pomodoros/'.$pomodoro->id);

        $this->assertResponseStatus(404);
    }
}

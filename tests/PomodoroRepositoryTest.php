<?php

use App\Models\Pomodoro;
use App\Repositories\PomodoroRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PomodoroRepositoryTest extends TestCase
{
    use MakePomodoroTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var PomodoroRepository
     */
    protected $pomodoroRepo;

    public function setUp()
    {
        parent::setUp();
        $this->pomodoroRepo = App::make(PomodoroRepository::class);
    }

    /**
     * @test create
     */
    public function testCreatePomodoro()
    {
        $pomodoro = $this->fakePomodoroData();
        $createdPomodoro = $this->pomodoroRepo->create($pomodoro);
        $createdPomodoro = $createdPomodoro->toArray();
        $this->assertArrayHasKey('id', $createdPomodoro);
        $this->assertNotNull($createdPomodoro['id'], 'Created Pomodoro must have id specified');
        $this->assertNotNull(Pomodoro::find($createdPomodoro['id']), 'Pomodoro with given id must be in DB');
        $this->assertModelData($pomodoro, $createdPomodoro);
    }

    /**
     * @test read
     */
    public function testReadPomodoro()
    {
        $pomodoro = $this->makePomodoro();
        $dbPomodoro = $this->pomodoroRepo->find($pomodoro->id);
        $dbPomodoro = $dbPomodoro->toArray();
        $this->assertModelData($pomodoro->toArray(), $dbPomodoro);
    }

    /**
     * @test update
     */
    public function testUpdatePomodoro()
    {
        $pomodoro = $this->makePomodoro();
        $fakePomodoro = $this->fakePomodoroData();
        $updatedPomodoro = $this->pomodoroRepo->update($fakePomodoro, $pomodoro->id);
        $this->assertModelData($fakePomodoro, $updatedPomodoro->toArray());
        $dbPomodoro = $this->pomodoroRepo->find($pomodoro->id);
        $this->assertModelData($fakePomodoro, $dbPomodoro->toArray());
    }

    /**
     * @test delete
     */
    public function testDeletePomodoro()
    {
        $pomodoro = $this->makePomodoro();
        $resp = $this->pomodoroRepo->delete($pomodoro->id);
        $this->assertTrue($resp);
        $this->assertNull(Pomodoro::find($pomodoro->id), 'Pomodoro should not exist in DB');
    }
}

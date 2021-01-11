<?php
namespace App\Repository;

use App\Http\Controllers\Controller;
use App\Models\Task;
use App\Traits\AuthTrait;
use Illuminate\Support\Facades\Auth;

class TasksRepository {
    use AuthTrait;

    public function __construct()
    {

    }
    /**
     *  @throws \Exception
     **/

    public function getTasksOfCurrentUser(){

        $this->userAuthCheck();
        $userId = Auth::id();
        return Task::where('user_id',$userId)->orderBy('end_time','asc')->get();

    }
    public function getTasksCountOfCurrentUser(){

        return count($this->getTasksOfCurrentUser());

    }
    public function getRecentTasksOfCurrentUser($noOfTasks = 5)
    {
        $userId = Auth::id();
        return Task::where('user_id', $userId)
            ->orderBy('end_time', 'asc')
            ->whereDate('end_time', '>', new \DateTime())
            ->take($noOfTasks)
            ->get();
    }

    public function createTask($task)
    {
        $endTime = (new \DateTime($task['end_time']))->format('Y-m-d h:i:s');
        $userID = Auth::id();
        $task = Task::create([
            'name' => $task['name'],
            'description' => $task['description'],
            'end_time' => $endTime,
            'user_id' => $userID,
        ]);

        if (!$task) {
            throw new \Exception("Failure saving task");
        }

        return $task;
    }



}


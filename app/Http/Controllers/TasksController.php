<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\TasksRepository;


class TasksController extends Controller
{

    private $tasksRepository;
    public function __construct(TasksRepository $tasksRepository)
    {
        $this->middleware('auth');
        $this->tasksRepository = $tasksRepository;
    }

    public function list() {
        $tasks = $this->tasksRepository->getTasksOfCurrentUser();

        return view('tasks.list', compact('tasks'));
    }

    public function create(){

        return view('tasks.create');

    }
    public function save(Request $request){

        $this->validate($request, [
            'name' => 'required|min:10|max:255',
            'description' => 'nullable|string',
            'end_time' => 'required|after:today'
        ]);
        $savedTask = $this->tasksRepository->createTask($request->except('_token'));
        if ($savedTask) {
            return redirect(route('task.all'));
        } else {
            return view('404');
        }

    }

    public function edit($id)
    {
        $this->tasksRepository->checkIfAuthorized($id);
        return view('tasks.edit',
            ['task' => $this->tasksRepository->getTaskById($id)]);
    }

    /**
     * @param $taskId
     * @param Request $request
     * @throws \Illuminate\Validation\ValidationException
     * @throws \Exception
     */
    public function update($taskId, Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:10|max:255',
            'description' => 'nullable|string',
            'end_time' => 'required|after:today'
        ]);
        $this->tasksRepository->checkIfAuthorized($taskId);
        $task = $this->tasksRepository->saveTask($taskId, $request->except('_token'));
        if ($task) {
            return redirect(route('task.all'));
        } else {
            return view('404');
        }
    }




    public function delete($id)
    {
        $this->tasksRepository->checkIfAuthorized($id);
        $this->tasksRepository->deleteTaskById($id);
        return redirect()->back();
    }





}

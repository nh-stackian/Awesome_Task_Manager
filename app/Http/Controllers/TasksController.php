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
            //return redirect(route('task.all'));
            return redirect(route('task.list'));
        } else {
            return view('404');
        }

    }


}

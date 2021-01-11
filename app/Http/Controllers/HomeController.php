<?php

namespace App\Http\Controllers;

use App\Repository\TasksRepository;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    private $tasksRepository;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(TasksRepository $tasksRepository)
    {
        $this->middleware('auth');
        $this->tasksRepository = $tasksRepository;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $tasks=$this->tasksRepository->getRecentTasksOfCurrentUser(3);
        return view('home', compact('tasks'));
    }
}



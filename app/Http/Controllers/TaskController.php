<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\TaskRepository;
use App\Repositories\LabelRepository;

class TaskController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $taskRepository;
    private $labelRepository;
    public function __construct()
    {
        $this->taskRepository = new TaskRepository();
        $this->labelRepository = new LabelRepository();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $tasks = $this->taskRepository->index($request);

        if($request->wantsJson()) {
            return ['data' => $tasks];
        }
        return view('task.index', compact('tasks'));
    }

    public function create()
    {
        $labels = $this->labelRepository->index();

        return view('task.create', compact('labels'));
    }

    public function store(Request $request)
    {
        $task = $this->taskRepository->store($request);

        if($request->wantsJson()) {
            return ['data' => $task];
        }
        return redirect()->route('task.index')->with(['status' => 'success', 'message' => 'task created successfully']);
    }

    public function edit($id)
    {
        $task = $this->taskRepository->get($id);

        $taskLabels = $task->labels;
        $labels = $this->labelRepository->index();
        if(count($taskLabels)) {

        $taskLabels = collect($taskLabels)->pluck('id')->toArray();

        }

        return view('task.edit', compact('task', 'labels', 'taskLabels'));
    }

    public function update($id, Request $request)
    {
        $task = $this->taskRepository->update($id, $request);

        return redirect()->route('task.index')->with(['status' => 'success', 'message' => 'task created successfully']);
    }

}

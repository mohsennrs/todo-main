<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\LabelRepository;

class LabelController extends Controller
{
    private $labelRepository;
    public function __construct()
    {
        $this->labelRepository = new LabelRepository();
    }
    public function create()
    {
        $labels = $this->labelRepository->index();

        return view('label.create', compact('labels'));
    }
    public function store(Request $request)
    {
        $task = $this->labelRepository->store($request);
        if($task['error']) {
            return redirect()->route('label.create')->with(['status' => 'error', 'message' => 'error occured']);
        }
        return redirect()->route('label.create')->with(['status' => 'success', 'message' => 'label created successfully']);
    }
}

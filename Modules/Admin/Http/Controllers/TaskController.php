<?php

namespace Modules\Admin\Http\Controllers;

use Inertia\Inertia;
use App\Models\TaskStatus;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Repository\Admin\TaskRepository;
use App\Repository\Admin\UserRepository;
use App\Repository\Admin\ProjectRepository;
use Illuminate\Contracts\Support\Renderable;
use Modules\Admin\Http\Requests\TaskRequest;

class TaskController extends Controller
{


    private $userRepository;
    private $TaskRepository;
    private $projectRepository;
    
    public function __construct(UserRepository $userRepository ,ProjectRepository $projectRepository , TaskRepository $TaskRepository)
    {
        $this->userRepository = $userRepository;
        $this->TaskRepository = $TaskRepository;
        $this->projectRepository = $projectRepository;
    }
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $projects = $this->projectRepository->allCompanyProjects();
        return Inertia::render('Admin/TaskIndex', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('admin::create');

    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(TaskRequest $request)
    {
        $task = $this->TaskRepository->store($request);
        if($task)return back()->with('successMessage', 'Task created successfully!');
        return back()->with('errorMessage', 'problem with task creating!');
        
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $project = $this->projectRepository->find($id);
        $tasks = $this->TaskRepository->getCompanyTask($id);
        $employers = $this->userRepository->AllCompanyUsers();
        $status = TaskStatus::all(['id','name']);

        return Inertia::render('Admin/Task',compact('project','employers','status','tasks'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('admin::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        $taskUpdate = $this->TaskRepository->taskStatusUpdate($request,$id);
        if($taskUpdate)return back()->with('successMessage', 'Task updated successfully!');
        return back()->with('errorMessage', 'problem with task updating!');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}

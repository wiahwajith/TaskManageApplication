<?php

namespace Modules\Admin\Http\Controllers;

use App\Repository\Admin\ProjectRepository;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Repository\Admin\UserRepository;
use Illuminate\Contracts\Support\Renderable;

class ProjectController extends Controller
{

    private $userRepository;
    private $projectRepository;
    
    public function __construct(UserRepository $userRepository ,ProjectRepository $projectRepository)
    {
        $this->userRepository = $userRepository;
        $this->projectRepository = $projectRepository;
    }
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $employers = $this->userRepository->AllCompanyUsers();
        $projects = $this->projectRepository->allCompanyProjects();
        $projectStatus = $this->projectRepository->allProjectStatus();
        return Inertia::render('Admin/Projects',compact('employers','projects','projectStatus') );
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
    public function store(Request $request)
    {
        $project = $this->projectRepository->createProject($request);
        if($project)return back()->with('successMessage', 'project created successfully!');
        return back()->with('errorMessage', 'problem with project creating!');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('admin::show');
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
        $updatedProject = $this->projectRepository->updateProject($request,$id);
        if($updatedProject)return back()->with('successMessage', 'project updated successfully!');
        return back()->with('errorMessage', 'problem with project updating!');
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

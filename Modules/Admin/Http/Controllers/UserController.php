<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\Admin\Company;
use App\Models\Admin\Employer;
use Carbon\Carbon;
use App\Models\User;
use Inertia\Inertia;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Repository\Admin\UserRepository;
use Illuminate\Contracts\Support\Renderable;
use Modules\Admin\Http\Requests\UserRequest;

class UserController extends Controller
{

    private $userRepository;
    
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $employers = $this->userRepository->AllCompanyEmployers();
        $roles = $this->userRepository->allUserRoles();

        return Inertia::render('Admin/UserAdd',compact(['employers','roles']));
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
    public function store(UserRequest $request)
    {

        $create = $this->userRepository->addEmployer($request);
        if($create)return back()->with('successMessage', 'User add successfully!');
        return back()->with('errorMessage', 'problem with employer creating!');

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
        //
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

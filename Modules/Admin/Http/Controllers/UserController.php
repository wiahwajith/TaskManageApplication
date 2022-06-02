<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use Illuminate\Http\Request;

use Illuminate\Routing\Controller;
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
        $Users = $this->userRepository->AllUser();
        $roles = $this->userRepository->allUserRoles();
        return Inertia::render('Admin/UserAdd',compact('Users','roles'));
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
        $tempPassword = Hash::make('password');
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $tempPassword,
        ])->company([
            'name'=> $request->name ??null,
            'email'=> $request->email ??null,
            'web'=> $request->web ??null,
            'city'=> $request->city ??null,
            'address'=> $request->address ??null,
            'contact_number'=> $request->contact_number ??null,
        ]);

        return $user;

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

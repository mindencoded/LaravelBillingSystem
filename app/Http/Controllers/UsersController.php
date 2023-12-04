<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class UsersController extends Controller
{

    function __construct()
    {
        $this->middleware('auth');
        $this->middleware('roles:admin', ['except' => ['edit', 'update', 'show']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $users = User::with(['roles', 'note', 'tags'])->get();
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $roles = Role::pluck('description', 'id');
        $user = new User();
        return view('admin.users.create', compact('user', 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     * @param StoreUserRequest $request
     * @return RedirectResponse
     */
    public function store(StoreUserRequest $request): RedirectResponse
    {
        $user = (new User)->fill($request->all());
        $user->avatar =  $request->file('avatar')->store('public');
        $user->save();
        $user->roles()->attach($request->roles);
        return redirect()->route('users.index')->with('success', 'User created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        $user = User::findOrFail($id);
        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param string $id
     * @return View
     * @throws AuthorizationException
     */
    public function edit(string $id): View
    {
        //$user = User::whereId($id)->get();
        $user = User::findOrFail($id);
        $roles = Role::pluck('description', 'id');
        $this->authorize($user);
        return view('admin.users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     * @param UpdateUserRequest $request
     * @param string $id
     * @return RedirectResponse
     * @throws AuthorizationException
     */
    public function update(UpdateUserRequest $request, string $id): RedirectResponse
    {
        $user = User::findOrFail($id);
        $this->authorize($user);
        if ($request->hasFile('avatar')) {
            $user->avatar = $request->file('avatar')->store('public');
        }
        $user->update($request->only('name', 'email'));
        $roles = $request->input('roles');
        $user->roles()->sync($roles);
        return back()->with('success', 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     * @param string $id
     * @return RedirectResponse
     * @throws AuthorizationException
     */
    public function destroy(string $id): RedirectResponse
    {
        $user = User::findOrFail($id);
        $this->authorize($user);
        $user->delete();
        return back()->with('success', 'User deleted successfully');;
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\DataTables\UserDataTable;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index(UserDataTable $dataTable)
    {
        if (request()->ajax()) {
            return $dataTable->ajax()->content();
        }
        return view('dashboard.users.index');
    }
    public function create()
    {
        $user = new User;
        $roles = Role::pluck('name', 'name')->all();
        return view('dashboard.users.create', compact('user', 'roles'));

    }
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::pluck('name', 'name')->all();
        $userRole = $user->roles->pluck('name', 'name')->all();
        return view('dashboard.users.edit', compact('user', 'roles', 'userRole'));

    }
    public function store(UserRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,

        ]);
        $user->assignRole($request->input('roles'));
        return redirect()->route('admin.users.index')
            ->with('success', 'User created successfully');

    }
    public function update(UserRequest $request)
    {
        $id = $request->id;
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->password != null) {
            $user->password = $request->password;
        }
        $user->save();
        DB::table('model_has_roles')->where('model_id', $id)->delete();

        $user->assignRole($request->input('roles'));
        return redirect()->route('admin.users.index')
            ->with('success', 'User Updated successfully');

    }
    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('admin.users.index')
            ->with('success', 'User Deleted successfully');
    }
}
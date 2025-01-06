<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Manajemen Users',
            'breadcrumbs' => [
                [
                    'title' => 'Dashboard',
                ],
                [
                    'title' => 'Manajemen User',
                ],
            ],
            'mods' => 'users',
            'roles' => Role::all(),
        ];
        return view('admins.user.index', $data);
    }

    public function getData()
    {
        return DataTables::of(User::with(['roles'])->get())->make();
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try{
            $request->validate([
                'name' => 'required',
                'email' => 'required',
                'password' => 'required',
                'role' => 'required',
            ]);

            $request->merge([
                'password' => Hash::make($request->password),
            ]);

            User::create($request->only(['name', 'email', 'password']))->assignRole($request->role);
            DB::commit();
            return response()->json([
                'message' => 'Successfully added data'
            ], 200);
        }catch(\Exception $e){
            DB::rollBack();
            return response()->json([
                'message' => 'Oops, Error add data'
            ], 500);
        }
    }
    public function update(User $user, Request $request)
    {
        DB::beginTransaction();
        try{
            $request->validate([
                'name' => 'required',
                'email' => 'required',
                'role' => 'required',
            ]);

            $user->update($request->only(['name', 'email']));
            $user->syncRoles($request->role);
            DB::commit();
            return response()->json([
                'message' => 'Successfully updated data'
            ], 200);
        }catch(\Exception $e){
            DB::rollBack();
            return response()->json([
                'message' => 'Oops, Error add data'
            ], 500);
        }
    }

    public function destroy(User $user)
    {
        try {
            $user->delete();

            return response()->json([
                'message' => 'User successfully deleted'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Oops! An error occurred, please check again!',
            ], 500);
        }
    }
}

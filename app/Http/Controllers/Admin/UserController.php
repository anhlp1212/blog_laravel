<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\User\UserRepository;
use App\Repositories\Role\RoleRepository;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    protected $userRepo;
    protected $roleRepo;

    public function __construct(UserRepository $userRepo, RoleRepository $roleRepo)
    {
        $this->userRepo = $userRepo;
        $this->roleRepo = $roleRepo;
    }

    public function index()
    {
        $users = $this->userRepo->getAllOrderByDesc();
        $roles = $this->roleRepo->getAll();
        if (!$roles) {
            abort(404);
        }
        return view('admin.users.users', ['users' => $users, 'roles' => $roles, 'title' => 'Users Management']);
    }

    public function detail($user_id)
    {
        $user = $this->userRepo->find($user_id);
        if (!$user) {
            abort(404);
        }
        return view('admin.users.detail', ['user' => $user, 'title' => 'User Detail']);
    }

    public function addUserPage()
    {
        $roles = $this->roleRepo->getAll();
        if (!$roles) {
            abort(404);
        }
        return view('admin.users.add_user', ['title' => 'Add User', 'roles' => $roles]);
    }

    public function addUser(UserRequest $request)
    {
        try {
            $data = $request->all();
            $this->userRepo->create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'role_id' => $data['roles']
            ]);
            return redirect()->route('user.users');
        } catch (Exception $e) {
            return redirect()->back()->with('warning', 'Unable to process request. Error: ' . $e->getMessage());
        }
    }

    public function editUserPage($user_id)
    {
        $user = $this->userRepo->find($user_id);
        if (!$user) {
            abort(404);
        }
        $roles = $this->roleRepo->getAll();
        if (!$roles) {
            abort(404);
        }
        return view('admin.users.edit_user', ['user' => $user, 'roles' => $roles, 'title' => 'Edit User']);
    }

    public function editUser(UserRequest $request)
    {
        try {
            $data = $request->all();
            $dataUpdate = [
                'name' => $data['name'],
                'email' => $data['email'],
                'role_id' => $data['roles'],
            ];
            if ($data['password']) {
                $dataUpdate['password'] = Hash::make($data['password']);
            }
            $this->userRepo->update(
                $data['id'],
                $dataUpdate
            );
            return redirect()->route('user.users');
        } catch (Exception $e) {
            return redirect()->back()->with('warning', 'Unable to process request. Error: ' . $e->getMessage());
        }
    }

    public function deleteUser($user_id)
    {
        try {
            $user = $this->userRepo->delete($user_id);
            if ($user) {
                return response()->json([
                    'status' => 'success',
                    'message' => 'Deleted successfully!'
                ], 200);
            } else {
                return response()->json([
                    'status' => 'false',
                    'message' => 'Error'
                ], 200);
            }
        } catch (Exception $e) {
            Log::error('Caught exception: ',  $e->getMessage(), "\n");
        }
    }

    public function changeRole(Request $request)
    {
        // try {
        $data = $request->all();
        $user = $this->userRepo->update(
            $data['id'],
            ['role_id' => $data['role_id'],]
        );
        if ($user) {
            return response()->json([
                'status' => 'success',
                'message' => 'Updated successfully!'
            ], 200);
        } else {
            return response()->json([
                'status' => 'false',
                'message' => 'Error'
            ], 200);
        }
        // } catch (Exception $e) {
        //     return redirect()->back()->with('warning', 'Unable to process request. Error: ' . $e->getMessage());
        // }
    }
}

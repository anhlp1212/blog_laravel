<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\User\UserRepository;
use App\Repositories\Role\RoleRepository;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use Exception;

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
        return view('admin.users.users', ['users' => $users, 'title' => 'Users Management']);
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
}

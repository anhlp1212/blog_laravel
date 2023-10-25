<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use App\Models\User;
use Illuminate\View\View;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct(
        protected UserRepository $users,
    ) {}
 
    /**
     * Show the profile for the given user.
     */
    public function show(string $id): View
    {
        $user = $this->users->find($id);
 
        return view('user.profile', ['user' => $user]);
    }
}

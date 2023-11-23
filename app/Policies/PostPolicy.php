<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\Admin;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can update the model.
     */

    public function update(Admin $user, Post $post): bool
    {
        return ($user->hasRole('admin') || $user->id == $post->admin_id);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(Admin $user): bool
    {
        return ($user && $user->hasRole('admin'));
    }
}

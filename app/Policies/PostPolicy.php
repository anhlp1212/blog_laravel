<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\Admin;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class PostPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can create models.
     */
    public function create(Admin $user): bool
    {
        return ($user &&  $user->hasPermission('add_post'));
    }

    /**
     * Determine whether the user can update the model.
     */

    public function update(Admin $user): bool
    {
        return ($user && $user->hasPermission('edit_post'));
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(Admin $user): bool
    {
        return ($user && $user->hasPermission('delete_post'));
    }
}

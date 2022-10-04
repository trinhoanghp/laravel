<?php

namespace App\Policies;

use App\Models\Category;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CategoryPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        return true;
    }

    public function view(User $user, Category $category)
    {
        return true;
    }

    public function create(User $user)
    {
        return $user->checkPermisstion('add_category'); 
    }

    public function update(User $user)
    {
        return $user->checkPermisstion('edit_category'); 
    }

    public function delete(User $user)
    {
        return $user->checkPermisstion('delete_category'); 
    }


    public function restore(User $user)
    {
        return true;
    }

    public function forceDelete(User $user)
    {
        return true;
    }
}

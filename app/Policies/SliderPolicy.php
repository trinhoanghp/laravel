<?php

namespace App\Policies;

use App\Models\Slider;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SliderPolicy
{
    use HandlesAuthorization;
    public function viewAny(User $user)
    {
        return true;
    }

    public function view(User $user, Slider $slider)
    {
       return true;
    }
    public function create(User $user)
    {
        return $user->checkPermisstion('add_slider'); 
    }
    public function update(User $user)
    {
        return $user->checkPermisstion('edit_slider'); 
    }
    public function delete(User $user)
    {
        return $user->checkPermisstion('delete_slider'); 
    }
    public function restore(User $user, Slider $slider)
    {
        return true;
    }
    public function forceDelete(User $user, Slider $slider)
    {
         return true;
    }
}

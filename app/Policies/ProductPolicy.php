<?php

namespace App\Policies;

use App\Models\Product;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ProductPolicy 
{
    use HandlesAuthorization, AuthorizesRequests;
  
    public function viewAny(User $user)
    { 
       return true;
        
    }
    public function view(User $user)
    {
        return true;
    }

    public function create(User $user)
    {
        return $user->checkPermisstion('add_product'); 
    }

    public function update(User $user)
    {
        return $user->checkPermisstion('edit_product'); 
    }

    public function delete(User $user)
    {   
        return $user->checkPermisstion('delete_product'); 
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

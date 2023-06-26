<?php

namespace App\Policies;

use App\Models\Penulis;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class PenulisPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Penulis $penulis): bool
    {
        if ($user->level =='admin' || $user->level =='operator'){
            return true;
        }

        if($user->penulis_id == $penulis->id){
            return true;
        }

        return false;
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        if ($user->level =='admin' || $user->level =='operator'){
            return true;
        }

        return false;
        //
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Penulis $penulis): bool
    {
        if ($user->level =='admin' || $user->level =='operator'){
            return true;
        }

        if($user->penulis_id == $penulis->id){
            return true;
        }

        return false;
        //
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Penulis $penulis): bool
    {
        if ($user->level =='admin' ){
            return true;
        }

        return false;
        //
    }
}

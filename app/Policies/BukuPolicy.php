<?php

namespace App\Policies;

use App\Models\Buku;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class BukuPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Buku $buku): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        if ($user->level == 'admin' || $user->level == 'operator') {
            return true;
        }
        

        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Buku $buku): bool
    {
        if ($user->level == 'admin' || $user->level == 'operator') {
            return true;
        }

        // Implement your additional logic here if needed

        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Buku $buku): bool
    {
        if ($user->level == 'admin') {
            return true;
        }

        return false;
    }
}

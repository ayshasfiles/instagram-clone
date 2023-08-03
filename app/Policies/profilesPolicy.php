<?php

namespace App\Policies;

use App\Models\User;
use App\Models\profiles;
use Illuminate\Auth\Access\Response;

class profilesPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, profiles $profiles): bool
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, profiles $profiles): bool
    {
        return $user->id == $profiles->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, profiles $profiles): bool
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, profiles $profiles): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, profiles $profiles): bool
    {
        //
    }
}

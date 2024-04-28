<?php

namespace App\Policies;

use App\Models\User;
use App\Models\userProfile;
use Illuminate\Auth\Access\Response;

class ProfilePolicy
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
    public function view(User $user, userProfile $userProfile)
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user , userProfile $userProfile)
    {
       /*  dd($userProfile->id); */
        /* return $userProfile->id === $userProfile->user_id ? Response::allow() : Response::deny(); */

        return $user->id === $userProfile->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, userProfile $userProfile)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, userProfile $userProfile)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, userProfile $userProfile)
    {
        //
    }
}

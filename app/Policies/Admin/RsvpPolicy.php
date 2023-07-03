<?php

namespace App\Policies\Admin;

use App\Models\Rsvp;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RsvpPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the rsvp can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list rsvps');
    }

    /**
     * Determine whether the rsvp can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Rsvp  $model
     * @return mixed
     */
    public function view(User $user, Rsvp $model)
    {
        return $user->hasPermissionTo('view rsvps');
    }

    /**
     * Determine whether the rsvp can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create rsvps');
    }

    /**
     * Determine whether the rsvp can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Rsvp  $model
     * @return mixed
     */
    public function update(User $user, Rsvp $model)
    {
        return $user->hasPermissionTo('update rsvps');
    }

    /**
     * Determine whether the rsvp can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Rsvp  $model
     * @return mixed
     */
    public function delete(User $user, Rsvp $model)
    {
        return $user->hasPermissionTo('delete rsvps');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Rsvp  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete rsvps');
    }

    /**
     * Determine whether the rsvp can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Rsvp  $model
     * @return mixed
     */
    public function restore(User $user, Rsvp $model)
    {
        return false;
    }

    /**
     * Determine whether the rsvp can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Rsvp  $model
     * @return mixed
     */
    public function forceDelete(User $user, Rsvp $model)
    {
        return false;
    }
}

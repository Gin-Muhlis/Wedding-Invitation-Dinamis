<?php

namespace App\Policies\Admin;

use App\Models\User;
use App\Models\InvitedGuest;
use Illuminate\Auth\Access\HandlesAuthorization;

class InvitedGuestPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the invitedGuest can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list invitedguests');
    }

    /**
     * Determine whether the invitedGuest can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\InvitedGuest  $model
     * @return mixed
     */
    public function view(User $user, InvitedGuest $model)
    {
        return $user->hasPermissionTo('view invitedguests');
    }

    /**
     * Determine whether the invitedGuest can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create invitedguests');
    }

    /**
     * Determine whether the invitedGuest can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\InvitedGuest  $model
     * @return mixed
     */
    public function update(User $user, InvitedGuest $model)
    {
        return $user->hasPermissionTo('update invitedguests');
    }

    /**
     * Determine whether the invitedGuest can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\InvitedGuest  $model
     * @return mixed
     */
    public function delete(User $user, InvitedGuest $model)
    {
        return $user->hasPermissionTo('delete invitedguests');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\InvitedGuest  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete invitedguests');
    }

    /**
     * Determine whether the invitedGuest can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\InvitedGuest  $model
     * @return mixed
     */
    public function restore(User $user, InvitedGuest $model)
    {
        return false;
    }

    /**
     * Determine whether the invitedGuest can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\InvitedGuest  $model
     * @return mixed
     */
    public function forceDelete(User $user, InvitedGuest $model)
    {
        return false;
    }
}

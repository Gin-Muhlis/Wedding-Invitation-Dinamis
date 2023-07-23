<?php

namespace App\Policies\Admin;

use App\Models\User;
use App\Models\ReplyRsvp;
use Illuminate\Auth\Access\HandlesAuthorization;

class ReplyRsvpPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the replyRsvp can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list replyrsvps');
    }

    /**
     * Determine whether the replyRsvp can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ReplyRsvp  $model
     * @return mixed
     */
    public function view(User $user, ReplyRsvp $model)
    {
        return $user->hasPermissionTo('view replyrsvps');
    }

    /**
     * Determine whether the replyRsvp can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create replyrsvps');
    }

    /**
     * Determine whether the replyRsvp can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ReplyRsvp  $model
     * @return mixed
     */
    public function update(User $user, ReplyRsvp $model)
    {
        return $user->hasPermissionTo('update replyrsvps');
    }

    /**
     * Determine whether the replyRsvp can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ReplyRsvp  $model
     * @return mixed
     */
    public function delete(User $user, ReplyRsvp $model)
    {
        return $user->hasPermissionTo('delete replyrsvps');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ReplyRsvp  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete replyrsvps');
    }

    /**
     * Determine whether the replyRsvp can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ReplyRsvp  $model
     * @return mixed
     */
    public function restore(User $user, ReplyRsvp $model)
    {
        return false;
    }

    /**
     * Determine whether the replyRsvp can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ReplyRsvp  $model
     * @return mixed
     */
    public function forceDelete(User $user, ReplyRsvp $model)
    {
        return false;
    }
}

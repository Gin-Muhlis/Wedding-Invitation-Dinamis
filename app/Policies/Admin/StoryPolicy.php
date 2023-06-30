<?php

namespace App\Policies\Admin;

use App\Models\User;
use App\Models\Story;
use Illuminate\Auth\Access\HandlesAuthorization;

class StoryPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the story can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list stories');
    }

    /**
     * Determine whether the story can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Story  $model
     * @return mixed
     */
    public function view(User $user, Story $model)
    {
        return $user->hasPermissionTo('view stories');
    }

    /**
     * Determine whether the story can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create stories');
    }

    /**
     * Determine whether the story can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Story  $model
     * @return mixed
     */
    public function update(User $user, Story $model)
    {
        return $user->hasPermissionTo('update stories');
    }

    /**
     * Determine whether the story can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Story  $model
     * @return mixed
     */
    public function delete(User $user, Story $model)
    {
        return $user->hasPermissionTo('delete stories');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Story  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete stories');
    }

    /**
     * Determine whether the story can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Story  $model
     * @return mixed
     */
    public function restore(User $user, Story $model)
    {
        return false;
    }

    /**
     * Determine whether the story can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Story  $model
     * @return mixed
     */
    public function forceDelete(User $user, Story $model)
    {
        return false;
    }
}

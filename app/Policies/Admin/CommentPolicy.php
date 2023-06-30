<?php

namespace App\Policies\Admin;

use App\Models\User;
use App\Models\Comment;
use Illuminate\Auth\Access\HandlesAuthorization;

class CommentPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the comment can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list comments');
    }

    /**
     * Determine whether the comment can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Comment  $model
     * @return mixed
     */
    public function view(User $user, Comment $model)
    {
        return $user->hasPermissionTo('view comments');
    }

    /**
     * Determine whether the comment can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create comments');
    }

    /**
     * Determine whether the comment can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Comment  $model
     * @return mixed
     */
    public function update(User $user, Comment $model)
    {
        return $user->hasPermissionTo('update comments');
    }

    /**
     * Determine whether the comment can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Comment  $model
     * @return mixed
     */
    public function delete(User $user, Comment $model)
    {
        return $user->hasPermissionTo('delete comments');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Comment  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete comments');
    }

    /**
     * Determine whether the comment can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Comment  $model
     * @return mixed
     */
    public function restore(User $user, Comment $model)
    {
        return false;
    }

    /**
     * Determine whether the comment can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Comment  $model
     * @return mixed
     */
    public function forceDelete(User $user, Comment $model)
    {
        return false;
    }
}

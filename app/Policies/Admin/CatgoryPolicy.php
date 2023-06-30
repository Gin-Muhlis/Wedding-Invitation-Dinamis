<?php

namespace App\Policies\Admin;

use App\Models\User;
use App\Models\Catgory;
use Illuminate\Auth\Access\HandlesAuthorization;

class CatgoryPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the catgory can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list catgories');
    }

    /**
     * Determine whether the catgory can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Catgory  $model
     * @return mixed
     */
    public function view(User $user, Catgory $model)
    {
        return $user->hasPermissionTo('view catgories');
    }

    /**
     * Determine whether the catgory can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create catgories');
    }

    /**
     * Determine whether the catgory can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Catgory  $model
     * @return mixed
     */
    public function update(User $user, Catgory $model)
    {
        return $user->hasPermissionTo('update catgories');
    }

    /**
     * Determine whether the catgory can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Catgory  $model
     * @return mixed
     */
    public function delete(User $user, Catgory $model)
    {
        return $user->hasPermissionTo('delete catgories');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Catgory  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete catgories');
    }

    /**
     * Determine whether the catgory can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Catgory  $model
     * @return mixed
     */
    public function restore(User $user, Catgory $model)
    {
        return false;
    }

    /**
     * Determine whether the catgory can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Catgory  $model
     * @return mixed
     */
    public function forceDelete(User $user, Catgory $model)
    {
        return false;
    }
}

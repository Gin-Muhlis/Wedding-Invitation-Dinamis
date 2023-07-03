<?php

namespace App\Policies\Admin;

use App\Models\User;
use App\Models\FiturCategory;
use Illuminate\Auth\Access\HandlesAuthorization;

class FiturCategoryPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the fiturCategory can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list fiturcategories');
    }

    /**
     * Determine whether the fiturCategory can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\FiturCategory  $model
     * @return mixed
     */
    public function view(User $user, FiturCategory $model)
    {
        return $user->hasPermissionTo('view fiturcategories');
    }

    /**
     * Determine whether the fiturCategory can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create fiturcategories');
    }

    /**
     * Determine whether the fiturCategory can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\FiturCategory  $model
     * @return mixed
     */
    public function update(User $user, FiturCategory $model)
    {
        return $user->hasPermissionTo('update fiturcategories');
    }

    /**
     * Determine whether the fiturCategory can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\FiturCategory  $model
     * @return mixed
     */
    public function delete(User $user, FiturCategory $model)
    {
        return $user->hasPermissionTo('delete fiturcategories');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\FiturCategory  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete fiturcategories');
    }

    /**
     * Determine whether the fiturCategory can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\FiturCategory  $model
     * @return mixed
     */
    public function restore(User $user, FiturCategory $model)
    {
        return false;
    }

    /**
     * Determine whether the fiturCategory can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\FiturCategory  $model
     * @return mixed
     */
    public function forceDelete(User $user, FiturCategory $model)
    {
        return false;
    }
}

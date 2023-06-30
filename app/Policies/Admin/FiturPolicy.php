<?php

namespace App\Policies\Admin;

use App\Models\User;
use App\Models\Fitur;
use Illuminate\Auth\Access\HandlesAuthorization;

class FiturPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the fitur can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list fiturs');
    }

    /**
     * Determine whether the fitur can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Fitur  $model
     * @return mixed
     */
    public function view(User $user, Fitur $model)
    {
        return $user->hasPermissionTo('view fiturs');
    }

    /**
     * Determine whether the fitur can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create fiturs');
    }

    /**
     * Determine whether the fitur can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Fitur  $model
     * @return mixed
     */
    public function update(User $user, Fitur $model)
    {
        return $user->hasPermissionTo('update fiturs');
    }

    /**
     * Determine whether the fitur can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Fitur  $model
     * @return mixed
     */
    public function delete(User $user, Fitur $model)
    {
        return $user->hasPermissionTo('delete fiturs');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Fitur  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete fiturs');
    }

    /**
     * Determine whether the fitur can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Fitur  $model
     * @return mixed
     */
    public function restore(User $user, Fitur $model)
    {
        return false;
    }

    /**
     * Determine whether the fitur can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Fitur  $model
     * @return mixed
     */
    public function forceDelete(User $user, Fitur $model)
    {
        return false;
    }
}

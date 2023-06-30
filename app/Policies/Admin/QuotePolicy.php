<?php

namespace App\Policies\Admin;

use App\Models\User;
use App\Models\Quote;
use Illuminate\Auth\Access\HandlesAuthorization;

class QuotePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the quote can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list quotes');
    }

    /**
     * Determine whether the quote can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Quote  $model
     * @return mixed
     */
    public function view(User $user, Quote $model)
    {
        return $user->hasPermissionTo('view quotes');
    }

    /**
     * Determine whether the quote can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create quotes');
    }

    /**
     * Determine whether the quote can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Quote  $model
     * @return mixed
     */
    public function update(User $user, Quote $model)
    {
        return $user->hasPermissionTo('update quotes');
    }

    /**
     * Determine whether the quote can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Quote  $model
     * @return mixed
     */
    public function delete(User $user, Quote $model)
    {
        return $user->hasPermissionTo('delete quotes');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Quote  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete quotes');
    }

    /**
     * Determine whether the quote can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Quote  $model
     * @return mixed
     */
    public function restore(User $user, Quote $model)
    {
        return false;
    }

    /**
     * Determine whether the quote can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Quote  $model
     * @return mixed
     */
    public function forceDelete(User $user, Quote $model)
    {
        return false;
    }
}

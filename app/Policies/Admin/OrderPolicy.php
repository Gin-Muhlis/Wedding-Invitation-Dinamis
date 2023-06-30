<?php

namespace App\Policies\Admin;

use App\Models\User;
use App\Models\Order;
use Illuminate\Auth\Access\HandlesAuthorization;

class OrderPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the order can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list orders');
    }

    /**
     * Determine whether the order can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Order  $model
     * @return mixed
     */
    public function view(User $user, Order $model)
    {
        return $user->hasPermissionTo('view orders');
    }

    /**
     * Determine whether the order can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create orders');
    }

    /**
     * Determine whether the order can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Order  $model
     * @return mixed
     */
    public function update(User $user, Order $model)
    {
        return $user->hasPermissionTo('update orders');
    }

    /**
     * Determine whether the order can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Order  $model
     * @return mixed
     */
    public function delete(User $user, Order $model)
    {
        return $user->hasPermissionTo('delete orders');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Order  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete orders');
    }

    /**
     * Determine whether the order can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Order  $model
     * @return mixed
     */
    public function restore(User $user, Order $model)
    {
        return false;
    }

    /**
     * Determine whether the order can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Order  $model
     * @return mixed
     */
    public function forceDelete(User $user, Order $model)
    {
        return false;
    }
}

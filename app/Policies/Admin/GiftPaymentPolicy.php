<?php

namespace App\Policies\Admin;

use App\Models\User;
use App\Models\GiftPayment;
use Illuminate\Auth\Access\HandlesAuthorization;

class GiftPaymentPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the giftPayment can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list giftpayments');
    }

    /**
     * Determine whether the giftPayment can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\GiftPayment  $model
     * @return mixed
     */
    public function view(User $user, GiftPayment $model)
    {
        return $user->hasPermissionTo('view giftpayments');
    }

    /**
     * Determine whether the giftPayment can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create giftpayments');
    }

    /**
     * Determine whether the giftPayment can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\GiftPayment  $model
     * @return mixed
     */
    public function update(User $user, GiftPayment $model)
    {
        return $user->hasPermissionTo('update giftpayments');
    }

    /**
     * Determine whether the giftPayment can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\GiftPayment  $model
     * @return mixed
     */
    public function delete(User $user, GiftPayment $model)
    {
        return $user->hasPermissionTo('delete giftpayments');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\GiftPayment  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete giftpayments');
    }

    /**
     * Determine whether the giftPayment can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\GiftPayment  $model
     * @return mixed
     */
    public function restore(User $user, GiftPayment $model)
    {
        return false;
    }

    /**
     * Determine whether the giftPayment can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\GiftPayment  $model
     * @return mixed
     */
    public function forceDelete(User $user, GiftPayment $model)
    {
        return false;
    }
}

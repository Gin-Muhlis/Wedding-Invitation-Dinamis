<?php

namespace App\Policies\Admin;

use App\Models\Faq;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class FaqPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the faq can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list faqs');
    }

    /**
     * Determine whether the faq can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Faq  $model
     * @return mixed
     */
    public function view(User $user, Faq $model)
    {
        return $user->hasPermissionTo('view faqs');
    }

    /**
     * Determine whether the faq can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create faqs');
    }

    /**
     * Determine whether the faq can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Faq  $model
     * @return mixed
     */
    public function update(User $user, Faq $model)
    {
        return $user->hasPermissionTo('update faqs');
    }

    /**
     * Determine whether the faq can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Faq  $model
     * @return mixed
     */
    public function delete(User $user, Faq $model)
    {
        return $user->hasPermissionTo('delete faqs');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Faq  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete faqs');
    }

    /**
     * Determine whether the faq can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Faq  $model
     * @return mixed
     */
    public function restore(User $user, Faq $model)
    {
        return false;
    }

    /**
     * Determine whether the faq can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Faq  $model
     * @return mixed
     */
    public function forceDelete(User $user, Faq $model)
    {
        return false;
    }
}

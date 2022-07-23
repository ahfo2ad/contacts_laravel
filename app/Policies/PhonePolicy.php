<?php

namespace App\Policies;

use App\Models\Phone;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PhonePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Phone  $phone
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Phone $phone)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        // if i want to let specific user can only add new phones
        // return $user->id == 1;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Phone  $phone
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Phone $phone)
    {
        return $user->id === $phone->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Phone  $phone
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Phone $phone)
    {
        return $user->id === $phone->user_id;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Phone  $phone
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Phone $phone)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Phone  $phone
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Phone $phone)
    {
        //
    }
}
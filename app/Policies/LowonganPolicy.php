<?php

namespace App\Policies;

use App\Models\Lowongan;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class LowonganPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Lowongan $lowongan): bool
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Lowongan $lowongan)
{
    return $user->perusahaan_id === $lowongan->perusahaan_id;
}
    /**
     * Determine whether the user can delete the model.
     */

public function delete(User $user, Lowongan $lowongan)
{
    return $user->perusahaan_id === $lowongan->perusahaan_id;
}

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Lowongan $lowongan): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Lowongan $lowongan): bool
    {
        //
    }
}

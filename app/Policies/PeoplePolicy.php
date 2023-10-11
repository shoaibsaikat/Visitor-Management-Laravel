<?php

namespace App\Policies;

use App\Models\User;

class PeoplePolicy
{
    /**
     * Determine whether the user can modify models.
     */
    public function modify(User $user): bool
    {
        return $user->can_manage_people;
    }
}

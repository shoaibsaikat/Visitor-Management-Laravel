<?php

namespace App\Policies;

use App\Models\User;
use App\Models\VisitorHistory;
use Illuminate\Auth\Access\Response;

class VisitorHistoryPolicy
{
    /**
     * Determine whether the user can modify models.
     */
    public function modify(User $user): bool
    {
        return $user->can_manage_people;
    }
}

<?php

namespace App\Policies;

use App\Models\League;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class LeaguePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        /* Every User */
        return true;
    }
        
    /**
     * Determine whether the user can view the model.
    */
    public function view(User $user, League $league): bool
    {
        /* Only the Leage Members or Admin */
        return $user->id === $league->user_id || $user->isAdmin(); // TODO DA MODIFICARE CON GLI ENUM DI LEAGUE_MEMBERSHIP->ROLE
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        /* Every User */
        return true;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, League $league): bool
    {
        /* Only the Leage Owner or Admin */
        return $user->id === $league->user_id || $user->isAdmin(); // TODO DA MODIFICARE CON GLI ENUM DI LEAGUE_MEMBERSHIP->ROLE
    }
        
    /**
     * Determine whether the user can delete the model.
    */
    public function delete(User $user, League $league): bool
    {
        /* Only the Leage Owner or Admin */
        return  $user->id === $league->user_id || $user->isAdmin(); // DA MODIFICARE CON GLI ENUM DI LEAGUE_MEMBERSHIP->ROLE
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, League $league): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, League $league): bool
    {
        return false;
    }
}

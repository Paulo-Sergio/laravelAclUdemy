<?php

namespace App\Policies;

use App\User;
use App\Chamado;
use Illuminate\Auth\Access\HandlesAuthorization;

class ChamadoTestePolicy
{
    use HandlesAuthorization;

    public function before($user, $ability)
    {
        /*if ($user->eAdmin()) {
            return true;
        }*/
    }

    /**
     * Determine whether the user can view the chamado.
     *
     * @param  \App\User  $user
     * @param  \App\Chamado  $chamado
     * @return mixed
     */
    public function view(User $user, Chamado $chamado)
    {
        return $user->id == $chamado->user_id;
    }

    /**
     * Determine whether the user can create chamados.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the chamado.
     *
     * @param  \App\User  $user
     * @param  \App\Chamado  $chamado
     * @return mixed
     */
    public function update(User $user, Chamado $chamado)
    {
        return $user->id == $chamado->user_id;
    }

    /**
     * Determine whether the user can delete the chamado.
     *
     * @param  \App\User  $user
     * @param  \App\Chamado  $chamado
     * @return mixed
     */
    public function delete(User $user, Chamado $chamado)
    {
        return $user->id == $chamado->user_id;
    }
}

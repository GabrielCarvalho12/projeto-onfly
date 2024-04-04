<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Despesas;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Hash;

class DespesasPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function verDespesa(User $user, Despesas $despesa)
    {
        return $user->id === $despesa->usuario;
    }
}

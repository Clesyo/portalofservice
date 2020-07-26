<?php

namespace App\Policies;

use App\Models\Service;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ServicePolicy
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

    public function createService(User $user, Service $service)
    {
        return $user->id == $service->company->user_id;
    }
}

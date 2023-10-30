<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function before(User $authUser, string $ability)
    {
        return $authUser->isAdmin();
    }

    public function edit(User $authUser, User $user)
    {
        return $this->checkUser($authUser, $user);
    }

    public function update(User $authUser, User $user)
    {
        return $this->checkUser($authUser, $user);
    }

    public function destroy(User $authUser, User $user)
    {
        return $this->checkUser($authUser, $user);
    }

    private function checkUser(User $authUser, User $user) {
        return $authUser->id == $user->id;
    }
}

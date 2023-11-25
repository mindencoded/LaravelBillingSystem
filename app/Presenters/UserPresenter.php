<?php

namespace App\Presenters;

use App\Models\User;
use Coderflex\LaravelPresenter\Presenter;

class UserPresenter extends Presenter
{
    protected User $user;


    public function __construct(User $user)
    {
        $this->user = $user;
        parent::__construct($user);
    }

    /**
     * @return string
     */
    public function name(): string
    {
        return ucwords($this->user->name);
    }
}

<?php

namespace App\Presenters;

use Coderflex\LaravelPresenter\Presenter;

class UserPresenter extends Presenter
{
    /**
     * @return string
     */
    public function name(): string
    {
        return ucwords($this->model->name);
    }
}

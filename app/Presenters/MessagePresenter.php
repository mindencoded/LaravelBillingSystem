<?php

namespace App\Presenters;

use Coderflex\LaravelPresenter\Presenter;

class MessagePresenter extends Presenter
{
    /**
     * @return string
     */
    public function userName(): string
    {
        return $this->model->user()->name;
    }
}
